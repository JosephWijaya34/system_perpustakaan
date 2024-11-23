<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriesBooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/login', [AuthController::class, 'ValidateLogin'])->name('validate-login');
    Route::get('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/register', [AuthController::class, 'ValidateRegister'])->name('validate-register');
});

Route::middleware(['member'])->group(function () {
    Route::get('/', function () {
        return view('user.home-page', [
            'title' => 'Home',
        ]);
    });
});

// Route::middleware(['admin'])->group(function () {
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('admin.dashboard', [
        'title' => 'dashboard',
    ]);
});

Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
// });
