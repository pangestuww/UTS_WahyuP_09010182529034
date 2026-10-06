<x-app-layout>
    @section('title', 'Profile')

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Pengaturan Profil</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola informasi akun Anda</p>
            </div>

            {{-- Profile Info Card --}}
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl shadow-sm p-6 mb-6 text-white">
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur rounded-full flex items-center justify-center text-3xl font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">{{ auth()->user()->name }}</h2>
                        <p class="text-indigo-100 text-sm">{{ auth()->user()->email }}</p>
                        <span class="inline-block mt-2 bg-white/20 backdrop-blur text-xs font-semibold px-3 py-1 rounded-full">
                            Member sejak {{ auth()->user()->created_at->format('M Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow-sm border border-gray-100 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow-sm border border-gray-100 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow-sm border border-gray-100 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>