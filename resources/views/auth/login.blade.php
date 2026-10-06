<x-guest-layout>
    <div class="text-center mb-6">
        <div class="text-5xl mb-2">📚</div>
        <h1 class="text-2xl font-bold text-gray-800">Perpustakaan</h1>
        <p class="text-sm text-gray-500 mt-1">Silakan login untuk melanjutkan</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username"
                placeholder="admin@test.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
            <a class="text-sm text-indigo-600 hover:underline"
                href="{{ route('password.request') }}">
                {{ __('Lupa password?') }}
            </a>
            @endif
        </div>

        <div>
            <x-primary-button class="w-full justify-center py-3">
                {{ __('LOG IN') }}
            </x-primary-button>
        </div>

        <div class="text-center text-sm text-gray-600 pt-2">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:underline">
                Daftar di sini
            </a>
        </div>
    </form>
</x-guest-layout>