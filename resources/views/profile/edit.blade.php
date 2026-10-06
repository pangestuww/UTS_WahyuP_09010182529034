<x-app-layout>
    @section('title', 'Profile')

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Pengaturan Profil</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola informasi akun Anda</p>
            </div>

            {{-- Profile Header Card --}}
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl shadow-sm p-6 mb-6 text-white">
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur rounded-full flex items-center justify-center text-3xl font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-2xl font-bold">{{ auth()->user()->name }}</h2>
                            @if(auth()->user()->isAdmin())
                            <span class="text-[10px] font-bold bg-red-100 text-red-700 px-2 py-0.5 rounded-full uppercase">Admin</span>
                            @else
                            <span class="text-[10px] font-bold bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full uppercase">User</span>
                            @endif
                        </div>
                        <p class="text-indigo-100 text-sm">{{ auth()->user()->email }}</p>
                        <span class="inline-block mt-2 bg-white/20 backdrop-blur text-xs font-semibold px-3 py-1 rounded-full">
                            Member sejak {{ auth()->user()->created_at->format('M Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="space-y-6">

                {{-- Update Profile Info --}}
                <div class="p-6 sm:p-8 bg-white shadow-sm border border-gray-100 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                {{-- Update Password --}}
                <div class="p-6 sm:p-8 bg-white shadow-sm border border-gray-100 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- LOGOUT SECTION --}}
                <div class="p-6 sm:p-8 bg-white shadow-sm border border-gray-100 sm:rounded-2xl">
                    <section>
                        <header class="mb-4">
                            <h2 class="text-lg font-bold text-gray-800">
                                Logout Akun
                            </h2>
                            <p class="mt-1 text-sm text-gray-500">
                                Keluar dari akun Anda. Anda akan diarahkan kembali ke halaman login.
                            </p>
                        </header>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-gray-800 hover:bg-gray-900 text-white px-6 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout Sekarang
                            </button>
                        </form>
                    </section>
                </div>

                {{-- Delete Account --}}
                <div class="p-6 sm:p-8 bg-white shadow-sm border border-gray-100 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>