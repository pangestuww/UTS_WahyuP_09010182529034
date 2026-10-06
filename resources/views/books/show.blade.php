<x-app-layout>
    @section('title', 'Detail Buku')

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                <a href="{{ route('books.index') }}" class="hover:text-indigo-600 transition">Daftar Buku</a>
                <span>/</span>
                <span class="text-gray-700 font-medium truncate">{{ $book->title }}</span>
            </nav>

            {{-- Page Title --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="w-11 h-11 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 leading-tight">Detail Buku</h1>
                    <p class="text-sm text-gray-500">Informasi lengkap tentang buku</p>
                </div>
            </div>

            @if(session('success'))
            <div data-auto-dismiss class="mb-5 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
            @endif

            {{-- MAIN CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-6 sm:px-8 sm:py-8">
                    <div class="flex items-center gap-5">
                        <div class="hidden sm:flex w-20 h-28 bg-white/20 backdrop-blur rounded-lg items-center justify-center flex-shrink-0 border border-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <span class="inline-block bg-white/20 text-white text-xs font-semibold px-2.5 py-1 rounded-full mb-2">
                                {{ $book->category->name ?? 'Tanpa Kategori' }}
                            </span>
                            <h2 class="text-xl sm:text-2xl font-bold text-white leading-snug break-words">
                                {{ $book->title }}
                            </h2>
                            <p class="text-indigo-100 text-sm mt-1">oleh {{ $book->author }}</p>

                            @if($book->reviews->count() > 0)
                            <div class="flex items-center gap-2 mt-2">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 {{ $i <= round($book->averageRating()) ? 'text-yellow-300' : 'text-white/30' }}"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        @endfor
                                </div>
                                <span class="text-xs text-white/90">
                                    {{ $book->averageRating() }} / 5 ({{ $book->reviews->count() }} ulasan)
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="px-6 py-6 sm:px-8 sm:py-8">

                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                        <div class="border border-gray-200 rounded-xl p-4">
                            <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-1">Penerbit</div>
                            <div class="text-sm font-semibold text-gray-800 break-words">{{ $book->publisher }}</div>
                        </div>
                        <div class="border border-gray-200 rounded-xl p-4">
                            <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-1">Tahun</div>
                            <div class="text-sm font-semibold text-gray-800">{{ $book->year }}</div>
                        </div>
                        <div class="border border-gray-200 rounded-xl p-4">
                            <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-1">Stok</div>
                            <div class="text-sm font-semibold text-gray-800">{{ $book->stock }} <span class="font-normal text-gray-500">buku</span></div>
                        </div>
                        <div class="border border-gray-200 rounded-xl p-4">
                            <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-1">Status</div>
                            @if($book->stock > 5)
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-green-700">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span> Tersedia
                            </span>
                            @elseif($book->stock > 0)
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-yellow-700">
                                <span class="w-2 h-2 rounded-full bg-yellow-500"></span> Terbatas
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-red-700">
                                <span class="w-2 h-2 rounded-full bg-red-500"></span> Habis
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-sm font-bold text-gray-800 mb-2">Deskripsi Kategori</h3>
                        <div class="bg-gray-50 border border-gray-100 rounded-xl p-4">
                            <p class="text-sm font-semibold text-gray-800 mb-1">{{ $book->category->name ?? '-' }}</p>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $book->category->description ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                    </div>

                    @if(!auth()->user()->isAdmin())
                    <div class="mb-6 p-3 bg-blue-50 border border-blue-200 rounded-lg flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs text-blue-800">
                            Anda login sebagai <strong>Member</strong>. Hanya admin yang dapat mengedit atau menghapus buku.
                        </p>
                    </div>
                    @endif

                    <div class="pt-6 border-t border-gray-100 flex flex-wrap gap-2">
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('books.edit', $book) }}"
                            class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST"
                            class="inline" onsubmit="return confirm('Yakin hapus buku ini?')">
                            @csrf @method('DELETE')
                            <button class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                        @endif

                        <a href="{{ route('books.index') }}"
                            class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg text-sm font-medium transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                    </div>

                </div>
            </div>

            {{-- SECTION REVIEW --}}
            <div class="mt-6 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-6 sm:px-8 py-5 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Penilaian & Ulasan</h3>
                        <p class="text-sm text-gray-500">
                            {{ $book->reviews->count() }} ulasan
                            @if($book->reviews->count() > 0)
                            · rata-rata <strong class="text-yellow-600">{{ $book->averageRating() }} / 5</strong>
                            @endif
                        </p>
                    </div>
                    @if($book->reviews->count() > 0)
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-800">{{ $book->averageRating() }}</div>
                        <div class="flex items-center justify-end">
                            @for($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 {{ $i <= round($book->averageRating()) ? 'text-yellow-400' : 'text-gray-300' }}"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                @endfor
                        </div>
                    </div>
                    @endif
                </div>

                <div class="p-6 sm:p-8">

                    @if(!auth()->user()->isAdmin())
                    <div x-data="{ editing: {{ $myReview ? 'false' : 'true' }} }" class="mb-8">

                        @if($myReview)
                        <div x-show="!editing" class="p-5 bg-indigo-50 border border-indigo-100 rounded-xl">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex items-start gap-3 flex-1 min-w-0">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0 text-sm">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="font-semibold text-gray-800 text-sm">{{ auth()->user()->name }}</span>
                                            <span class="text-[10px] font-bold bg-indigo-100 text-indigo-700 px-1.5 py-0.5 rounded uppercase">Anda</span>
                                            <span class="text-xs text-gray-400">· {{ $myReview->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="flex items-center mt-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 {{ $i <= $myReview->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                @endfor
                                                <span class="ml-2 text-xs text-gray-500">{{ $myReview->rating }}/5</span>
                                        </div>
                                        @if($myReview->comment)
                                        <p class="mt-2 text-sm text-gray-700 leading-relaxed">{{ $myReview->comment }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center gap-1 flex-shrink-0">
                                    <button type="button" @click="editing = true"
                                        class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('reviews.destroy', $myReview) }}" method="POST"
                                        onsubmit="return confirm('Hapus penilaian ini?')" class="flex-shrink-0">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div x-show="editing" x-transition class="p-5 bg-indigo-50 border border-indigo-100 rounded-xl">
                            <h4 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                {{ $myReview ? 'Edit Penilaian Anda' : 'Berikan Penilaian Anda' }}
                            </h4>

                            <form action="{{ route('reviews.store', $book) }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Rating</label>
                                    <div class="flex items-center gap-1" x-data="{ rating: {{ old('rating', $myReview->rating ?? 0) }}, hover: 0 }">
                                        @for($i = 1; $i <= 5; $i++)
                                            <button type="button" @click="rating = {{ $i }}"
                                            @mouseenter="hover = {{ $i }}" @mouseleave="hover = 0"
                                            class="focus:outline-none transition-transform hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 transition-colors"
                                                :class="(hover || rating) >= {{ $i }} ? 'text-yellow-400' : 'text-gray-300'"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            </button>
                                            @endfor
                                            <span class="ml-3 text-sm text-gray-600" x-text="rating ? rating + ' bintang' : 'Pilih bintang'"></span>
                                            <input type="hidden" name="rating" :value="rating" required>
                                    </div>
                                    @error('rating') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Komentar (opsional)</label>
                                    <textarea name="comment" rows="3" placeholder="Bagaimana pendapat Anda tentang buku ini?"
                                        class="w-full border border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition text-sm p-3">{{ old('comment', $myReview->comment ?? '') }}</textarea>
                                    @error('comment') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="flex flex-wrap gap-2">
                                    <button type="submit"
                                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                        {{ $myReview ? 'Simpan Perubahan' : 'Kirim Penilaian' }}
                                    </button>
                                    @if($myReview)
                                    <button type="button" @click="editing = false"
                                        class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg text-sm font-medium transition">
                                        Batal
                                    </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif

                    @php
                    $otherReviews = $book->reviews
                    ->when(auth()->check(), fn($c) => $c->where('user_id', '!=', auth()->id()))
                    ->sortByDesc('created_at');
                    @endphp

                    @if($otherReviews->count() > 0)
                    <div class="space-y-5">
                        @foreach($otherReviews as $review)
                        <div class="border border-gray-100 rounded-xl p-4 hover:bg-gray-50/30 transition">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0 text-sm">
                                    {{ strtoupper(substr($review->user->name ?? '?', 0, 1)) }}
                                </div>

                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="font-semibold text-gray-800 text-sm">{{ $review->user->name ?? 'User' }}</span>
                                        @if($review->user && $review->user->isAdmin())
                                        <span class="text-[10px] font-bold bg-red-100 text-red-700 px-1.5 py-0.5 rounded">ADMIN</span>
                                        @endif
                                        <span class="text-xs text-gray-400">· {{ $review->created_at->diffForHumans() }}</span>
                                    </div>

                                    <div class="flex items-center mt-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            @endfor
                                            <span class="ml-2 text-xs text-gray-500">{{ $review->rating }}/5</span>
                                    </div>

                                    @if($review->comment)
                                    <p class="mt-2 text-sm text-gray-700 leading-relaxed">{{ $review->comment }}</p>
                                    @endif

                                    <div class="mt-3 flex items-center gap-4">
                                        <div x-data="{ open: false }" class="inline">
                                            <button type="button" @click="open = !open"
                                                class="inline-flex items-center gap-1.5 text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                                </svg>
                                                <span x-text="open ? 'Batal' : 'Balas'"></span>
                                                @if($review->replies->count() > 0)
                                                <span class="text-gray-400 font-normal">({{ $review->replies->count() }})</span>
                                                @endif
                                            </button>
                                        </div>
                                    </div>

                                    @if($review->replies->count() > 0)
                                    <div class="mt-3 pl-4 border-l-2 border-indigo-100 space-y-2">
                                        @foreach($review->replies as $reply)
                                        @php $isMyReply = auth()->id() === $reply->user_id; @endphp
                                        <div class="flex items-start gap-2 group">
                                            <div class="w-7 h-7 bg-gray-200 rounded-full flex items-center justify-center text-gray-700 font-bold flex-shrink-0 text-xs">
                                                {{ strtoupper(substr($reply->user->name ?? '?', 0, 1)) }}
                                            </div>
                                            <div class="flex-1 min-w-0 bg-gray-50 rounded-lg px-3 py-2">
                                                <div class="flex items-center gap-1.5 flex-wrap">
                                                    <span class="font-semibold text-xs text-gray-800">{{ $reply->user->name ?? 'User' }}</span>
                                                    @if($reply->user && $reply->user->isAdmin())
                                                    <span class="text-[9px] font-bold bg-red-100 text-red-700 px-1.5 py-0.5 rounded">ADMIN</span>
                                                    @endif
                                                    @if($isMyReply)
                                                    <span class="text-[9px] font-bold bg-indigo-100 text-indigo-700 px-1.5 py-0.5 rounded">ANDA</span>
                                                    @endif
                                                    <span class="text-[10px] text-gray-400">· {{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="text-xs text-gray-700 mt-0.5 leading-relaxed">{{ $reply->body }}</p>
                                            </div>

                                            @if($isMyReply || auth()->user()->isAdmin())
                                            <form action="{{ route('replies.destroy', $reply) }}" method="POST"
                                                onsubmit="return confirm('Hapus balasan ini?')"
                                                class="flex-shrink-0 opacity-0 group-hover:opacity-100 transition">
                                                @csrf @method('DELETE')
                                                <button class="text-red-400 hover:text-red-600 p-1 rounded transition" title="Hapus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif

                                    <div x-data="{ open: false }" class="mt-3">
                                        <form x-show="open" x-transition
                                            action="{{ route('replies.store', $review) }}"
                                            method="POST" class="flex items-start gap-2">
                                            @csrf
                                            <div class="w-7 h-7 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0 text-xs">
                                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                            </div>
                                            <div class="flex-1">
                                                <textarea name="body" rows="2" required placeholder="Tulis balasan Anda..."
                                                    class="w-full border border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition text-xs p-2.5 resize-none"></textarea>
                                                <div class="mt-1.5">
                                                    <button type="submit"
                                                        class="inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                                        Kirim Balasan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                @if(auth()->user()->isAdmin())
                                <form action="{{ route('reviews.destroy', $review) }}" method="POST"
                                    onsubmit="return confirm('Hapus penilaian ini?')" class="flex-shrink-0">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded-lg transition" title="Hapus review">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if($book->reviews->count() === 0)
                    <div class="text-center py-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-sm">Belum ada penilaian untuk buku ini.</p>
                        @if(!auth()->user()->isAdmin())
                        <p class="text-gray-400 text-xs mt-1">Jadilah yang pertama memberi ulasan!</p>
                        @endif
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>