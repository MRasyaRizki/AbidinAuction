<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $ifPetugas = Auth::guard('petugas')->check();
        $ifMasyarakat = Auth::guard('masyarakat')->check();
        $barang = Lelang::where('status', 'dibuka')
            ->join('tb_barang', 'tb_lelang.id_barang', '=', 'tb_barang.id')
            ->selectRaw('tb_lelang.*, tb_barang.harga_awal,
        (SELECT MAX(penawaran_harga)
         FROM history_lelang
         WHERE history_lelang.id_lelang = tb_lelang.id
         AND history_lelang.penawaran_harga >= tb_barang.harga_awal) as highest_bid')
            ->with('barang')
            ->get();

        return view('dashboard', [
            'lelang' => $barang,
            'ifPetugas' => $ifPetugas,
            'ifMasyarakat' => $ifMasyarakat,
        ]);
    }
}
