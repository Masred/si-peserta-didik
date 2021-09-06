<?php

namespace App\Http\Controllers;

use App\Exports\PesertaDidikExport;
use App\Imports\PesertaDidikImport;
use App\Models\Jurusan;
use App\Models\PesertaDidik;
use App\Models\Rombel;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PesertaDidikController extends Controller
{
    public function index()
    {
        return redirect()->back();
    }

    public function aktif()
    {
        $peserta_didik = PesertaDidik::where('status', '=', 'aktif')->get();
        return view('peserta-didik.index', compact('peserta_didik'));
    }

    public function keluar()
    {
        $peserta_didik = PesertaDidik::where('status', '=', 'keluar')->get();
        return view('peserta-didik.index', compact('peserta_didik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peserta-didik.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => ['required'],
            'jenis_pendaftaran' => ['required'],
            'sekolah_asal' => ['required'],
            'jenis_kelamin' => ['required'],
            'nipd' => ['required', 'numeric', 'unique:peserta_didik'],
            'nisn' => ['required', 'numeric', 'unique:peserta_didik'],
            'nik' => ['required'],
            'no_kk' => ['required'],
            'hp' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'agama' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'rt' => ['required'],
            'rw' => ['required'],
            'alamat' => ['required'],
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
            'email' => ':attribute tidak valid',
            'unique' => ':attribute sudah terdaftar'
        ];

        $request->validate($rules, $customMessages);
        PesertaDidik::create($request->all());

        return redirect('/peserta-didik/aktif')->with('status', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PesertaDidik $peserta_didik
     * @return \Illuminate\Http\Response
     */
    public function show(PesertaDidik $peserta_didik)
    {
        return view('peserta-didik.show', compact('peserta_didik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PesertaDidik $peserta_didik
     * @return \Illuminate\Http\Response
     */
    public function edit(PesertaDidik $peserta_didik)
    {
        return view('peserta-didik.edit', compact('peserta_didik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PesertaDidik $peserta_didik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesertaDidik $peserta_didik)
    {
        $rules = [
            'nama' => ['required'],
            'jenis_pendaftaran' => ['required'],
            'sekolah_asal' => ['required'],
            'jenis_kelamin' => ['required'],
            'nipd' => ['required', 'numeric', Rule::unique('peserta_didik')->ignore($peserta_didik->nipd, 'nipd')],
            'nisn' => ['required', 'numeric', Rule::unique('peserta_didik')->ignore($peserta_didik->nisn, 'nisn')],
            'nik' => ['required'],
            'no_kk' => ['required'],
            'hp' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'agama' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'rt' => ['required'],
            'rw' => ['required'],
            'alamat' => ['required'],
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
            'email' => ':attribute tidak valid',
            'unique' => ':attribute sudah terdaftar'
        ];

        $request->validate($rules, $customMessages);
        PesertaDidik::find($peserta_didik->nipd)->update($request->all());
        return redirect('/peserta-didik/aktif')->with('status', 'data berhasil diubah');
    }

    public function laporan()
    {
        $rombel = Rombel::all();
        $jurusan = Jurusan::all();
        return view('peserta-didik.laporan', compact('rombel', 'jurusan'));
    }

    // Download peserta didik in excel
    public function export()
    {
        return Excel::download(new PesertaDidikExport, 'peserta-didik.xlsx');
    }

    // Download peserta didik in pdf
    public function pdf()
    {
        $peserta_didik = PesertaDidik::all();
        $kelas = 'Semua';

        $pdf = PDF::loadView('peserta-didik.print', compact('peserta_didik', 'kelas'));

        return $pdf->download('peserta-didik.pdf');
    }

    // Import peserta didik from excel
    public function import(Request $request)
    {
        $request->validate(
            [
                'fileImport' => ['required', 'mimes:xlsx,xls']
            ],
            [
                'required' => 'anda belum memilih file untuk diimport.',
                'mimes' => 'file yang dipilih harus berformat xlsx atau xls.'
            ]
        );
        Excel::import(new PesertaDidikImport, $request->file('fileImport'));

        return redirect()->route('peserta-didik.index')->with('status', 'Data berhasil diimport');
    }

    // multiple delete data
    public function multiple_destroy(Request $request)
    {
        foreach ($request->nipd as $i) {
            PesertaDidik::destroy($i);
        }
        return redirect()->back()->with('status', 'data berhasil dihapus.');
    }

    public function print(Request $request)
    {
        if ($request->status == 'aktif') {
            if ($request->kode_rombel == 'semua') {
                if ($request->kode_jurusan == 'semua') {
                    if ($request->kelas == 'semua') {
                        $peserta_didik = PesertaDidik::where('status', '=', 'aktif')->get();
                        $keterangan = 'AKTIF';
                    } else {
                        $peserta_didik = DB::table('peserta_didik')
                            ->join('rombel', 'peserta_didik.kode_rombel', '=', 'rombel.kode_rombel')
                            ->join('jurusan', 'rombel.kode_jurusan', '=', 'jurusan.kode_jurusan')
                            ->where('rombel.kelas', $request->kelas)
                            ->where('status', '=', 'aktif')
                            ->get();
                        $keterangan = 'KELAS';
                    }
                } else {
                    $peserta_didik = DB::table('peserta_didik')
                        ->join('rombel', 'peserta_didik.kode_rombel', '=', 'rombel.kode_rombel')
                        ->join('jurusan', 'rombel.kode_jurusan', '=', 'jurusan.kode_jurusan')
                        ->where('rombel.kode_jurusan', $request->kode_jurusan)
                        ->where('status', '=', 'aktif')
                        ->get();
                    $keterangan = 'JURUSAN';
                }
            } else {
                $peserta_didik = PesertaDidik::where('kode_rombel', '=', $request->kode_rombel)->get();
                $keterangan = 'KELAS';
            }
        } elseif ($request->status == 'Lulus') {
            if ($request->kode_jurusan == 'semua') {
                $peserta_didik = PesertaDidik::where('keluar_karena', '=', 'Lulus')->get();
                $keterangan = 'ALUMNI';
            } else {
                $peserta_didik = DB::table('peserta_didik')
                    ->join('rombel', 'peserta_didik.kode_rombel', '=', 'rombel.kode_rombel')
                    ->join('jurusan', 'rombel.kode_jurusan', '=', 'jurusan.kode_jurusan')
                    ->where('rombel.kode_jurusan', '=', $request->kode_jurusan)
                    ->where('keluar_karena', '=', 'Lulus')
                    ->get();
                $keterangan = 'ALUMNI-JURUSAN';
            }
        }
        $pdf = PDF::loadView('peserta-didik.print', compact('peserta_didik', 'keterangan'));
        return $pdf->stream();
    }
}
