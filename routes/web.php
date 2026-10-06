<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Root Redirect
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard (butuh login)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Fallback Logout GET
|--------------------------------------------------------------------------
*/
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout.get');

/*
|--------------------------------------------------------------------------
| Route yang butuh login
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // ============ PROFILE ============
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ============ REVIEW ============
    Route::post('/books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}',   [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // ============ REPLY ============
    Route::post('/reviews/{review}/replies', [ReplyController::class, 'store'])->name('replies.store');
    Route::delete('/replies/{reply}',        [ReplyController::class, 'destroy'])->name('replies.destroy');

    // ============ BOOKS — semua user login boleh lihat ============
    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    // ============ BOOKS — hanya admin (create/store) ============
    Route::middleware('admin')->group(function () {
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books',       [BookController::class, 'store'])->name('books.store');
    });

    // ============ BOOKS — detail (setelah create karena pakai {book}) ============
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    // ============ BOOKS — hanya admin (edit/update/delete) ============
    Route::middleware('admin')->group(function () {
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}',      [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}',   [BookController::class, 'destroy'])->name('books.destroy');
    });
});

require __DIR__ . '/auth.php';
