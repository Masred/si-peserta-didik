<?php

namespace App\Http\Controllers;

use App\Exports\PesertaDidikExport;
use App\Imports\PesertaDidikImport;
use App\Models\PesertaDidik;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PesertaDidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta_didik = PesertaDidik::all();
        return view('peserta-didik.index', compact('peserta_didik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombel = Rombel::all();
        return view('peserta-didik.create', compact('rombel'));
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
            'alamat' => ['required'],
            'tahun_masuk' => ['required'],
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
            'email' => ':attribute tidak valid',
            'unique' => ':attribute sudah terdaftar'
        ];

        $request->validate($rules, $customMessages);
        PesertaDidik::create($request->all());

        return redirect('/peserta-didik')->with('status', 'data berhasil disimpan');
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
        $rombel = Rombel::all();
        return view('peserta-didik.edit', compact('peserta_didik', 'rombel'));
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
            'alamat' => ['required'],
            'tahun_masuk' => ['required'],
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
            'email' => ':attribute tidak valid',
            'unique' => ':attribute sudah terdaftar'
        ];

        $request->validate($rules, $customMessages);
        PesertaDidik::find($peserta_didik->id)->update($request->all());
        return redirect('/peserta-didik')->with('status', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PesertaDidik $peserta_didik
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesertaDidik $peserta_didik)
    {
        PesertaDidik::destroy($peserta_didik->id);
        return redirect()->route('peserta-didik.index')->with('status', 'data berhasil dihapus.');
    }

    // Download peserta didik in excel
    public function export()
    {
        return Excel::download(new PesertaDidikExport, 'peserta-didik.xlsx');
    }

    // Import peserta didik from excel
    public function import(Request $request)
    {
        Excel::import(new PesertaDidikImport, $request->file('fileImport'));

        return redirect()->route('peserta-didik.index')->with('status', 'Data berhasil diimport');
    }

    // multiple delete data
    public function multiple_destroy(Request $request)
    {
        foreach ($request->id as $i) {
            PesertaDidik::destroy($i);
        }
        return redirect()->back()->with('status', 'data berhasil dihapus.');
    }
}
