<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false, // Disable registration routes
    'reset' => false,    // Disable password reset routes
    'verify' => false,   // Disable email verification routes
    'confirm' => false,  // Disable password confirmation routes
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
