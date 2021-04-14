<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

Route::post('peserta-didik/print', [PesertaDidikController::class, 'print'])->name('peserta-didik.print')->middleware('auth');
Route::delete('peserta-didik/multiple-destroy', [PesertaDidikController::class, 'multiple_destroy'])->name('peserta-didik.multiple-destroy')->middleware('auth');
Route::post('peserta-didik/import', [PesertaDidikController::class, 'import'])->name('peserta-didik.import')->middleware('auth');
Route::get('peserta-didik/export-excel', [PesertaDidikController::class, 'excel'])->name('peserta-didik.export-excel')->middleware('auth');
Route::get('peserta-didik/export-pdf', [PesertaDidikController::class, 'pdf'])->name('peserta-didik.export-pdf')->middleware('auth');
Route::resource('peserta-didik', PesertaDidikController::class)->except(['destroy'])->middleware('auth');

Route::get('user/profile', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::patch('user/profile/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::delete('user/multiple-destroy', [UserController::class, 'multiple_destroy'])->name('user.multiple-destroy')->middleware('admin');
Route::resource('user', UserController::class)->only(['index', 'create', 'store'])->middleware('admin');
