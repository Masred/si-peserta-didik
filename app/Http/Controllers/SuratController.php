<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\PesertaDidik;
use App\Models\Surat;
use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;
use PDF;

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::all()->sortByDesc('tanggal');
        return view('surat.index', compact('surat'));
    }

    public function create()
    {
        $peserta_didik = PesertaDidik::select('id', 'nama', 'nipd', 'kode_rombel')->where('status', '=', 'aktif')->get();
        $guru = Guru::all();
        $tendik = TenagaKependidikan::all();
        return view('surat.create', compact('peserta_didik', 'guru', 'tendik'));
    }

    public function store(Request $request)
    {

        if ($request->jenis_surat != 'dispensasi' && $request->kepala_sekolah) {
            $data_kelapa_sekolah = explode(' - ', $request->kepala_sekolah);
            $tata_usaha = null;
            $nip_tata_usaha = null;
            $kepala_sekolah = $data_kelapa_sekolah[0];
            $nip_kepala_sekolah = $data_kelapa_sekolah[1];
        } elseif ($request->jenis_surat != 'dispensasi' && $request->tata_usaha) {
            $data_tata_usaha = explode(' - ', $request->tata_usaha);
            $kepala_sekolah = null;
            $nip_kepala_sekolah = null;
            $tata_usaha = $data_tata_usaha[0];
            $nip_tata_usaha = $data_tata_usaha[1];
        }

        $peserta_didik_id = explode(' - ', $request->peserta_didik_id[0]);
        $pd = $request->all();
        $pd['peserta_didik_id'] = $peserta_didik_id[0];

        $pdc = PesertaDidik::where('id', '=', $peserta_didik_id)->get('status')->first();

        if ($request->jenis_surat == 'keterangan' and $pdc->status === 'aktif') {
            Surat::create($pd);
            $surat = Surat::all()->sortByDesc('id')->first();
            $pdf = PDF::loadView('surat.keterangan', compact('surat', 'kepala_sekolah', 'nip_kepala_sekolah', 'tata_usaha', 'nip_tata_usaha'));
        } elseif ($request->jenis_surat == 'mutasi' and $pdc->status === 'keluar') {
            Surat::create($pd);
            $surat = Surat::all()->sortByDesc('id')->first();
            $pdf = PDF::loadView('surat.mutasi', compact('surat', 'kepala_sekolah', 'nip_kepala_sekolah', 'tata_usaha', 'nip_tata_usaha'));
        } elseif ($request->jenis_surat == 'dispensasi' and $pdc->status === 'aktif') {
            Surat::create($pd);
            $surat = Surat::all()->sortByDesc('id')->first();
            $orang_tua = $request->orang_tua;
            $data_guru_mapel = explode(' - ', $request->guru_mapel);
            $data_petugas_piket = explode(' - ', $request->petugas_piket);
            $guru_mapel = $data_guru_mapel[0];
            $nip_guru_mapel = $data_guru_mapel[1];
            $petugas_piket = $data_petugas_piket[0];
            $nip_petugas_piket = $data_petugas_piket[1];
            $jam_ke = $request->jam_ke;
            $sampai_jam_ke = $request->sampai_jam_ke;
            $pd_dispen = [];
            $i = 0;
            foreach ($request->peserta_didik_id as $p){
                $e = explode(' - ', $p);
                $pd_dispen[$i++] = [
                    'id' => $e[0],
                    'nama' => $e[1],
                    'kelas' => str_replace('-', ' ', $e[3])
                ];
            }

            $pdf = PDF::loadView('surat.dispensasi', compact('surat', 'orang_tua', 'guru_mapel', 'nip_guru_mapel', 'petugas_piket', 'nip_petugas_piket', 'jam_ke', 'sampai_jam_ke', 'pd_dispen'));
        } else {
            if ($pdc->status === 'keluar') {
                $pesan = 'Tidak dapat membuat surat karena peserta didik sudah tidak aktif';
            } elseif ($pdc->status === 'aktif') {
                $pesan = 'Tidak dapat membuat surat karena peserta didik masih aktif';
            }
            return redirect('/surat/create')->with('pesan', $pesan);
        }
        return $pdf->stream();
    }

    public function laporan()
    {
        return view('surat.laporan');
    }

    public function print(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $surat = Surat::whereBetween('tanggal', [$dari, $sampai])->get();
        $pdf = PDF::loadView('surat.print', compact('surat', 'dari', 'sampai'));
        return $pdf->stream();
    }
}
