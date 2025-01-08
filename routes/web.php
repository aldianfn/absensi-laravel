<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AttendanceController::class, 'index'])->name('dashboard.home');

    Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('dashboard.attendance');
    Route::post('/attendance', [AttendanceController::class, 'checkInStore'])->name('dashboard.attendance.checkIn');
    Route::put('/attendance', [AttendanceController::class, 'checkOutStore'])->name('dashboard.attendance.checkOut');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    // Register route
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
});
