<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Simpan / update penilaian user untuk sebuah buku.
     */
    public function store(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $userId = $user->id;

        $existing = Review::where('book_id', $book->id)
            ->where('user_id', $userId)
            ->first();

        if ($existing) {
            $existing->update($validated);

            return back()->with('success', 'Penilaian Anda berhasil diperbarui.');
        }

        Review::create([
            'book_id' => $book->id,
            'user_id' => $userId,
            'rating'  => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with('success', 'Terima kasih atas penilaian Anda!');
    }

    /**
     * Hapus penilaian — owner atau admin boleh hapus.
     */
    public function destroy(Review $review): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->id !== $review->user_id && ! $user->isAdmin()) {
            abort(403, 'Anda tidak berhak menghapus penilaian ini.');
        }

        $review->delete();

        return back()->with('success', 'Penilaian berhasil dihapus.');
    }
}
