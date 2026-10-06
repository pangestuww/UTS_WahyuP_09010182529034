<x-guest-layout>
    <div class="text-center mb-6">
        <div class="text-5xl mb-2">📚</div>
        <h1 class="text-2xl font-bold text-gray-800">Daftar Akun</h1>
        <p class="text-sm text-gray-500 mt-1">Buat akun untuk mengelola perpustakaan</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name"
                placeholder="Budi Santoso" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autocomplete="username"
                placeholder="email@contoh.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" placeholder="Minimal 8 karakter" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password"
                placeholder="Ulangi password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="w-full justify-center py-3">
                {{ __('REGISTER') }}
            </x-primary-button>
        </div>

        <div class="text-center text-sm text-gray-600 pt-2">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-indigo-600 font-medium hover:underline">
                Login di sini
            </a>
        </div>
    </form>
</x-guest-layout>