<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User; 
use App\Models\Jabatan; 
use App\Models\Golongan;
use App\Models\Agama; 
use App\Models\Jeniskelamin;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PegawaiController extends Controller
{
    // Fungsi untuk menampilkan data pegawai
    public function index()
    {
        // Mengambil semua data pegawai dari database
        $pegawai = Pegawai::all();
        // Mengirimkan data pegawai ke view 'pegawai.index' beserta title
        return view('pegawai.index', [
            "title" => "Pegawai",
            "data" => $pegawai
        ]);
    }

    // Fungsi untuk menampilkan form tambah data pegawai
    public function create(): View
    {
        // Mengambil data user, jabatan, golongan, agama, dan jenis kelamin untuk digunakan di form
        return view('pegawai.create')->with([
            "title" => "Tambah Data Pegawai",
            "user" => User::all(),
            "jabatan" => Jabatan::all(),
            "golongan" => Golongan::all(),
            "agama" => Agama::all(),
            "jeniskelamin" => Jeniskelamin::all()
        ]);
    }

    // Fungsi untuk menyimpan data pegawai yang ditambahkan
    public function store(Request $request): RedirectResponse
    {
        // Validasi input yang diterima dari form
        $request->validate([
            "user_id" => "required",
            "nama" => "required", 
            "nip" => "required", 
            "nik" => "required", 
            "tmt" => "required",
            "usia" => "required", 
            "masakerja" => "required", 
            "golongan_id" => "required",
            "jabatan_id" => "required", 
            "agama_id" => "required", 
            "jeniskelamin_id" => "required",
            "ttl" => "required",
            "alamat" => "required",
        ]);
        
        // Menyimpan data pegawai ke database
        Pegawai::create($request->all());

        // Redirect ke halaman index pegawai dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Ditambahkan');
    }

    // Fungsi untuk menampilkan form edit data pegawai
    public function edit(Pegawai $pegawai): View
    {
        // Mengirimkan data pegawai yang akan diubah ke view 'pegawai.edit' beserta data lainnya
        return view('pegawai.edit', compact('pegawai'))->with([
            "title" => "Ubah Data Pegawai",
            "user" => User::all(),
            "jabatan" => Jabatan::all(),
            "golongan" => Golongan::all(),
            "agama" => Agama::all(),
            "jeniskelamin" => Jeniskelamin::all()
        ]);
    }

    // Fungsi untuk memperbarui data pegawai yang diedit
    public function update(Pegawai $pegawai, Request $request): RedirectResponse
    {
        // Validasi input yang diterima dari form
        $request->validate([
            "user_id" => "required", 
            "nama" => "required",
            "nip" => "required",
            "nik" => "required", 
            "tmt" => "required", 
            "usia" => "required",
            "masakerja" => "required", 
            "golongan_id" => "required", 
            "jabatan_id" => "required", 
            "agama_id" => "required", 
            "jeniskelamin_id" => "required",
            "ttl" => "required",
            "alamat" => "required", 
        ]);

        // Memperbarui data pegawai yang ada
        $pegawai->update($request->all());

        // Redirect ke halaman index pegawai dengan pesan update sukses
        return redirect()->route('pegawai.index')->with('updated', 'Data Pegawai Berhasil Diubah');
    }

    // Fungsi untuk menampilkan detail data pegawai
    public function show(): View
    {
        // Mengambil semua data pegawai dari database
        $pegawai = Pegawai::all();
        // Mengirimkan data pegawai ke view 'pegawai.show'
        return view('pegawai.show')->with([
            "title" => "Tampil Data Pegawai",
            "data" => $pegawai
        ]);
    }

    // Fungsi untuk menghapus data pegawai
    public function destroy($id): RedirectResponse
    {
        // Menghapus data pegawai berdasarkan ID
        Pegawai::where('id', $id)->delete();

        // Redirect ke halaman index pegawai dengan pesan penghapusan sukses
        return redirect()->route('pegawai.index')->with('deleted', 'Data Pegawai Berhasil Dihapus');
    }
}
