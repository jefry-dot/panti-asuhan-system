<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BeritaController;
use App\Http\Controllers\API\AcaraController;
use App\Http\Controllers\API\DonationController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\SettingController;

// ==================== PUBLIC API ROUTES ==================== //

// Authentication endpoints
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
});

// Public berita endpoints
Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index']);
    Route::get('/{id}', [BeritaController::class, 'show']);
});

// Public acara endpoints
Route::prefix('acara')->group(function () {
    Route::get('/', [AcaraController::class, 'index']);
    Route::get('/{id}', [AcaraController::class, 'show']);
});

// Public donation endpoint
Route::post('/donations', [DonationController::class, 'store']);

// Contact message
Route::post('/messages', [MessageController::class, 'store']);

// Settings (logo, favicon)
Route::get('/settings', [SettingController::class, 'index']);

// ==================== PROTECTED API ROUTES ==================== //

Route::middleware('auth:sanctum')->group(function () {

    // Auth user info & logout
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    // ===== ADMIN ROUTES =====
    Route::middleware('role:admin')->prefix('admin')->group(function () {

        // Dashboard stats
        Route::get('/dashboard/stats', [AuthController::class, 'dashboardStats']);

        // Berita management (Admin)
        Route::prefix('berita')->group(function () {
            Route::post('/', [BeritaController::class, 'store']);
            Route::post('/{id}', [BeritaController::class, 'update']); // POST with _method=PUT
            Route::delete('/{id}', [BeritaController::class, 'destroy']);
        });

        // Acara management (Admin)
        Route::prefix('acara')->group(function () {
            Route::post('/', [AcaraController::class, 'store']);
            Route::post('/{id}', [AcaraController::class, 'update']); // POST with _method=PUT
            Route::delete('/{id}', [AcaraController::class, 'destroy']);
        });

        // Donations management (Admin)
        Route::prefix('donations')->group(function () {
            Route::get('/', [DonationController::class, 'index']);
            Route::get('/{id}', [DonationController::class, 'show']);
            Route::delete('/{id}', [DonationController::class, 'destroy']);
        });

        // Messages management (Admin)
        Route::prefix('messages')->group(function () {
            Route::get('/', [MessageController::class, 'index']);
            Route::get('/{id}', [MessageController::class, 'show']);
            Route::delete('/{id}', [MessageController::class, 'destroy']);
        });

        // Settings management (Admin)
        Route::post('/settings/logo', [SettingController::class, 'updateLogo']);
        Route::post('/settings/favicon', [SettingController::class, 'updateFavicon']);
    });

    // ===== USER ROUTES =====
    Route::middleware('role:user')->prefix('user')->group(function () {
        // User donations history
        Route::get('/donations', [DonationController::class, 'userDonations']);

        // User profile
        Route::get('/profile', function (Request $request) {
            return $request->user();
        });
        Route::put('/profile', [AuthController::class, 'updateProfile']);
    });
});
