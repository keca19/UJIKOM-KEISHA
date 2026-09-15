<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kontak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total data dari tabel masing-masing
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalPesan  = Kontak::count(); // Jika nama model Anda 'Pesan' atau 'Contact', sesuaikan di sini

        return view('admin.dashboard', compact('totalBerita', 'totalGaleri', 'totalPesan'));
    }
}