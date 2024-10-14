<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AgamaController extends Controller
{
    // Fungsi untuk menampilkan data agama
    public function index()
    {
        return view('agama.index', [
            "title" => "Agama",
            "data" => Agama::all()
        ]);
    }    

    // Fungsi untuk menampilkan form tambah data agama
    public function create():View
    {
        return view('agama.index')->with(["title" => "Tambah Data Agama"]);
    }

    // Fungsi untuk menyimpan data agama yang ditambahkan
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

        Agama::create($request->all());
        return redirect()->route('agama.index')->with('success','Data Agama Berhasil Ditambahkan');
    }

    // Fungsi untuk menampilkan form edit data agama
    public function edit(Agama $agama):View
    {
        return view('agama.editagama',compact('agama'))->with([
            "title" => "Ubah Data Agama",
        ]);
    }

    // Fungsi untuk memperbarui data agama yang diedit
    public function update(Agama $agama, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        $agama->update($request->all());
        return redirect()->route('agama.index')->with('updated','Data Agama Berhasil Diubah');
    }

    // Fungsi untuk menghapus data agama
    public function destroy($id):RedirectResponse
    {
        Agama::where('id',$id)->delete();
        return redirect()->route('agama.index')->with('deleted','Data Pegawai Berhasil Dihapus');
    }

}



