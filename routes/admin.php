<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\WorkController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\ProfileController;

// ── Auth ───────────────────────────────────────────────────────
Route::get('/login',  [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// ── Admin protected routes ─────────────────────────────────────
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Contact Messages page
    Route::get('/dashboard/contacts', [DashboardController::class, 'contacts'])->name('contacts.index');
    Route::post('/dashboard/contacts/done/{id}',    [DashboardController::class, 'done'])->name('contact.done');
    Route::delete('/dashboard/contacts/delete/{id}',[DashboardController::class, 'delete'])->name('contact.delete');

    // Analytics page
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics.index');

    // Works CRUD
    Route::prefix('dashboard')->group(function () {
        Route::resource('works', WorkController::class);
    });

    // Testimonials CRUD
    Route::prefix('dashboard')->group(function () {
        Route::resource('testimonials', TestimonialController::class);
    });

    // Profile & Skills
    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/dashboard/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/dashboard/profile/skill/add', [ProfileController::class, 'storeSkill'])->name('skill.store');
    Route::delete('/dashboard/profile/skill/{skill}', [ProfileController::class, 'destroySkill'])->name('skill.destroy');

});