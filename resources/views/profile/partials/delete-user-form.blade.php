<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-red-600">
            {{ __('Hapus Akun') }}
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            {{ __('Setelah akun dihapus, semua data akan hilang permanen. Pastikan Anda sudah yakin.') }}
        </p>
    </header>

    <button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        {{ __('Hapus Akun') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-gray-800">
                {{ __('Yakin ingin menghapus akun?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-500">
                {{ __('Setelah akun dihapus, semua data akan hilang permanen. Masukkan password untuk konfirmasi.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')"
                    class="px-5 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                    {{ __('Batal') }}
                </button>

                <button type="submit"
                    class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-semibold transition">
                    {{ __('Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>