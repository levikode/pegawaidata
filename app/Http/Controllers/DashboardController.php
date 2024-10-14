<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Pegawai::all();  // Ambil data dari database
        $title = 'Dashboard';    // Set variabel title
        $user = User::all();  
        return view('welcome', compact('data', 'title', 'user'));
    }
  
    public function getChartData()
    {
        $totalPegawai = Pegawai::count();  // Menghitung jumlah pegawai
        $totalUser = User::count();        // Menghitung jumlah user

        return response()->json([
            'pegawai' => $totalPegawai,
            'user' => $totalUser
        ]);
    
}
}
