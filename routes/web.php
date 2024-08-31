<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('home');

Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Blog
Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware('role:admin,member')->group(function () {
        Route::resource('blog', Controllers\ArticleController::class)
            ->parameters(['blog' => 'article'])
            ->except(['index', 'show']);
    });
});

Route::get('/blog', [Controllers\ArticleController::class, 'index'])->name('blog');
Route::get('/blog/{article:slug}', [Controllers\ArticleController::class, 'show'])->name('blog.show');

// User
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::resource('users', Controllers\UserController::class)
        ->names([
            'index' => 'users',
        ]);
});

// Unauthorized
Route::get('/unauthorized', function () {
    abort(403);
})->name('unauthorized');

// Like & Unlike
Route::post('articles/{article}/like', [Controllers\LikeController::class, 'likeArticle'])->name('articles.like');
Route::delete('articles/{article}/unlike', [Controllers\LikeController::class, 'unlikeArticle'])->name('articles.unlike');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
