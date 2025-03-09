<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lelang;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function generateLaporan()
    {
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $petugas = 'Admin Lelang'; // Bisa diganti sesuai login

        // Ambil semua data lelang yang berstatus "ditutup"
        $lelang = Lelang::where('status', 'ditutup')
            ->with(['barang', 'masyarakat'])
            ->get();

        $jumlah_barang = $lelang->count();
        $jumlah_terjual = $lelang->whereNotNull('harga_akhir')->count();
        $total_lelang = $lelang->whereNotNull('harga_akhir')->sum('harga_akhir');

        $data = [
            'tanggal' => $tanggal,
            'petugas' => $petugas,
            'jumlah_barang' => $jumlah_barang,
            'jumlah_terjual' => $jumlah_terjual,
            'total_lelang' => $total_lelang,
            'lelang' => $lelang
        ];

        // Load view dan generate PDF
        $pdf = Pdf::loadView('laporan_lelang', $data);
        return $pdf->stream('laporan_lelang.pdf');
    }
}

