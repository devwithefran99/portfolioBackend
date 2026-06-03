<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;

// ── Frontend ───────────────────────────────────────────────────
Route::get('/', [FrontendController::class, 'index']);

// ── Public contact submit (frontend form) ──────────────────────
Route::post('/contact-submit', [DashboardController::class, 'store'])
    ->middleware('throttle:3,1');