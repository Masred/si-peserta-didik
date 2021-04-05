<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rombels = Rombel::all();
        return view('rombel.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('rombel.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Request([
            'kode_rombel' => $request->kelas . ' ' . $request->kode_jurusan . ' ' . $request->kelompok,
            'kelas' => $request->kelas,
            'kode_jurusan' => $request->kode_jurusan,
            'kelompok' => $request->kelompok
        ]);

        $rules = [
            'kode_rombel' => ['required', 'unique:rombel'],
            'kelas' => ['required'],
            'kode_jurusan' => ['required'],
            'kelompok' => ['required']
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
            'unique' => ':attribute telah digunakan'
        ];

        $data->validate($rules, $customMessages);
        Rombel::create($data->all());

        return redirect('/rombel')->with('status', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Rombel $rombelModel
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Rombel $rombelModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel)
    {
        $jurusans = Jurusan::all();
        return view('rombel.edit', compact('rombel', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rombel $rombelModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rombel $rombel)
    {
        $data = new Request([
            'kode_rombel' => $request->kelas . ' ' . $request->kode_jurusan . ' ' . $request->kelompok,
            'kelas' => $request->kelas,
            'kode_jurusan' => $request->kode_jurusan,
            'kelompok' => $request->kelompok
        ]);

        $rules = [
            'kode_rombel' => ['required', Rule::unique('rombel')->ignore($rombel->kode_rombel, 'kode_rombel')],
            'kelas' => ['required'],
            'kode_jurusan' => ['required'],
            'kelompok' => ['required']
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
            'unique' => ':attribute telah digunakan'
        ];
        $data->validate($rules, $customMessages);
        Rombel::find($rombel->kode_rombel)->update($data->all());

        return redirect('/rombel')->with('status', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Rombel $rombelModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $rombel)
    {
        Rombel::destroy($rombel->kode_rombel);
        return redirect('/rombel')->with('status', 'data berhasil dihapus.');
    }
}
