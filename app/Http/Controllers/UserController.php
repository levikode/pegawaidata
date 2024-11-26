<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View; 

class UserController extends Controller
{
    // Fungsi untuk menampilkan daftar user
    public function index(): View
    {
        // Mengambil semua data user dari database dan mengirimkannya ke view 'user.index'
        return view('user.index', [
            "title" => "Data user", 
            "data" => User::all() 
        ]);
    }
  

    // Fungsi untuk menyimpan user baru
    public function store(Request $request): RedirectResponse
    {
        // Validasi input dari form tambah user
        $request->validate([
            "name" => "required", 
            "email" => "required", 
            "password" => "required", 
            "alamat" => "required", 
            "notlp" => "required" 
        ]);
        
        // Melakukan hashing pada password sebelum disimpan ke database
        $password = Hash::make($request->password);

        // Menggabungkan hasil hash password ke dalam request yang akan disimpan
        $request->merge([
            "password" => $password
        ]);

        // Menyimpan data user yang baru ke database
        User::create($request->all());

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Data User Berhasil Ditambahkan');
    }
}
