<?php

use App\Http\Controllers\AuthController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\BookController; 
use App\Http\Controllers\AuthorController; 
use App\Http\Controllers\HomeController; 
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('authors', AuthorController::class)
    -> only(['index', 'create', 'store', 'edit', 'show', 'update','destroy'])->names('admin.authors');
    Route::resource('categories', CategoryController::class)
    -> only(['index', 'create', 'store', 'edit', 'show', 'update','destroy'])->names('admin.categories');
    Route::resource('users', UserController::class)
    -> only(['index', 'create', 'store', 'edit', 'show', 'update','destroy'])->names('admin.users');
    Route::resource('books', BookController::class)
    -> only(['index', 'create', 'store', 'edit', 'show', 'update', 'destroy'])->names('admin.books');
});