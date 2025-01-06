<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserSignupController;


// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth

Route::get('login', [AuthController::class, 'login'])->name('/login');
Route::post('logout', [AuthController::class, 'logout'])->name('/logout');

// Registration
Route::get('/register', [UserSignupController::class, 'register'])->name('/register');
Route::get('/biodata', [UserSignupController::class, 'biodata'])->name('/biodata');
Route::get('/finalize', [UserSignupController::class, 'finalize'])->name('/finalize');
Route::get('/payment', [UserSignupController::class, 'payment'])->name('/payment');