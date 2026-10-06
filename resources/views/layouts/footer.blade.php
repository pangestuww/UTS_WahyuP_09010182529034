@php
$isAdmin = auth()->check() && auth()->user()->isAdmin();
@endphp

<footer class="mt-auto border-t
               {{ $isAdmin
                   ? 'bg-slate-900 border-slate-800'
                   : 'bg-white border-gray-200' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">

            {{-- Kiri: Logo + Copyright --}}
            <div class="flex items-center gap-2.5">
                <div class="w-7 h-7 rounded-md flex items-center justify-center font-bold text-white text-xs
                            {{ $isAdmin
                                ? 'bg-gradient-to-br from-indigo-500 to-purple-600'
                                : 'bg-gradient-to-br from-emerald-500 to-teal-600' }}">
                    {{ $isAdmin ? 'A' : 'M' }}
                </div>
                <span class="text-sm font-semibold {{ $isAdmin ? 'text-slate-200' : 'text-gray-800' }}">
                    Sistem Perpustakaan
                </span>
                <span class="text-xs {{ $isAdmin ? 'text-slate-400' : 'text-gray-500' }}">
                    &copy; {{ date('Y') }}
                </span>
            </div>

            {{-- Tengah: Info --}}
            <div class="text-xs font-medium {{ $isAdmin ? 'text-slate-300' : 'text-gray-600' }}">
                @if($isAdmin)
                Admin Panel — UTS Pemrograman Web III
                @else
                Member Area — UTS Pemrograman Web III
                @endif
            </div>

            {{-- Kanan: Status --}}
            <div class="flex items-center gap-2 text-xs font-medium">
                <span class="w-2 h-2 rounded-full {{ $isAdmin ? 'bg-green-400' : 'bg-emerald-500' }} animate-pulse"></span>
                <span class="{{ $isAdmin ? 'text-slate-300' : 'text-gray-600' }}">Sistem Aktif</span>
            </div>

        </div>
    </div>
</footer>