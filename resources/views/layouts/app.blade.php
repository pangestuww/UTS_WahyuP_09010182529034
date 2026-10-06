<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perpustakaan') }} - @yield('title', 'UTS')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased
                 {{ auth()->check() && auth()->user()->isAdmin()
                     ? 'bg-slate-100'
                     : 'bg-gradient-to-br from-emerald-50 via-white to-teal-50' }}">

    <div class="min-h-screen flex flex-col">
        @include('layouts.navigation')

        <main class="flex-1">
            {{ $slot }}
        </main>

        @include('layouts.footer')
    </div>

    {{-- AUTO-DISMISS ALERTS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-auto-dismiss]').forEach(function(el) {
                const delay = parseInt(el.dataset.autoDismiss) || 3000;
                setTimeout(function() {
                    el.style.transition = 'opacity 0.4s ease, transform 0.4s ease, max-height 0.4s ease, margin 0.4s ease, padding 0.4s ease';
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(-8px)';
                    el.style.maxHeight = '0';
                    el.style.marginTop = '0';
                    el.style.marginBottom = '0';
                    el.style.paddingTop = '0';
                    el.style.paddingBottom = '0';
                    el.style.overflow = 'hidden';
                    setTimeout(() => el.remove(), 450);
                }, delay);
            });
        });
    </script>
</body>

</html>