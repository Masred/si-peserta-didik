<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\PesertaDidik;
use App\Models\Rombel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_jurusan = Jurusan::all()->count();
        $total_rombel = Rombel::all()->count();
        $total_peserta_didik = PesertaDidik::all()->count();
        return view('dashboard.index', compact('total_jurusan', 'total_peserta_didik', 'total_rombel'));
    }
}
