<?php
// app/Http/Controllers/LaporanController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use PDF;

class LaporanController extends Controller
{
    // Menampilkan data pegawai
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('laporan.index', compact('pegawai'));
    }

    // Export PDF
    public function exportPDF()
    {
        $pegawai = Pegawai::all();
        $pdf = PDF::loadView('laporan.pdf', compact('pegawai'));
        return $pdf->download('laporan-data-pegawai.pdf');
    }
}
