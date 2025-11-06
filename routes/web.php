<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\AcaraController as AdminAcaraController;
use App\Http\Controllers\Admin\DonasiController as AdminDonasiController;

// ==================== ROUTE PUBLIK ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/donasi', [HomeController::class, 'donasi'])->name('donasi');

// Berita Publik
Route::get('/berita', [BeritaController::class, 'publicIndex'])->name('public.berita');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'publicShow'])->name('public.berita.show');

// Acara Publik  
Route::get('/acara', [AcaraController::class, 'publicIndex'])->name('public.acara');
Route::get('/acara/{acara:slug}', [AcaraController::class, 'publicShow'])->name('public.acara.show');

// ==================== ROUTE ADMIN ====================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Donasi
        Route::get('/donasi', [AdminController::class, 'donasi'])->name('donasi');

        // Data Anak
        Route::get('/data-anak', [AdminController::class, 'dataAnak'])->name('data-anak');

        // Laporan
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');

        // ===== MANAJEMEN BERITA =====
       Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [AdminBeritaController::class, 'index'])->name('index'); 
    Route::get('/create', [AdminBeritaController::class, 'create'])->name('create');
    Route::post('/', [AdminBeritaController::class, 'store'])->name('store');
    Route::get('/{berita}', [AdminBeritaController::class, 'show'])->name('show');
    Route::get('/{berita}/edit', [AdminBeritaController::class, 'edit'])->name('edit'); 
    Route::put('/{berita}', [AdminBeritaController::class, 'update'])->name('update'); 
    Route::delete('/{berita}', [AdminBeritaController::class, 'destroy'])->name('destroy'); 
});

        // ===== MANAJEMEN ACARA =====
    Route::prefix('acara')->name('acara.')->group(function () {
    Route::get('/', [AdminAcaraController::class, 'index'])->name('index'); 
    Route::get('/create', [AdminAcaraController::class, 'create'])->name('create'); 
    Route::post('/', [AdminAcaraController::class, 'store'])->name('store');
    Route::get('/{acara}', [AdminAcaraController::class, 'show'])->name('show'); 
    Route::get('/{acara}/edit', [AdminAcaraController::class, 'edit'])->name('edit');
    Route::put('/{acara}', [AdminAcaraController::class, 'update'])->name('update');
    Route::delete('/{acara}', [AdminAcaraController::class, 'destroy'])->name('destroy');
});
    // ===== MANAJEMEN DONASI =====
Route::prefix('donasi')->name('donasi.')->group(function () {
    Route::get('/', [AdminDonasiController::class, 'index'])->name('index');
    Route::get('/create', [AdminDonasiController::class, 'create'])->name('create');
    Route::post('/', [AdminDonasiController::class, 'store'])->name('store');
    Route::get('/{donasi}', [AdminDonasiController::class, 'show'])->name('show');
    Route::get('/{donasi}/edit', [AdminDonasiController::class, 'edit'])->name('edit');
    Route::put('/{donasi}', [AdminDonasiController::class, 'update'])->name('update');
    Route::delete('/{donasi}', [AdminDonasiController::class, 'destroy'])->name('destroy');
});
    });

// ==================== ROUTE USER (DONATUR) ====================
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

// ==================== ROUTE PROFIL (UNTUK SEMUA USER) ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==================== ROUTE AUTH ====================
require __DIR__ . '/auth.php';