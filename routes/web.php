<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('home');

Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/blog', [Controllers\ArticleController::class, 'index'])->name('blog');
Route::get('/blog/create', [Controllers\ArticleController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.create');
Route::post('/blog', [Controllers\ArticleController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.store');
Route::get('/blog/{article:slug}', [Controllers\ArticleController::class, 'show'])->name('blog.show');
Route::get('/blog/{article}/edit', [Controllers\ArticleController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.edit');
Route::put('/blog/{article}', [Controllers\ArticleController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.update');
Route::delete('/blog/{article}', [Controllers\ArticleController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
