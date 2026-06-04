<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WorkInteractionController;

// ── Frontend ───────────────────────────────────────────────────
Route::get('/', [FrontendController::class, 'index']);

// ── Public contact submit (frontend form) ──────────────────────
Route::post('/contact-submit', [DashboardController::class, 'store'])
    ->middleware('throttle:3,1');

    Route::post('/work/{work}/view', [WorkInteractionController::class, 'trackView'])->name('work.view');
   Route::post('/work/{work}/like', [WorkInteractionController::class, 'toggleLike'])->name('work.like');