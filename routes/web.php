<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\WorkController;
use App\Http\Controllers\FrontendController; 



Route::get('/dashboard', [DashboardController::class, 'index'])
     ->middleware('auth')
     ->name('dashboard');

// Frontend
Route::get('/', [FrontendController::class, 'index']);

// ==================== BACKEND (Protected) ====================


     

// Login & Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Contact form (public)
Route::post('/contact-submit', [DashboardController::class, 'store']);
Route::get('/contact-done/{id}', [DashboardController::class, 'done']);
Route::get('/contact-delete/{id}', [DashboardController::class, 'delete']);


// Add Work & All Work routes

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::resource('works', WorkController::class);
});