<x-app-layout>
    @section('title', 'Tambah Buku')

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <nav class="flex items-center gap-2 text-sm mb-4">
                <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-indigo-600 transition">
                    Daftar Buku
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-800 font-medium">Tambah Buku</span>
            </nav>

            <div class="mb-6 flex items-center gap-3">
                <div class="bg-indigo-100 text-indigo-600 p-2.5 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Tambah Buku</h1>
                    <p class="text-sm text-gray-500">Lengkapi form untuk menambah buku baru</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <p class="font-semibold text-sm mb-1">Terdapat kesalahan pada form:</p>
                            <ul class="list-disc list-inside text-sm space-y-0.5">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    @include('books._form')

                    <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col sm:flex-row gap-3">
                        <button class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Buku
                        </button>
                        <a href="{{ route('books.index') }}"
                            class="inline-flex items-center justify-center gap-2 border border-gray-200 hover:bg-gray-50 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-medium transition">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>