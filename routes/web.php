<?php

use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NasabahController;
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

Route::get('/', function () {
    return view('pages.master.dashboard');
});

Route::get('/nasabah', [NasabahController::class, 'index'])->name('nasabah');
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');
