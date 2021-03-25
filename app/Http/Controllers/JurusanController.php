<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = JurusanModel::all();
        return view('jurusan.index', ['jurusans' => $jurusans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
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
            'kode_jurusan' => ['required', 'unique:jurusan', 'min:3'],
            'nama_jurusan' => ['required']
        ];
        $customMessages = [
            'required' => ':attribute jurusan harus diisi!',
            'unique' => ':attribute tidak tersedia',
            'min' => ':attribute minimal :min huruf',
        ];
        $request->validate($rules, $customMessages);
        JurusanModel::create($request->all());

        return redirect('/jurusan')->with('status', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\JurusanModel $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function show(JurusanModel $jurusanModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\JurusanModel $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function edit(JurusanModel $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JurusanModel $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JurusanModel $jurusan)
    {
        $rules = [
            'kode_jurusan' => ['required', 'min:3', Rule::unique('jurusan')->ignore($jurusan->kode_jurusan,'kode_jurusan')],
            'nama_jurusan' => ['required']
        ];
        $customMessages = [
            'required' => ':attribute jurusan harus diisi!',
            'unique' => ':attribute tidak tersedia',
            'min' => ':attribute minimal :min huruf',
        ];

        $request->validate($rules, $customMessages);
        JurusanModel::where('kode_jurusan', $jurusan->kode_jurusan)
            ->update([
                'kode_jurusan' => $request->kode_jurusan,
                'nama_jurusan' => $request->nama_jurusan
            ]);

        return redirect('/jurusan')->with('status', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\JurusanModel $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(JurusanModel $jurusan)
    {
        JurusanModel::destroy($jurusan->kode_jurusan);
        return redirect('/jurusan')->with('status', 'data berhasil dihapus.');
    }
}
