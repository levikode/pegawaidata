<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\RedirectResponse; 

class LoginController extends Controller
{
    // Fungsi untuk menangani proses autentikasi login
    public function authenticate(Request $request): RedirectResponse
    {
        // Validasi input dari form login (email dan password harus diisi)
        $credentials = $request->validate([
            'email' => ['required'], // Email wajib diisi
            'password' => ['required'], // Password wajib diisi
        ]);

        // Memeriksa apakah kredensial yang dimasukkan cocok dengan data di database
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, session di-re-generate untuk keamanan
            $request->session()->regenerate();
            // Redirect ke halaman yang dituju setelah login berhasil
            return redirect()->intended('/');
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->with('loginError', 'Login Failed');
    }

    // Fungsi untuk menampilkan halaman login
    public function loginView()
    {
        // Mengarahkan ke view 'login' untuk menampilkan form login
        return view('login');
    }

    // Fungsi untuk melakukan logout
    public function logout(Request $request): RedirectResponse
    {
        // Proses logout user yang sedang login
        Auth::logout();
        // Invalidasi session agar tidak bisa dipakai lagi
        $request->session()->invalidate();
        // Regenerasi token untuk menghindari serangan CSRF
        $request->session()->regenerateToken();
        // Redirect ke halaman login setelah logout
        return redirect('/login');
    }
}
