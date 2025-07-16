<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', \App\Http\Controllers\Home\HomeController::class)->name('home');
Route::get('/discussion/{discussion:slug}', \App\Http\Controllers\Home\SingleController::class)->name('single.show');
Route::post('/markdown', \App\Http\Controllers\Home\MarkdownController::class)->name('markdown');

Route::middleware('auth')->group(function () {
    Route::post('/discussion', \App\Http\Controllers\Home\DiscussionController::class)->name('discussion.store');
    Route::post('/discussion/{discussion}/posts', \App\Http\Controllers\Home\PostController::class)->name('posts.store');
    Route::patch('/posts/{post}', \App\Http\Controllers\Home\EditController::class)->name('posts.patch');
});

require __DIR__.'/auth.php';
