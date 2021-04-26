<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string'],
            'username' => ['required', 'alpha_dash', Rule::unique(User::class)],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'is_admin' => ['required']
        ], [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute tidak tersedia',
            'confirmed' => 'konfirmasi password tidak cocok',
            'alpha_dash' => 'harus huruf dan angka tanpa spasi',
            'min' => ':attribute harus setidaknya :min karakter'
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin
        ]);

        return redirect()->route('user.index')->with('status', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::all()->find(auth()->user()->id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string'],
            'username' => ['required', 'alpha_dash', Rule::unique(User::class)->ignore(auth()->user()->username, 'username')],
            'password' => ['required', 'string', 'min:5']
        ], [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute tidak tersedia',
            'alpha_dash' => 'harus huruf dan angka tanpa spasi',
            'min' => ':attribute harus setidaknya :min karakter'
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::all()->find(auth()->user()->id)->update($data);

        return back()->with('status', 'profile berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    // multiple delete data
    public function multiple_destroy(Request $request)
    {
        foreach ($request->id as $i) {
            User::destroy($i);
        }
        return redirect('/user')->with('status', 'data berhasil dihapus.');
    }
}
