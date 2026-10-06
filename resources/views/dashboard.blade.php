<x-app-layout>
    @section('title', 'Dashboard')

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">
                    Selamat datang, {{ auth()->user()->name }}! 👋
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Aplikasi Perpustakaan — UTS Pemrograman Web III
                </p>
            </div>

            {{-- Kartu Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-indigo-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm text-gray-500">Total Buku</div>
                            <div class="text-3xl font-bold text-indigo-600">
                                {{ \App\Models\Book::count() }}
                            </div>
                        </div>
                        <div class="text-4xl">📚</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm text-gray-500">Total Kategori</div>
                            <div class="text-3xl font-bold text-green-600">
                                {{ \App\Models\Category::count() }}
                            </div>
                        </div>
                        <div class="text-4xl">🏷️</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm text-gray-500">Total Stok Buku</div>
                            <div class="text-3xl font-bold text-yellow-600">
                                {{ \App\Models\Book::sum('stock') }}
                            </div>
                        </div>
                        <div class="text-4xl">📦</div>
                    </div>
                </div>

            </div>

            {{-- Menu Cepat --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('books.index') }}"
                    class="block p-6 bg-indigo-50 hover:bg-indigo-100 rounded-lg border border-indigo-200 transition">
                    <div class="text-3xl mb-2">📚</div>
                    <div class="font-bold text-lg text-indigo-700">Daftar Buku</div>
                    <div class="text-sm text-gray-600">Lihat & kelola data buku</div>
                </a>

                <a href="{{ route('books.create') }}"
                    class="block p-6 bg-green-50 hover:bg-green-100 rounded-lg border border-green-200 transition">
                    <div class="text-3xl mb-2">➕</div>
                    <div class="font-bold text-lg text-green-700">Tambah Buku</div>
                    <div class="text-sm text-gray-600">Tambahkan buku baru ke perpustakaan</div>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>