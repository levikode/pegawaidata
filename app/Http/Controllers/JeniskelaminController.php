<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeniskelamin;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class JeniskelaminController extends Controller
{
    // Fungsi untuk menampilkan data jeniskelamin
    public function index()
    {
        // Mengambil semua data jeniskelamin dari database
        return view('jeniskelamin.index', [
            "title" => "Jeniskelamin",
            "data" => Jeniskelamin::all()
        ]);
    }    

    // Fungsi untuk menampilkan form tambah data jeniskelamin
    public function create():View
    {
        return view('jeniskelamin.index')->with(["title" => "Tambah Data Jeniskelamin"]);
    }

    // Fungsi untuk menyimpan data jeniskelamin yang ditambahkan
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

        Jeniskelamin::create($request->all());
        return redirect()->route('jeniskelamin.index')->with('success','Data Jeniskelamin Berhasil Ditambahkan');
    }
    
    // Fungsi untuk menampilkan form edit data jeniskelamin
    public function edit(Jeniskelamin $jeniskelamin):View
    {
        return view('jeniskelamin.editjeniskelamin',compact('jeniskelamin'))->with([
            "title" => "Ubah Data Jeniskelamin",
        ]);
    }

    // Fungsi untuk memperbarui data jeniskelamin yang diedit
    public function update(Jeniskelamin $jeniskelamin, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        $jeniskelamin->update($request->all());
        return redirect()->route('jeniskelamin.index')->with('updated','Data Jeniskelamin Berhasil Diubah');
    }

    // Fungsi untuk menghapus data jeniskelamin
    public function destroy($id):RedirectResponse
    {
        Jeniskelamin::where('id',$id)->delete();
        return redirect()->route('jeniskelamin.index')->with('deleted','Data Pegawai Berhasil Dihapus');
    }

}



