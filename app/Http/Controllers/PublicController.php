<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Menampilkan Halaman Utama (Home).
     */
    public function home()
    {
        // Ambil 8 buku terbaru untuk ditampilkan di halaman utama
        $latestBooks = Book::latest()->take(8)->get();
        return view('public.home', compact('latestBooks'));
    }

    /**
     * Menampilkan halaman koleksi buku dengan fitur pencarian.
     */
    public function koleksi(Request $request)
    {
        // Ambil kata kunci pencarian dari URL
        $search = $request->input('search');

        // Query data buku
        $books = Book::query()
            ->when($search, function ($query, $search) {
                // Cari berdasarkan judul atau pengarang
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('pengarang', 'like', "%{$search}%");
            })
            ->where('status_ketersediaan', 'Tersedia') // Hanya tampilkan buku yang tersedia
            ->latest()
            ->paginate(12); // Tampilkan 12 buku per halaman

        // Kirim data buku dan kata kunci pencarian ke view
        return view('public.koleksi', compact('books', 'search'));
    }

    /**
     * PERBAIKAN: Menambahkan fungsi untuk Halaman Galeri.
     */
    public function gallery()
    {
        return view('public.gallery');
    }

    /**
     * PERBAIKAN: Menambahkan fungsi untuk Halaman Lokasi.
     */
    public function location()
    {
        return view('public.location');
    }
}
