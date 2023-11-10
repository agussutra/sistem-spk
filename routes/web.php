<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\NilaiKriteriaController;
use App\Http\Controllers\PerhitunganAhpController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login_action');

Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return view('pages.master.dashboard');
    })->name('dashboard');

    Route::resource('kriteria', KriteriaController::class)->names('kriteria');
    Route::resource('sub_kriteria', NilaiKriteriaController::class)->names('sub_kriteria');
    Route::resource('nasabah', NasabahController::class)->names('nasabah');
    Route::resource('user', UserController::class)->names('user');
    Route::resource('perhitungan_ahp', PerhitunganAhpController::class)->names('perhitungan_ahp');
    Route::resource('permohonan', PermohonanController::class)->names('permohonan');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');

    
    Route::delete('logout', [AuthController::class, 'logout']);

});
