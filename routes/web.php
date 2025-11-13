<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

// Routes untuk verifikasi email Google
Route::post('/send-verification', [VerificationController::class, 'sendVerification'])->name('verification.send');
Route::post('/verify-code', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/verification', [VerificationController::class, 'showVerificationForm'])->name('verification.form');

// ==================== CONTROLLER IMPORT ==================== //
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\AcaraController as AdminAcaraController;
use App\Http\Controllers\Admin\DonasiController as AdminDonasiController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\BeritaController as PublicBeritaController;
use App\Http\Controllers\Public\AcaraController as PublicAcaraController;

// ==================== ROUTE PUBLIK ==================== //

Route::prefix('/')
    ->name('public.')
    ->group(function () {
        // Halaman utama & profil
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/profil', [HomeController::class, 'profil'])->name('profil');

        // Halaman berita publik
        Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita');
        Route::get('/berita/{berita:slug}', [PublicBeritaController::class, 'show'])->name('berita.show');

        // Halaman acara publik
        Route::get('/acara', [PublicAcaraController::class, 'index'])->name('acara');
        Route::get('/acara/{acara:slug}', [PublicAcaraController::class, 'show'])->name('acara.show');

        // Halaman donasi publik
    
    });

Route::controller(DonationController::class)->group(function () {
    Route::get('/donasi', 'index')->name('donation.form');
    Route::post('/donasi', 'store')->name('donation.store');
    Route::post('/midtrans/callback', 'callback')->name('midtrans.callback');
});

// ==================== ROUTE ADMIN ==================== //
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard utama admin
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/donasi', [AdminController::class, 'donasi'])->name('donasi');
        Route::get('/data-anak', [AdminController::class, 'dataAnak'])->name('data-anak');
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');

        // ===== CRUD BERITA =====
        Route::prefix('berita')->name('berita.')->group(function () {
            Route::get('/', [AdminBeritaController::class, 'index'])->name('index');
            Route::get('/create', [AdminBeritaController::class, 'create'])->name('create');
            Route::post('/', [AdminBeritaController::class, 'store'])->name('store');
            Route::get('/{berita}', [AdminBeritaController::class, 'show'])->name('show');
            Route::get('/{berita}/edit', [AdminBeritaController::class, 'edit'])->name('edit');
            Route::put('/{berita}', [AdminBeritaController::class, 'update'])->name('update');
            Route::delete('/{berita}', [AdminBeritaController::class, 'destroy'])->name('destroy');
        });

        // ===== CRUD ACARA =====
        Route::prefix('acara')->name('acara.')->group(function () {
            Route::get('/', [AdminAcaraController::class, 'index'])->name('index');
            Route::get('/create', [AdminAcaraController::class, 'create'])->name('create');
            Route::post('/', [AdminAcaraController::class, 'store'])->name('store');
            Route::get('/{acara}', [AdminAcaraController::class, 'show'])->name('show');
            Route::get('/{acara}/edit', [AdminAcaraController::class, 'edit'])->name('edit');
            Route::put('/{acara}', [AdminAcaraController::class, 'update'])->name('update');
            Route::delete('/{acara}', [AdminAcaraController::class, 'destroy'])->name('destroy');
        });

        // ===== CRUD DONASI =====
Route::prefix('donasi')->name('donasi.')->group(function () {
    Route::get('/', [AdminDonasiController::class, 'index'])->name('index');
    Route::get('/laporan', [AdminDonasiController::class, 'laporan'])->name('laporan');
    Route::delete('/{id}', [AdminDonasiController::class, 'destroy'])->name('destroy');
});

    });


// ==================== ROUTE USER (DONATUR) ==================== //
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


// ==================== ROUTE PROFIL (UNTUK SEMUA USER LOGIN) ==================== //
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==================== ROUTE LUPA PASSWORD ==================== //
Route::middleware('guest')->group(function () {
    // Lupa Password
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
        
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
        
    // Reset Password  
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
        
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

// ==================== ROUTE AUTHENTICATION (LOGIN/REGISTER) ==================== //
require __DIR__ . '/auth.php';