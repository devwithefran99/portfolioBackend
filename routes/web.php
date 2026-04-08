<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Models\Contact;

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/dashboard', function () {
    $contacts = Contact::latest()->get();
    return view('backend.dashboard', compact('contacts'));
});

// ONLY login & logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// contact form
Route::post('/contact-submit', [DashboardController::class, 'store']);
Route::get('/contact-done/{id}',[DashboardController::class,'done']);
Route::get('/contact-delete/{id}',[DashboardController::class,'delete']);
// end of contact form
