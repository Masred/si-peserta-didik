<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\PesertaDidik;
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
    public function index(Request $request)
    {
        // $rombels = Rombel::withCount(['pesertaDidik' => function ($query) {
        //     $query->where('status', '=', 'aktif');
        // }])->get();
        $tahun_ajaran = Rombel::select('tahun_ajaran')->distinct()->orderBy('tahun_ajaran', 'desc')->get();

        if ($request->tahun_ajaran) {
            $rombels = Rombel::where('tahun_ajaran', $request->tahun_ajaran)->get();
        } else {
            $rombels = Rombel::where('tahun_ajaran', $tahun_ajaran[0]->tahun_ajaran)->get();
        }


        return view('rombel.index', compact('rombels', 'tahun_ajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $guru = Guru::all();
        return view('rombel.create', compact('jurusans', 'guru'));
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
            'kelas' => ['required'],
            'kode_jurusan' => ['required'],
            'kelompok' => ['required'],
            'guru_id' => ['required'],
            'tahun_ajaran' => ['required']
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
            'unique' => ':attribute telah digunakan'
        ];

        $request->validate($rules, $customMessages);
        Rombel::create($request->all());

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
        $peserta_didik = PesertaDidik::where('kode_rombel', '=', $rombel->kode_rombel)
            ->where('status', '=', 'aktif')->get();
        $jumlah_peserta_didik = $peserta_didik->count();
        return view('rombel.show', compact('peserta_didik', 'rombel', 'jumlah_peserta_didik'));
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
        $guru = Guru::all();
        return view('rombel.edit', compact('rombel', 'jurusans', 'guru'));
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

        $rules = [
            'kelas' => ['required'],
            'kode_jurusan' => ['required'],
            'kelompok' => ['required'],
            'guru_id' => ['required'],
            'tahun_ajaran' => ['required']
        ];

        $customMessages = [
            'required' => ':attribute harus diisi!',
            'unique' => ':attribute telah digunakan'
        ];
        $request->validate($rules, $customMessages);
        Rombel::find($rombel->id)->update($request->all());

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
        Rombel::destroy($rombel->id);
        return redirect('/rombel')->with('status', 'data berhasil dihapus.');
    }

    // multiple delete data
    public function multiple_destroy(Request $request)
    {
        foreach ($request->rombel_id as $id) {
            Rombel::destroy($id);
        }
        return redirect()->back()->with('status', 'data berhasil dihapus.');
    }
}
