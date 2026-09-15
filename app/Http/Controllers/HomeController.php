<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data berita terbaru (dibatasi 3 data agar pas 1 baris grid 3 kolom)
        $beritas = Berita::latest()->take(3)->get(); 

        // 2. Ambil data galeri terbaru (dibatasi 6 data untuk 2 baris grid 3 kolom)
        $galeri = Galeri::latest()->take(6)->get();

        // 3. Kirim variabel ke view 'home'
        return view('home', compact('beritas', 'galeri'));
    }
}