@php
$isAdmin = auth()->user()->isAdmin();
@endphp

<nav x-data="{ open: false }"
    class="sticky top-0 z-40
            {{ $isAdmin
                ? 'bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 border-b border-indigo-900/50'
                : 'bg-white/80 backdrop-blur-lg border-b border-emerald-100' }}">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Kiri: Logo + Menu --}}
            <div class="flex items-center gap-10">

                {{-- Logo --}}
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 group">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center font-bold text-white text-sm shadow-sm transition
                                {{ $isAdmin
                                    ? 'bg-gradient-to-br from-indigo-500 to-purple-600 group-hover:from-indigo-400 group-hover:to-purple-500'
                                    : 'bg-gradient-to-br from-emerald-500 to-teal-600 group-hover:from-emerald-400 group-hover:to-teal-500' }}">
                        {{ $isAdmin ? 'A' : 'M' }}
                    </div>
                    <div class="hidden sm:block">
                        <div class="text-base font-bold leading-tight {{ $isAdmin ? 'text-white' : 'text-gray-800' }}">
                            Perpustakaan
                        </div>
                        <div class="text-[10px] uppercase tracking-widest leading-tight {{ $isAdmin ? 'text-indigo-300' : 'text-emerald-600' }}">
                            {{ $isAdmin ? 'Admin Panel' : 'Member Area' }}
                        </div>
                    </div>
                </a>

                {{-- Menu --}}
                <div class="hidden sm:flex items-center gap-1">

                    {{-- Dashboard --}}
                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition
                              {{ request()->routeIs('dashboard')
                                  ? ($isAdmin
                                      ? 'bg-white/10 text-white shadow-sm'
                                      : 'bg-emerald-50 text-emerald-700')
                                  : ($isAdmin
                                      ? 'text-indigo-200 hover:text-white hover:bg-white/5'
                                      : 'text-gray-500 hover:text-gray-800 hover:bg-gray-100') }}">
                        Dashboard
                    </a>

                    {{-- Kelola Buku / Koleksi Buku --}}
                    <a href="{{ route('books.index') }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition
                              {{ request()->routeIs('books.index') || request()->routeIs('books.show') || request()->routeIs('books.edit')
                                  ? ($isAdmin
                                      ? 'bg-white/10 text-white shadow-sm'
                                      : 'bg-emerald-50 text-emerald-700')
                                  : ($isAdmin
                                      ? 'text-indigo-200 hover:text-white hover:bg-white/5'
                                      : 'text-gray-500 hover:text-gray-800 hover:bg-gray-100') }}">
                        {{ $isAdmin ? 'Kelola Buku' : 'Koleksi Buku' }}
                    </a>

                    {{-- Tambah Buku (admin only) --}}
                    @if($isAdmin)
                    <a href="{{ route('books.create') }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition
                                  {{ request()->routeIs('books.create')
                                      ? 'bg-white/10 text-white shadow-sm'
                                      : 'text-indigo-200 hover:text-white hover:bg-white/5' }}">
                        Tambah Buku
                    </a>
                    @endif
                </div>
            </div>

            {{-- Kanan: User Dropdown --}}
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2.5 px-2.5 py-1.5 rounded-full transition
                                       {{ $isAdmin ? 'hover:bg-white/10' : 'hover:bg-gray-100' }}">
                            <span class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs text-white
                                         {{ $isAdmin
                                             ? 'bg-gradient-to-br from-indigo-500 to-purple-600'
                                             : 'bg-gradient-to-br from-emerald-500 to-teal-600' }}">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <div class="text-left hidden sm:block">
                                <div class="text-sm font-semibold leading-tight {{ $isAdmin ? 'text-white' : 'text-gray-800' }}">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-[10px] uppercase tracking-wider leading-tight font-medium
                                            {{ $isAdmin ? 'text-indigo-300' : 'text-emerald-600' }}">
                                    {{ $isAdmin ? 'Administrator' : 'Member' }}
                                </div>
                            </div>
                            <svg class="w-4 h-4 {{ $isAdmin ? 'text-indigo-300' : 'text-gray-400' }}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profil Saya
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Hamburger Mobile --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="p-2 rounded-md transition
                               {{ $isAdmin
                                   ? 'text-indigo-200 hover:text-white hover:bg-white/10'
                                   : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100' }}">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t
                {{ $isAdmin ? 'border-indigo-900/50 bg-indigo-950' : 'border-emerald-100 bg-white' }}">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}"
                class="block px-3 py-2 rounded-lg text-sm font-medium
                      {{ $isAdmin ? 'text-indigo-100 hover:bg-white/10' : 'text-gray-600 hover:bg-gray-100' }}">
                Dashboard
            </a>
            <a href="{{ route('books.index') }}"
                class="block px-3 py-2 rounded-lg text-sm font-medium
                      {{ $isAdmin ? 'text-indigo-100 hover:bg-white/10' : 'text-gray-600 hover:bg-gray-100' }}">
                {{ $isAdmin ? 'Kelola Buku' : 'Koleksi Buku' }}
            </a>
            @if($isAdmin)
            <a href="{{ route('books.create') }}"
                class="block px-3 py-2 rounded-lg text-sm font-medium text-indigo-100 hover:bg-white/10">
                Tambah Buku
            </a>
            @endif
        </div>

        <div class="pt-4 pb-3 border-t {{ $isAdmin ? 'border-indigo-900/50' : 'border-emerald-100' }}">
            <div class="px-4 flex items-center gap-3">
                <span class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm text-white
                             {{ $isAdmin
                                 ? 'bg-gradient-to-br from-indigo-500 to-purple-600'
                                 : 'bg-gradient-to-br from-emerald-500 to-teal-600' }}">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
                <div>
                    <div class="font-semibold text-sm {{ $isAdmin ? 'text-white' : 'text-gray-800' }}">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="text-xs {{ $isAdmin ? 'text-indigo-300' : 'text-emerald-600' }}">
                        {{ Auth::user()->email }}
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-4">
                <a href="{{ route('profile.edit') }}"
                    class="block px-3 py-2 rounded-lg text-sm
                          {{ $isAdmin ? 'text-indigo-100 hover:bg-white/10' : 'text-gray-600 hover:bg-gray-100' }}">
                    Profil Saya
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block px-3 py-2 rounded-lg text-sm
                              {{ $isAdmin ? 'text-red-300 hover:bg-white/10' : 'text-red-600 hover:bg-red-50' }}">
                        Logout
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>