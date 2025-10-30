<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
// Route::resource('auth', AuthController::class);
Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
// POST actions for login & register (only accessible to guests)
Route::post('auth/login', [AuthController::class, 'authenticate'])->name('auth.login.post')->middleware('guest');
Route::post('auth/register', [AuthController::class, 'store'])->name('auth.register.post')->middleware('guest');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
// Logout and protected routes (only accessible to authenticated users)
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
