<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // ==========================================
    // SISI PUBLIC / USER
    // ==========================================

    /**
     * Menampilkan halaman daftar semua berita untuk User
     */
    public function userIndex(Request $request)
    {
        $query = Berita::latest();

        // Fitur pencarian jika ada input search
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Ambil semua berita (dengan pagination 9 per halaman)
        $berita = $query->paginate(9);

        return view('berita.index', compact('berita'));
    }

    /**
     * Menampilkan detail isi berita (Baca Selengkapnya)
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        // Mengambil 3 berita terbaru lainnya sebagai rekomendasi
        $beritaLainnya = Berita::where('id', '!=', $berita->id)->latest()->take(3)->get();

        return view('berita.show', compact('berita', 'beritaLainnya'));
    }

    // ==========================================
    // SISI ADMIN
    // ==========================================

    public function index(Request $request)
    {
        $query = Berita::latest();

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Mengambil semua data tanpa pagination untuk admin
        $berita = $query->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ringkasan' => 'required|string',
        ]);

        $gambarPath = $request->file('gambar')->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'gambar' => $gambarPath,
            'ringkasan' => $request->ringkasan,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ringkasan' => 'required|string',
        ]);

        $data = [
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'ringkasan' => $request->ringkasan,
        ];

        // Cek jika ada unggahan gambar baru
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        // DIBETULKAN: Mengubah titik (.) menjadi panah (->)
        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}