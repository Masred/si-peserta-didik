<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use App\Models\Surat;
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
        $peserta_didik = PesertaDidik::select('id', 'nama', 'nipd')->get();
        return view('surat.create', compact('peserta_didik'));
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

        $peserta_didik_id = explode(' - ', $request->peserta_didik_id);
        $pd = $request->all();
        $pd['peserta_didik_id'] = $peserta_didik_id[0];
        Surat::create($pd);
        $surat = Surat::all()->sortByDesc('tanggal')->first();

        if ($request->jenis_surat == 'keterangan') {
            $pdf = PDF::loadView('surat.keterangan', compact('surat', 'kepala_sekolah', 'nip_kepala_sekolah', 'tata_usaha', 'nip_tata_usaha'));
        } elseif ($request->jenis_surat == 'mutasi') {
            $pdf = PDF::loadView('surat.mutasi', compact('surat', 'kepala_sekolah', 'nip_kepala_sekolah', 'tata_usaha', 'nip_tata_usaha'));
        } elseif ($request->jenis_surat == 'dispensasi') {
            $orang_tua = $request->orang_tua;
            $data_guru_mapel = explode(' - ', $request->guru_mapel);
            $data_petugas_piket = explode(' - ', $request->petugas_piket);
            $guru_mapel = $data_guru_mapel[0];
            $nip_guru_mapel = $data_guru_mapel[1];
            $petugas_piket = $data_petugas_piket[0];
            $nip_petugas_piket = $data_petugas_piket[1];
            $jam_ke = $request->jam_ke;
            $sampai_jam_ke = $request->sampai_jam_ke;
            $pdf = PDF::loadView('surat.dispensasi', compact('surat', 'orang_tua', 'guru_mapel', 'nip_guru_mapel', 'petugas_piket', 'nip_petugas_piket', 'jam_ke', 'sampai_jam_ke'));
        }
        return $pdf->stream();
    }
}
