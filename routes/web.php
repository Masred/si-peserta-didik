<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::delete('jurusan/multiple-destroy', [JurusanController::class, 'multiple_destroy'])->name('jurusan.multiple-destroy');
Route::resource('jurusan', JurusanController::class);

Route::delete('rombel/multiple-destroy', [RombelController::class, 'multiple_destroy'])->name('rombel.multiple-destroy');
Route::resource('rombel', RombelController::class);

Route::post('peserta-didik/print', [PesertaDidikController::class, 'print'])->name('peserta-didik.print');
Route::delete('peserta-didik/multiple-destroy', [PesertaDidikController::class, 'multiple_destroy'])->name('peserta-didik.multiple-destroy');
Route::post('peserta-didik/import', [PesertaDidikController::class, 'import'])->name('peserta-didik.import');
Route::get('peserta-didik/export-excel', [PesertaDidikController::class, 'excel'])->name('peserta-didik.export-excel');
Route::get('peserta-didik/export-pdf', [PesertaDidikController::class, 'pdf'])->name('peserta-didik.export-pdf');
Route::resource('peserta-didik', PesertaDidikController::class);
