<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Layar 01: Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
Route::redirect('/', '/login');

// Alur: Login -> beranda sesuai role (layar 03 / 18 / 19 / 20)
Route::middleware('auth')->group(function () {
    Route::view('/akun', 'dashboard.show', ['judul' => 'Manajemen Akun dan Peran'])->middleware('role:admin')->name('akun.index');
    Route::view('/dashboard/pengelola', 'dashboard.show', ['judul' => 'Dashboard Pengelola BUMDes'])->middleware('role:pengelola')->name('dashboard.pengelola');
    Route::view('/dashboard/direktur', 'dashboard.show', ['judul' => 'Dashboard Direktur BUMDes'])->middleware('role:direktur')->name('dashboard.direktur');
    Route::view('/dashboard/pemdes', 'dashboard.show', ['judul' => 'Dashboard Pemerintah Desa'])->middleware('role:pemdes')->name('dashboard.pemdes');
    // Layar 04-28 ditambahkan bertahap sesuai backlog
});
