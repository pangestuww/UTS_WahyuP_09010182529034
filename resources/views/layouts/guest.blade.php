<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perpustakaan') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex">

        {{-- ============ KIRI: BRANDING (Desktop) ============ --}}
        <div class="hidden lg:flex lg:w-1/2 xl:w-3/5 relative overflow-hidden bg-slate-900">

            {{-- Subtle dot grid --}}
            <div class="absolute inset-0 opacity-[0.05]"
                style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>

            {{-- Soft emerald glow --}}
            <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-emerald-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-slate-500/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between p-12 xl:p-16 w-full text-white">

                {{-- Logo --}}
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-white/10 backdrop-blur border border-white/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-base font-bold leading-tight">Perpustakaan</div>
                        <div class="text-xs text-slate-400 leading-tight">Sistem Informasi Buku</div>
                    </div>
                </div>

                {{-- Headline --}}
                <div class="max-w-lg">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/5 border border-white/10 rounded-full mb-6">
                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
                        <span class="text-xs text-slate-300 font-medium">Sistem Manajemen Perpustakaan</span>
                    </div>

                    <h1 class="text-4xl xl:text-5xl font-bold leading-tight mb-5 text-white">
                        Kelola Koleksi <br> Buku dengan Mudah.
                    </h1>

                    <p class="text-slate-400 text-base leading-relaxed mb-8">
                        Platform terpadu untuk mengelola data buku, kategori, dan ulasan pengguna dalam satu sistem.
                    </p>

                    <div class="space-y-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-emerald-400" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-sm text-slate-300">Manajemen buku & kategori</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-emerald-400" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-sm text-slate-300">Pencarian & filter cepat</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-emerald-400" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-sm text-slate-300">Rating, ulasan & diskusi</span>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="flex items-center justify-between text-xs text-slate-500">
                    <span>&copy; {{ date('Y') }} Sistem Perpustakaan</span>
                    <span>UTS Pemrograman Web III</span>
                </div>
            </div>
        </div>

        {{-- ============ KANAN: FORM ============ --}}
        <div class="flex-1 flex items-center justify-center px-6 py-12 bg-gray-50">
            <div class="w-full max-w-md">
                {{ $slot }}
            </div>
        </div>

    </div>
</body>

</html>