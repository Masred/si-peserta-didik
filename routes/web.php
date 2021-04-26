<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\TenagaKependidikanController;

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

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::delete('jurusan/multiple-destroy', [JurusanController::class, 'multiple_destroy'])->name('jurusan.multiple-destroy')->middleware('auth');
Route::resource('jurusan', JurusanController::class)->except(['destroy'])->middleware('auth');

Route::delete('rombel/multiple-destroy', [RombelController::class, 'multiple_destroy'])->name('rombel.multiple-destroy')->middleware('auth');
Route::resource('rombel', RombelController::class)->except(['destroy'])->middleware('auth');

Route::get('peserta-didik/laporan', [PesertaDidikController::class, 'laporan'])->name('peserta-didik.laporan')->middleware('auth');
Route::get('peserta-didik/keluar', [PesertaDidikController::class, 'keluar'])->name('peserta-didik.keluar')->middleware('auth');
Route::get('peserta-didik/aktif', [PesertaDidikController::class, 'aktif'])->name('peserta-didik.aktif')->middleware('auth');
Route::post('peserta-didik/print', [PesertaDidikController::class, 'print'])->name('peserta-didik.print')->middleware('auth');
Route::delete('peserta-didik/multiple-destroy', [PesertaDidikController::class, 'multiple_destroy'])->name('peserta-didik.multiple-destroy')->middleware('auth');
Route::post('peserta-didik/import', [PesertaDidikController::class, 'import'])->name('peserta-didik.import')->middleware('auth');
Route::get('peserta-didik/export', [PesertaDidikController::class, 'export'])->name('peserta-didik.export')->middleware('auth');
Route::get('peserta-didik/export-pdf', [PesertaDidikController::class, 'pdf'])->name('peserta-didik.export-pdf')->middleware('auth');
Route::resource('peserta-didik', PesertaDidikController::class)->except(['destroy'])->middleware('auth');

Route::get('user/profile', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::patch('user/profile/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::delete('user/multiple-destroy', [UserController::class, 'multiple_destroy'])->name('user.multiple-destroy')->middleware('admin');
Route::resource('user', UserController::class)->only(['index', 'create', 'store'])->middleware('admin');

Route::post('surat/print', [SuratController::class, 'print'])->name('surat.print')->middleware('auth');
Route::get('surat/laporan', [SuratController::class, 'laporan'])->name('surat.laporan')->middleware('auth');
Route::resource('surat', SuratController::class)->only('index', 'create', 'store')->middleware('auth');

Route::post('guru/print', [GuruController::class, 'print'])->name('guru.print')->middleware('auth');
Route::get('guru/laporan', [GuruController::class, 'laporan'])->name('guru.laporan')->middleware('auth');
Route::delete('guru/multiple-destroy', [GuruController::class, 'multiple_destroy'])->name('guru.multiple-destroy')->middleware('auth');
Route::resource('guru', GuruController::class)->except('destroy')->middleware('auth');

Route::post('tenaga-kependidikan/print', [TenagaKependidikanController::class, 'print'])->name('tenaga-kependidikan.print')->middleware('auth');
Route::get('tenaga-kependidikan/laporan', [TenagaKependidikanController::class, 'laporan'])->name('tenaga-kependidikan.laporan')->middleware('auth');
Route::delete('tenaga-penendidikan/multiple-destroy', [TenagaKependidikanController::class, 'multiple_destroy'])->name('tenaga-kependidikan.multiple-destroy')->middleware('auth');
Route::resource('tenaga-kependidikan', TenagaKependidikanController::class)->except('destroy')->middleware('auth');
