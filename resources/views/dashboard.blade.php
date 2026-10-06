<x-app-layout>
    @section('title', 'Dashboard')

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Welcome Banner --}}
            <div class="relative overflow-hidden bg-gradient-to-r
                        {{ auth()->user()->isAdmin() ? 'from-indigo-600 via-purple-600 to-pink-500' : 'from-blue-500 via-cyan-500 to-teal-500' }}
                        rounded-2xl shadow-lg mb-8">
                <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/10 rounded-full"></div>
                <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-white/5 rounded-full"></div>

                <div class="relative p-8 sm:p-10">
                    <div class="flex items-center gap-2 mb-2">
                        @if(auth()->user()->isAdmin())
                        <span class="bg-red-500/30 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full border border-white/30 uppercase">
                            🛡️ Administrator
                        </span>
                        @else
                        <span class="bg-white/20 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full border border-white/30 uppercase">
                            👤 Member
                        </span>
                        @endif
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">
                        Halo, {{ auth()->user()->name }} 👋
                    </h1>
                    <p class="text-white/90 text-sm sm:text-base">
                        @if(auth()->user()->isAdmin())
                        Anda login sebagai <strong>Administrator</strong>. Anda dapat mengelola seluruh data buku.
                        @else
                        Anda login sebagai <strong>Member</strong>. Anda dapat melihat koleksi buku perpustakaan.
                        @endif
                    </p>
                </div>
            </div>

            {{-- Stat Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Buku</p>
                            <p class="text-4xl font-bold text-gray-800">{{ \App\Models\Book::count() }}</p>
                            <p class="text-xs text-gray-500 mt-2">buku terdaftar</p>
                        </div>
                        <div class="bg-indigo-100 text-indigo-600 p-3 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Kategori</p>
                            <p class="text-4xl font-bold text-gray-800">{{ \App\Models\Category::count() }}</p>
                            <p class="text-xs text-gray-500 mt-2">kategori buku</p>
                        </div>
                        <div class="bg-green-100 text-green-600 p-3 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Stok</p>
                            <p class="text-4xl font-bold text-gray-800">{{ \App\Models\Book::sum('stock') }}</p>
                            <p class="text-xs text-gray-500 mt-2">buku tersedia</p>
                        </div>
                        <div class="bg-yellow-100 text-yellow-600 p-3 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Quick Actions --}}
            <div class="mb-3">
                <h2 class="text-lg font-bold text-gray-800">Menu Cepat</h2>
                <p class="text-sm text-gray-500">
                    @if(auth()->user()->isAdmin())
                    Akses fitur pengelolaan
                    @else
                    Akses fitur yang tersedia untuk Anda
                    @endif
                </p>
            </div>

            <div class="grid grid-cols-1 {{ auth()->user()->isAdmin() ? 'sm:grid-cols-2' : 'sm:grid-cols-1' }} gap-5">

                <a href="{{ route('books.index') }}"
                    class="group relative bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative flex items-center gap-4">
                        <div class="bg-indigo-100 text-indigo-600 group-hover:bg-white/20 group-hover:text-white p-4 rounded-xl transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold text-lg text-gray-800 group-hover:text-white transition-colors">
                                Daftar Buku
                            </div>
                            <div class="text-sm text-gray-500 group-hover:text-indigo-100 transition-colors">
                                {{ auth()->user()->isAdmin() ? 'Lihat & kelola koleksi buku' : 'Lihat koleksi buku' }}
                            </div>
                        </div>
                        <div class="ml-auto text-gray-400 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                @if(auth()->user()->isAdmin())
                <a href="{{ route('books.create') }}"
                    class="group relative bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-emerald-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative flex items-center gap-4">
                        <div class="bg-green-100 text-green-600 group-hover:bg-white/20 group-hover:text-white p-4 rounded-xl transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold text-lg text-gray-800 group-hover:text-white transition-colors">
                                Tambah Buku
                            </div>
                            <div class="text-sm text-gray-500 group-hover:text-green-100 transition-colors">
                                Tambahkan buku baru
                            </div>
                        </div>
                        <div class="ml-auto text-gray-400 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>
                @endif

            </div>

            @if(!auth()->user()->isAdmin())
            {{-- Info untuk user biasa --}}
            <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-2xl flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <p class="text-sm font-semibold text-blue-800">Anda login sebagai Member</p>
                    <p class="text-sm text-blue-700 mt-0.5">
                        Anda hanya dapat melihat daftar dan detail buku. Untuk menambah, mengedit, atau menghapus buku, hubungi Administrator.
                    </p>
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>