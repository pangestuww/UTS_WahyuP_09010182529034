<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * READ — Daftar buku + pencarian + filter kategori (bonus).
     */
    public function index(Request $request)
    {
        $query = Book::with('category');

        // Bonus: pencarian judul / penulis
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Bonus: filter kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $books      = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    /**
     * CREATE — tampilkan form tambah buku.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * CREATE — simpan buku baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'publisher'   => 'required|string|max:255',
            'year'        => 'required|integer|digits:4',
            'stock'       => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * DETAIL — tampilkan satu buku.
     */
    public function show(Book $book)
    {
        $book->load('category');
        return view('books.show', compact('book'));
    }

    /**
     * UPDATE — tampilkan form edit.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * UPDATE — simpan perubahan.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'publisher'   => 'required|string|max:255',
            'year'        => 'required|integer|digits:4',
            'stock'       => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * DELETE — hapus buku.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
