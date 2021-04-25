<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\PesertaDidik;
use App\Models\Rombel;
use App\Models\Surat;
use App\Models\TenagaKependidikan;

class DashboardController extends Controller
{
    public function index()
    {
        $total_jurusan = Jurusan::all()->count();
        $total_rombel = Rombel::all()->count();
        $total_peserta_didik = PesertaDidik::all()->count();
        $total_surat = Surat::all()->count();
        $total_guru = Guru::all()->count();
        $total_tenaga_kependidikan = TenagaKependidikan::all()->count();

        $rombels = Rombel::withCount([
            'pesertaDidik',
            'pesertaDidik as lakilaki' => function ($query) {
                $query->where('jenis_kelamin', '=', 'L');
            },
            'pesertaDidik as perempuan' => function ($query) {
                $query->where('jenis_kelamin', '=', 'P');
            },
            'pesertaDidik as lulus' => function ($query) {
                $query->where('keluar_karena', '=', 'Lulus');
            },
            'pesertaDidik as mutasi' => function ($query) {
                $query->where('keluar_karena', '=', 'Mutasi');
            }
        ])->get();

        return view('dashboard.index', compact('total_jurusan', 'total_peserta_didik', 'total_rombel', 'total_surat', 'total_guru', 'total_tenaga_kependidikan', 'rombels'));
    }
}
