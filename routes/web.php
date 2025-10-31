<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('guest');
});
// Route::resource('auth', AuthController::class);
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
// POST actions for login & register (only accessible to guests)
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login.post')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('auth.register.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('index');
    })->name('dashboard');
    Route::resource('rooms', RoomController::class);
});
