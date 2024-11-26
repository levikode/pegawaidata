<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendataanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman Utama Dashboard (Tampilan pertama)
Route::get('/', function () {
    return view('welcome', [
        "title" => "Dashboard"
    ]);
})->middleware('auth');

// Rute untuk Pendataan - Gunakan resource route untuk pendataan
Route::resource('pendataan', PendataanController::class)->middleware('auth');

// Rute untuk User, hanya tanpa 'destroy', 'create', 'show', 'update', dan 'edit'
Route::resource('user', UserController::class)->except(['destroy', 'create', 'show', 'update', 'edit'])->middleware('auth');

// Rute untuk login dan logout
Route::get('login', [LoginController::class, 'loginView'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout')->middleware('auth');

// Rute untuk Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPDF'])->name('laporan.export.pdf');

// Rute untuk Dashboard
Route::get('/', [DashboardController::class, 'index']);

// Rute untuk mendapatkan data chart untuk dashboard
Route::get('/chart-data', [DashboardController::class, 'getChartData']);
