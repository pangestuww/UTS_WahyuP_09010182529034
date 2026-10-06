<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile (semua user login bisa akses)
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ===== Daftar & Detail Buku — semua user login bisa lihat =====
    Route::get('/books',        [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    // ===== CRUD Buku — hanya admin =====
    Route::middleware('admin')->group(function () {
        Route::get('/books/create',      [BookController::class, 'create'])->name('books.create');
        Route::post('/books',            [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}',      [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}',   [BookController::class, 'destroy'])->name('books.destroy');
    });
});

require __DIR__ . '/auth.php';
