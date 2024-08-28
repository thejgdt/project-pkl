<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('home');

Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Blog
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('blog', Controllers\ArticleController::class)
        ->parameters(['blog' => 'article'])
        ->except(['index', 'show']);
});

Route::get('/blog', [Controllers\ArticleController::class, 'index'])->name('blog');
Route::get('/blog/{article:slug}', [Controllers\ArticleController::class, 'show'])->name('blog.show');

// User
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('users', Controllers\UserController::class)
        ->except(['index', 'show']);
});

Route::get('/users', [Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/{user}', [Controllers\UserController::class, 'show'])->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
