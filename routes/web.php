<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;



Route::get('/dashboard', [DashboardController::class, 'index'])
     ->middleware('auth')
     ->name('dashboard');

// Frontend
Route::get('/', function () {
    return view('frontend.index');
});

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
Route::get('/add-work', [App\Http\Controllers\WorkController::class, 'addWork'])->name('add.work');
Route::get('/all-work', [App\Http\Controllers\WorkController::class, 'allWork'])->name('all.work');