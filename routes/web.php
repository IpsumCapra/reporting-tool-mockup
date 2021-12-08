<?php

use Illuminate\Support\Facades\Route;

// Home page
Route::view('/', 'home')->name('home');

// Normal routes
Route::middleware('auth')->group(function () {
    // Settings
    Route::view('/settings', 'settings')->name('settings');
    Route::post('/settings/change_details', [SettingsController::class, 'changeDetails'])->name('settings.change_details');
    Route::post('/settings/change_password', [SettingsController::class, 'changePassword'])->name('settings.change_password');

    // Auth logout
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// Guest routes
Route::middleware('guest')->group(function () {
    // Auth login
    Route::view('/auth/login', 'auth.login')->name('auth.login');
    Route::post('/auth/login', [AuthController::class, 'login']);

    // Auth register
    Route::view('/auth/register', 'auth.register')->name('auth.register');
    Route::post('/auth/register', [AuthController::class, 'register']);
});
