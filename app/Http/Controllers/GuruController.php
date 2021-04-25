<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
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
        Guru::create($request->all());

        return redirect()->route('guru.index')->with('status', 'data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Guru $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Guru $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Guru $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $rules = [
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'nik' => ['required'],
            'nip' => ['required'],
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
        Guru::find($guru->id)->update($request->all());

        return redirect()->route('guru.index')->with('status', 'data berhasil diubah.');
    }

    // multiple delete data
    public function multiple_destroy(Request $request)
    {
        foreach ($request->id as $i) {
            Guru::destroy($i);
        }
        return redirect()->back()->with('status', 'data berhasil dihapus.');
    }
}
