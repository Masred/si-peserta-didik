<?php

namespace App\Http\Controllers;

use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;
use PDF;

class tenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenaga_kependidikan = TenagaKependidikan::all();
        return view('tenaga-kependidikan.index', compact('tenaga_kependidikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenaga-kependidikan.create');
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
            'nik' => ['required'],
            'nip' => ['required'],
            'keterangan' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'agama' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'rt' => ['required'],
            'rw' => ['required'],
            'alamat' => ['required']
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
        ];

        $request->validate($rules, $customMessages);
        TenagaKependidikan::create($request->all());

        return redirect()->route('tenaga-kependidikan.index')->with('status', 'data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TenagaKependidikan $tenaga_kependidikan
     * @return \Illuminate\Http\Response
     */
    public function show(TenagaKependidikan $tenaga_kependidikan)
    {
        return view('tenaga-kependidikan.show', compact('tenaga_kependidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TenagaKependidikan $tenaga_kependidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(TenagaKependidikan $tenaga_kependidikan)
    {
        return view('tenaga-kependidikan.edit', compact('tenaga_kependidikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TenagaKependidikan $tenaga_kependidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenagaKependidikan $tenaga_kependidikan)
    {
        $rules = [
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'nik' => ['required'],
            'nip' => ['required'],
            'keterangan' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'agama' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'rt' => ['required'],
            'rw' => ['required'],
            'alamat' => ['required']
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
        ];

        $request->validate($rules, $customMessages);
        TenagaKependidikan::find($tenaga_kependidikan->id)->update($request->all());

        return redirect()->route('tenaga-kependidikan.index')->with('status', 'data berhasil diubah.');
    }

    // multiple delete data
    public function multiple_destroy(Request $request)
    {
        foreach ($request->id as $i) {
            TenagaKependidikan::destroy($i);
        }
        return redirect()->back()->with('status', 'data berhasil dihapus.');
    }

    public function laporan()
    {
        return view('tenaga-kependidikan.laporan');
    }

    public function print(Request  $request)
    {
        $tenaga_kependidikan = TenagaKependidikan::all();
        $pdf = PDF::loadView('tenaga-kependidikan.print', compact('tenaga_kependidikan'));
        return $pdf->stream();
    }
}
