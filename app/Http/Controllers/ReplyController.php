<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Simpan balasan untuk sebuah review.
     */
    public function store(Request $request, Review $review): RedirectResponse
    {
        $validated = $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        /** @var User $user */
        $user = Auth::user();

        Reply::create([
            'review_id' => $review->id,
            'user_id'   => $user->id,
            'body'      => $validated['body'],
        ]);

        return back()->with('success', 'Balasan berhasil dikirim.');
    }

    /**
     * Hapus balasan — owner atau admin boleh hapus.
     */
    public function destroy(Reply $reply): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var int $replyOwnerId */
        $replyOwnerId = $reply->user_id;

        if ($user->id !== $replyOwnerId && ! $user->isAdmin()) {
            abort(403, 'Anda tidak berhak menghapus balasan ini.');
        }

        $reply->delete();

        return back()->with('success', 'Balasan berhasil dihapus.');
    }
}
