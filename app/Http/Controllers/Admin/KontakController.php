<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Tampilkan halaman kontak untuk publik / user.
     */
    public function userIndex()
    {
        return view('kontak');
    }

    /**
     * Tampilkan daftar pesan kontak masuk di halaman admin.
     */
    public function index()
    {
        $kontak = Kontak::latest()->get();

        return view('admin.kontak.index', compact('kontak'));
    }

    /**
     * Simpan pesan dari form publik (halaman user).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'pesan' => 'required|string',
        ]);

        // Mengeset status default
        $validated['status'] = 'unread';

        Kontak::create($validated);

        return back()->with('success', 'Pesan Anda berhasil terkirim!');
    }

    /**
     * Tandai pesan sebagai sudah dibaca (disimpan ke database).
     */
    public function markAsRead($id)
    {
        $kontak = Kontak::findOrFail($id);
        
        // Memperbarui kolom status menjadi 'read' di database
        $kontak->update([
            'status' => 'read'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status pesan berhasil diperbarui'
        ]);
    }

    /**
     * Hapus pesan kontak berdasarkan ID.
     */
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan berhasil dihapus!');
    }
}