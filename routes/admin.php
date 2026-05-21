<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\WorkController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');

    // Works
    Route::prefix('dashboard')->group(function () {
        Route::resource('works', WorkController::class);
    });

    // Contact
    Route::post('/contact-done/{id}', [DashboardController::class, 'done'])->name('contact.done');
    Route::delete('/contact-delete/{id}', [DashboardController::class, 'delete'])->name('contact.delete');

});