@php $b = $book ?? null; @endphp

<div class="space-y-5">

    <div>
        <label class="block mb-1.5 text-sm font-semibold text-gray-700">
            Kategori <span class="text-red-500">*</span>
        </label>
        <select name="category_id"
            class="w-full border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ old('category_id', $b->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <label class="block mb-1.5 text-sm font-semibold text-gray-700">
            Judul Buku <span class="text-red-500">*</span>
        </label>
        <input type="text" name="title" value="{{ old('title', $b->title ?? '') }}"
            placeholder="Contoh: Laskar Pelangi"
            class="w-full border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
        @error('title')
        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                Penulis <span class="text-red-500">*</span>
            </label>
            <input type="text" name="author" value="{{ old('author', $b->author ?? '') }}"
                placeholder="Contoh: Andrea Hirata"
                class="w-full border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            @error('author')
            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                Penerbit <span class="text-red-500">*</span>
            </label>
            <input type="text" name="publisher" value="{{ old('publisher', $b->publisher ?? '') }}"
                placeholder="Contoh: Bentang Pustaka"
                class="w-full border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            @error('publisher')
            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                Tahun Terbit <span class="text-red-500">*</span>
            </label>
            <input type="number" name="year" value="{{ old('year', $b->year ?? '') }}"
                placeholder="Contoh: 2005"
                class="w-full border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            @error('year')
            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                Stok <span class="text-red-500">*</span>
            </label>
            <input type="number" name="stock" value="{{ old('stock', $b->stock ?? 0) }}"
                placeholder="Contoh: 10"
                class="w-full border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            @error('stock')
            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
    </div>

</div>