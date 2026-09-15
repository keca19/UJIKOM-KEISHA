<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Halaman Galeri untuk Admin
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    // Halaman Galeri untuk Pengunjung / User (Public List)
    public function userIndex()
    {
        $galeri = Galeri::latest()->get();
        return view('galeri.index', compact('galeri'));
    }

    // Halaman Detail Galeri untuk Pengunjung / User
    public function userShow($id)
    {
        // Variabel dibuat $gallery & $galeri agar kompatibel dengan Blade
        $gallery = Galeri::findOrFail($id);
        $galeri = $gallery;

        // Ambil 3 galeri terbaru lainnya (selain foto yang sedang dibuka)
        $galeriLainnya = Galeri::where('id', '!=', $id)
                               ->latest()
                               ->take(3)
                               ->get();

        return view('galeri.show', compact('gallery', 'galeri', 'galeriLainnya'));
    }

    // Simpan Data Galeri Baru (Admin)
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
            'foto'    => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('galeri', 'public');

        Galeri::create([
            'judul'   => $request->judul,
            'tanggal' => $request->tanggal,
            'foto'    => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    // Update Data Galeri (Admin)
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'judul'   => $request->judul,
            'tanggal' => $request->tanggal,
        ];

        // Jika ada file foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            // Simpan foto baru ke array $data
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->back()->with('success', 'Foto galeri berhasil diperbarui!');
    }

    // Hapus Data Galeri (Admin)
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->back()->with('success', 'Foto galeri berhasil dihapus!');
    }
}