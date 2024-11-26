<?php
// app/Http/Controllers/LaporanController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendataan;
use PDF;

class LaporanController extends Controller
{
    // Menampilkan data pendataan
    public function index()
    {
        $pendataan = Pendataan::all();
        return view('laporan.index', compact('pendataan'));
    }

    // Export PDF
    public function exportPDF()
    {
        $pendataan = Pendataan::all();
        $pdf = PDF::loadView('laporan.pdf', compact('pendataan'));
        return $pdf->download('laporan-data-pendataan.pdf');
    }
}
