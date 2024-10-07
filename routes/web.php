<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::post('/contact-store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/posts', [PostController::class, 'posts'])->name('posts');

Route::get('/post/{id}', [PostController::class, 'post'])->name('post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/postList', [PostController::class, 'index'])->name('postList');
    Route::get('/create-post',[PostController::class, 'create'])->name('posts.create');
    Route::post('/store-post',[PostController::class, 'store'])->name('posts.store');
    Route::get('/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/update-post',[PostController::class, 'update'])->name('posts.update');
    Route::delete('/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/contactView', [ContactController::class, 'index'])->name('contactView');
    Route::get('/{id}/detail', [ContactController::class, 'detail'])->name('contact.detail');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
