<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', CategoryController::class);

// routes/web.php

Route::resource('annonces', AnnonceController::class);

Route::resource('comments', CommentController::class);

Route::get('/annonces/{annonce}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/annonces/{annonce}/comments', [CommentController::class, 'store'])->name('comments.store');

// Route::get('/comments/create/{annonce}', [CommentController::class, 'create'])->name('comments.create');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
