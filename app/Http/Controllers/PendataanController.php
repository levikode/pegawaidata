<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendataan;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PendataanController extends Controller
{
    // Menampilkan data pendataan
    public function index()
    {
        $pendataan = Pendataan::all();
        return view('pendataan.index', [
            "title" => "Pendataan Pegawai",
            "data" => $pendataan
        ]);
    }

    // Menampilkan form tambah data pendataan
    public function create(): View
    {
        return view('pendataan.create', [
            "title" => "Tambah Data Pendataan",
            "user" => User::all(),
        ]);
    }

    // Menyimpan data pendataan dan menambah riwayat golongan
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            "user_id" => "required",
            "nama" => "required",
            "nip" => "required",
            "nik" => "required",
            "tmt" => "required",
            "usia" => "required|integer",
            "masakerja" => "required|integer",
            "pendidikan" => "required",
            "golongan" => "required|string|in:Golongan I,Golongan II,Golongan III,Golongan IV", // Validasi golongan
            "jabatan" => "required",
            "agama" => "required",
            "jeniskelamin" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required|date",
            "alamat" => "required",
            "notlp" => "required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10", // Validasi nomor telepon
        ]);

        // Gabungkan tempat dan tanggal lahir
        $ttl = $request->tempat_lahir . ', ' . $request->tanggal_lahir;

        // Data yang akan disimpan
        $data = $request->except(['tempat_lahir', 'tanggal_lahir']);
        $data['ttl'] = $ttl;

        // Simpan data pendataan
        $pendataan = Pendataan::create($data);

        // Menambahkan riwayat golongan ke dalam pendataan yang baru ditambahkan
        $riwayat_golongan = [
            [
                'golongan' => $request->golongan,
                'tanggal_mulai' => now(), // Tanggal mulai diatur sekarang
                'tanggal_akhir' => null,  // Kosongkan untuk sementara waktu
            ]
        ];

        // Menyimpan riwayat golongan dalam pendataan
        $pendataan->riwayat_golongan = $riwayat_golongan;
        $pendataan->save();

        return redirect()->route('pendataan.index')->with('success', 'Data Pendataan dan Riwayat Golongan Berhasil Ditambahkan');
    }

    // Menampilkan form edit data pendataan
    public function edit(Pendataan $pendataan): View
    {
        return view('pendataan.edit', compact('pendataan'), [
            "title" => "Ubah Data Pendataan",
            "user" => User::all(),
        ]);
    }

    // Memperbarui data pendataan dan menambahkan riwayat golongan baru
    public function update(Pendataan $pendataan, Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            "user_id" => "required",
            "nama" => "required",
            "nip" => "required",
            "nik" => "required",
            "tmt" => "required",
            "usia" => "required|integer",
            "masakerja" => "required|integer",
            "pendidikan" => "required",
            "golongan" => "required|string|in:Golongan I,Golongan II,Golongan III,Golongan IV", // Validasi golongan
            "jabatan" => "required",
            "agama" => "required",
            "jeniskelamin" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required|date",
            "alamat" => "required",
            "notlp" => "required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10", // Validasi nomor telepon
        ]);

        // Gabungkan tempat dan tanggal lahir
        $ttl = $request->tempat_lahir . ', ' . $request->tanggal_lahir;

        // Data yang akan disimpan
        $data = $request->except(['tempat_lahir', 'tanggal_lahir']);
        $data['ttl'] = $ttl;

        // Perbarui data pendataan
        $pendataan->update($data);

        // Menambahkan riwayat golongan baru
        $riwayat_golongan = $pendataan->riwayat_golongan ?? [];
        $riwayat_golongan[] = [
            'golongan' => $request->golongan,
            'tanggal_mulai' => now(), // Tanggal mulai diatur sekarang
            'tanggal_akhir' => null,  // Kosongkan untuk sementara waktu
        ];

        // Menyimpan riwayat golongan yang diperbarui
        $pendataan->riwayat_golongan = $riwayat_golongan;
        $pendataan->save();

        return redirect()->route('pendataan.index')->with('updated', 'Data Pendataan dan Riwayat Golongan Berhasil Diubah');
    }

    // Menampilkan detail data pendataan dan riwayat golongan
    public function show($id): View
    {
        $pendataan = Pendataan::findOrFail($id);
        return view('pendataan.show', [
            "title" => "Tampil Data Pendataan",
            "pendataan" => $pendataan,
            "riwayat_golongan" => $pendataan->riwayat_golongan ?? []
        ]);
    }

    // Menghapus data pendataan
    public function destroy($id): RedirectResponse
    {
        Pendataan::where('id', $id)->delete();
        return redirect()->route('pendataan.index')->with('deleted', 'Data Pendataan Berhasil Dihapus');
    }
}
