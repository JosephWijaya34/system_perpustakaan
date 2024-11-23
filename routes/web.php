<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserCatalogueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListBookController;
use Illuminate\Support\Facades\Route;

// Login Register
Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'ValidateLogin'])->name('validate-login');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register', [AuthController::class, 'ValidateRegister'])->name('validate-register');

// Public routes
Route::get('/', [UserCatalogueController::class, 'listBook'])->name('catalogue');

// Admin routes
Route::middleware('admin')->group(function () {
    Route::post('/admin-logout', [AuthController::class, 'Logout'])->name('admin-logout');
    Route::get('/dashboard', function () {
        return view('admin.dashboard', ['title' => 'Dashboard']);
    })->name('dashboard');

    Route::post('/confirm-return/{id}', [BookController::class, 'confirmReturn'])->name('confirm.return');
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
});
    
// Member routes
Route::middleware('member')->group(function () {
    Route::post('/member-logout', [AuthController::class, 'Logout'])->name('member-logout');
    Route::get('/catalogue', [UserCatalogueController::class, 'listBook'])->name('member.catalogue');
    Route::post('/borrow-book/{id}', [UserCatalogueController::class, 'borrowBook'])->name('borrow.book');
    Route::get('/borrowed-books', [UserListBookController::class, 'borrowedBooks'])->name('borrowed.books');
    Route::post('/return-book/{id}', [UserListBookController::class, 'returnBook'])->name('return.book');
});
