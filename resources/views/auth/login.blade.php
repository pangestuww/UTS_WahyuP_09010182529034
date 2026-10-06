<x-guest-layout>

    {{-- Mobile logo --}}
    <div class="lg:hidden flex items-center gap-3 mb-8">
        <div class="w-10 h-10 rounded-lg bg-slate-900 flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
        <div>
            <div class="text-gray-900 font-bold text-sm">Perpustakaan</div>
            <div class="text-xs text-gray-500">Sistem Informasi Buku</div>
        </div>
    </div>

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang</h1>
        <p class="text-sm text-gray-500">Silakan login untuk melanjutkan ke aplikasi.</p>
    </div>

    {{-- Pesan sukses --}}
    @if(session('status'))
    <div data-auto-dismiss class="mb-5 p-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm flex items-center gap-2">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                Email
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="nama@email.com"
                    class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-lg text-sm bg-white
                              focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10 outline-none transition
                              @error('email') border-red-400 @enderror">
            </div>
            @error('email')
            <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                Password
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-lg text-sm bg-white
                              focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10 outline-none transition
                              @error('password') border-red-400 @enderror">
            </div>
            @error('password')
            <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember + Lupa --}}
        <div class="flex items-center justify-between text-sm">
            <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer select-none">
                <input id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-slate-900 shadow-sm focus:ring-slate-900">
                <span class="text-gray-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}"
                class="font-medium text-slate-600 hover:text-slate-900 transition">
                Lupa password?
            </a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit"
            class="w-full bg-slate-900 hover:bg-slate-800 active:bg-slate-950
                       text-white font-semibold py-3 rounded-lg text-sm
                       shadow-sm hover:shadow-md transition-all">
            Log In
        </button>

        {{-- Divider --}}
        <div class="relative my-2">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-gray-50 px-3 text-xs uppercase tracking-wider text-gray-400">atau</span>
            </div>
        </div>

        {{-- Link register --}}
        <div class="text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}"
                class="font-semibold text-slate-900 hover:underline">
                Daftar sekarang
            </a>
        </div>
    </form>

</x-guest-layout>