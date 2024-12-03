<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <!-- Button to navigate to Daftar Mahasiswa page -->
                <div class="p-6">
                    <a href="{{ route('mahasiswa.index') }}"
                        class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                        Lihat Daftar Mahasiswa
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
