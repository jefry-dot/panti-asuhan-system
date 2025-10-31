<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

// Halaman awal (publik)
Route::get('/', function () {
    return view('welcome');
});

// ROUTE UNTUK ADMIN
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/donasi', [AdminController::class, 'donasi'])->name('donasi');
        Route::get('/data-anak', [AdminController::class, 'dataAnak'])->name('data-anak');
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
    });

// ROUTE UNTUK USER (DONATUR)
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
        Route::get('/donasi', [UserController::class, 'donasi'])->name('donasi');
        Route::get('/anak-asuh', [UserController::class, 'anakAsuh'])->name('anak-asuh');
        Route::get('/riwayat', [UserController::class, 'riwayat'])->name('riwayat');
        Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    });

// ROUTE PROFIL (UNTUK SEMUA LOGIN USER)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTE AUTH (LOGIN, REGISTER, DLL)
require __DIR__ . '/auth.php';
