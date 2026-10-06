<x-app-layout>
    @section('title', 'Daftar Buku')

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Daftar Buku</h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Total {{ $books->total() }} buku terdaftar
                    </p>
                </div>
                <a href="{{ route('books.create') }}"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Buku
                </a>
            </div>

            @if(session('success'))
            <div class="mb-5 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
            @endif

            {{-- Filter Bar --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-5">
                <form method="GET" class="flex flex-col sm:flex-row gap-3">

                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari judul atau penulis..."
                            class="w-full pl-10 border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    </div>

                    <select name="category_id"
                        class="border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm sm:w-56">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                        @endforeach
                    </select>

                    <button class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg text-sm font-semibold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>

                    @if(request('search') || request('category_id'))
                    <a href="{{ route('books.index') }}"
                        class="inline-flex items-center justify-center border border-gray-200 hover:bg-gray-50 text-gray-600 px-5 py-2 rounded-lg text-sm font-medium transition">
                        Reset
                    </a>
                    @endif
                </form>
            </div>

            {{-- Table Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-12">#</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Penulis</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tahun</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Stok</th>
                                <th class="px-5 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($books as $book)
                            <tr class="hover:bg-gray-50/70 transition-colors">
                                <td class="px-5 py-4 text-gray-500 font-medium">
                                    {{ $loop->iteration + ($books->currentPage() - 1) * $books->perPage() }}
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-semibold text-gray-800">{{ $book->title }}</div>
                                    <div class="text-xs text-gray-400 mt-0.5">{{ $book->publisher }}</div>
                                </td>
                                <td class="px-5 py-4 text-gray-700">{{ $book->author }}</td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-full text-xs font-medium">
                                        {{ $book->category->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-gray-700">{{ $book->year }}</td>
                                <td class="px-5 py-4">
                                    @if($book->stock > 5)
                                    <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 px-2.5 py-1 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                        {{ $book->stock }}
                                    </span>
                                    @elseif($book->stock > 0)
                                    <span class="inline-flex items-center gap-1 bg-yellow-50 text-yellow-700 px-2.5 py-1 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                        {{ $book->stock }}
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 bg-red-50 text-red-700 px-2.5 py-1 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                        Habis
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('books.show', $book) }}"
                                            title="Detail"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('books.edit', $book) }}"
                                            title="Edit"
                                            class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('books.destroy', $book) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Yakin hapus buku ini?')">
                                            @csrf @method('DELETE')
                                            <button title="Hapus"
                                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-5 py-16 text-center">
                                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-600 font-semibold mb-1">Belum ada data buku</p>
                                    <p class="text-gray-400 text-sm mb-5">Yuk, mulai tambahkan koleksi bukumu</p>
                                    <a href="{{ route('books.create') }}"
                                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Tambah Buku Pertama
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($books->hasPages())
                <div class="px-5 py-4 border-t border-gray-100">
                    {{ $books->links() }}
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>