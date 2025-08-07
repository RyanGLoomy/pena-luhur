<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600 mb-8">
                        Ini adalah pusat kendali untuk Sistem Informasi Perpustakaan Pena Luhur. Silakan pilih menu di bawah untuk mulai mengelola data.
                    </p>

                    <!-- Grid Menu Fungsional -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <!-- Card Manajemen Buku -->
                        <a href="{{ route('admin.books.index') }}" class="block p-6 bg-gray-50 rounded-lg border border-gray-200 hover:bg-blue-100 hover:border-blue-400 transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center">
                                <!-- SVG Icon Buku -->
                                <svg class="w-8 h-8 text-blue-600 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                                <div>
                                    <h4 class="font-bold text-lg text-gray-800">Manajemen Buku</h4>
                                    <p class="text-sm text-gray-600">Tambah, edit, dan hapus koleksi buku.</p>
                                </div>
                            </div>
                        </a>

                        <!-- Card Manajemen Anggota (di dashboard.blade.php) -->
                        <a href="#" class="block p-6 bg-gray-50 rounded-lg border border-gray-200 hover:bg-green-100 hover:border-green-400 transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center">
                                <!-- SVG Icon Anggota -->
                                <svg class="w-8 h-8 text-green-600 mr-4" ...> ... </svg>
                                <div>
                                    <h4 class="font-bold text-lg text-gray-800">Manajemen Anggota</h4>
                                    <p class="text-sm text-gray-600">Kelola data anggota perpustakaan.</p>
                                </div>
                            </div>
                        </a>

                        <!-- Card Manajemen Anggota (di dashboard.blade.php) -->
                        <a href="#" class="block p-6 bg-gray-50 rounded-lg border border-gray-200 hover:bg-green-100 hover:border-green-400 transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center">
                                <!-- SVG Icon Anggota -->
                                <svg class="w-8 h-8 text-green-600 mr-4" ...> ... </svg>
                                <div>
                                    <h4 class="font-bold text-lg text-gray-800">Manajemen Anggota</h4>
                                    <p class="text-sm text-gray-600">Kelola data anggota perpustakaan.</p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
