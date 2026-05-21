<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\WorkController;
use App\Http\Controllers\FrontendController; 




// Frontend
Route::get('/', [FrontendController::class, 'index']);

// ==================== BACKEND (Protected) ====================


     

// Login & Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Contact form (public)
Route::post('/contact-submit', [DashboardController::class, 'store']);

