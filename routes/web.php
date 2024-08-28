<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('home');

Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Blog
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('blog', Controllers\ArticleController::class)->except(['index', 'show']);
});

Route::get('/blog', [Controllers\ArticleController::class, 'index'])->name('blog');
Route::get('/blog/{article:slug}', [Controllers\ArticleController::class, 'show'])->name('blog.show');

Route::get('/users', [Controllers\UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users');
Route::get('/users/create', [Controllers\UserController::class, 'create'])->middleware(['auth', 'verified'])->name('users.create');
Route::post('/users', [Controllers\UserController::class, 'store'])->middleware(['auth', 'verified'])->name('users.store');
Route::get('/users/{user}', [Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [Controllers\UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('users.edit');
Route::put('/users/{user}', [Controllers\ArticleController::class, 'update'])->middleware(['auth', 'verified'])->name('users.update');
Route::delete('/users/{user}', [Controllers\UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('users.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
