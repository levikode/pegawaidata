<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendataan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Pendataan::all();  // Ambil data dari database
        $title = 'Dashboard';    // Set variabel title
        $user = User::all();  
        return view('welcome', compact('data', 'title', 'user'));
    }
  
    public function getChartData()
    {
        $totalpendataan = Pendataan::count();  // Menghitung jumlah pendataan
        $totalUser = User::count();        // Menghitung jumlah user

        return response()->json([
            'pendataan' => $totalpendataan,
            'user' => $totalUser
        ]);
    
}
}
