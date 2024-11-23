<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('user.home-page', [
        'title' => 'Home',
    ]);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::get('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/login', [AuthController::class, 'ValidateLogin'])->name('validate-login');
    Route::post('/register', [AuthController::class, 'ValidateRegister'])->name('validate-register');
});

Route::middleware(['admin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'title' => 'dashboard',
        ]);
    });
});
