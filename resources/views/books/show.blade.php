<x-app-layout>
    @section('title', 'Detail Buku')

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('books.index') }}" class="text-sm text-indigo-600 hover:underline">
                    ← Kembali ke daftar
                </a>
                <h1 class="text-2xl font-bold text-gray-800 mt-2">Detail Buku</h1>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">

                {{-- Header Card --}}
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6 text-white">
                    <div class="text-5xl mb-2">📖</div>
                    <h2 class="text-2xl font-bold">{{ $book->title }}</h2>
                    <p class="text-indigo-100">oleh {{ $book->author }}</p>
                </div>

                {{-- Detail --}}
                <div class="p-6">
                    <table class="w-full text-sm">
                        <tr class="border-b">
                            <td class="py-3 font-semibold w-40 text-gray-600">Judul</td>
                            <td class="py-3 text-gray-800">{{ $book->title }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 font-semibold text-gray-600">Penulis</td>
                            <td class="py-3 text-gray-800">{{ $book->author }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 font-semibold text-gray-600">Penerbit</td>
                            <td class="py-3 text-gray-800">{{ $book->publisher }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 font-semibold text-gray-600">Tahun Terbit</td>
                            <td class="py-3 text-gray-800">{{ $book->year }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 font-semibold text-gray-600">Stok</td>
                            <td class="py-3">
                                @if($book->stock > 5)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $book->stock }} tersedia
                                </span>
                                @elseif($book->stock > 0)
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $book->stock }} tersisa
                                </span>
                                @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Habis
                                </span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 font-semibold text-gray-600">Kategori</td>
                            <td class="py-3">
                                <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $book->category->name ?? '-' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 font-semibold text-gray-600">Deskripsi Kategori</td>
                            <td class="py-3 text-gray-700">{{ $book->category->description ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="mt-6 flex gap-2">
                        <a href="{{ route('books.edit', $book) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-md transition">
                            Edit
                        </a>
                        <a href="{{ route('books.index') }}"
                            class="px-6 py-2 border border-gray-300 rounded-md hover:bg-gray-50 transition">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>