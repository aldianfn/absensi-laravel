<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard.home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    // Register route
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
});
