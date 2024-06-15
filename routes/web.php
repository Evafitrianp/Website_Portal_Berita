<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\PostController as PublicPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route default Laravel Breeze untuk autentikasi
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Menampilkan 3 berita terbaru dan semua berita
    Route::get('/berita', [PublicPostController::class, 'index'])->name('berita.index');
    Route::get('/semua-berita', [PublicPostController::class, 'allPosts'])->name('berita.all');
    Route::get('/berita/{id}', [PublicPostController::class, 'show'])->name('berita.show');
    
    // Routing untuk CRUD posts oleh admin
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
        Route::resource('posts', AdminPostController::class);
        Route::get('posts/data', [AdminPostController::class, 'data'])->name('posts.data');
    });
});

require __DIR__.'/auth.php';
