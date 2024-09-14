<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Redirect to login by default
Route::redirect('/', '/login');

// Authentication Routes
Route::get('/login', [AuthController::class, 'getLoginPage'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');


Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage') ;

Route::resource('hostels', HostelController::class)->middleware('auth');
Route::resource('rooms', RoomController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');


