<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // 1. Menampilkan Form Login
    public function index()
    {
        // Sesuaikan dengan letak file blade login Anda
        return view('auth.login'); 
    }

    // 2. Memproses Kiriman Form Login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            // Paksa redirect langsung ke dashboard admin tanpa mengecek halaman sebelumnya
            return redirect()->route('admin.dashboard');
        }

        // Kembali dengan pesan error jika login gagal
        return back()->with('error', 'Email atau kata sandi yang Anda masukkan salah!')->withInput();
    }

    // 3. Memproses Logout Admin
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Mengarahkan kembali ke Halaman Utama / Beranda
        return redirect()->route('home');
    }
}