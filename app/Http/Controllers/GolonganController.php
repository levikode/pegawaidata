<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GolonganController extends Controller
{
    // Fungsi untuk menampilkan data golongan
    public function index()
    {
        return view('golongan.index', [
            "title" => "Golongan",
            "data" => Golongan::all()
        ]);
    }    

    // Fungsi untuk menampilkan form tambah data golongan
    public function create():View
    {
        return view('golongan.index')->with(["title" => "Tambah Data Golongan"]);
    }

    // Fungsi untuk menyimpan data golongan yang ditambahkan
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        Golongan::create($request->all());
        return redirect()->route('golongan.index')->with('success','Data Golongan Berhasil Ditambahkan');
    }

    // Fungsi untuk menampilkan form edit data golongan
    public function edit(Golongan $golongan):View
    {
        return view('golongan.editgolongan',compact('golongan'))->with([
            "title" => "Ubah Data Golongan",
        ]);
    }

    // Fungsi untuk memperbarui data golongan yang diedit
    public function update(Golongan $golongan, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        $golongan->update($request->all());
        return redirect()->route('golongan.index')->with('updated','Data Golongan Berhasil Diubah');
    }

    // Fungsi untuk menghapus data golongan
    public function destroy($id):RedirectResponse
    {
        Golongan::where('id',$id)->delete();
        return redirect()->route('golongan.index')->with('deleted','Data Pegawai Berhasil Dihapus');
    }


}


