<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use App\Models\HistoryLelang;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    public function make(Barang $barang)
    {
        $lelang = new Lelang();
        $lelang->id_barang = $barang->id;
        $lelang->tgl_lelang = Carbon::now('Asia/Jakarta');
        $lelang->id_petugas = Auth::guard('petugas')->user()->id;
        $lelang->status = 'dibuka';
        $lelang->save();
        return back();
    }

    public function close(Barang $barang)
    {
        $lelang = Lelang::where('id_barang', $barang->id)->first();

        $highestBid = HistoryLelang::where('id_lelang', $lelang->id)
            ->where('penawaran_harga', '>=', $lelang->barang->harga_awal)
            ->orderByDesc('penawaran_harga')
            ->first();

        if ($highestBid) {
            $lelang->harga_akhir = $highestBid->penawaran_harga;
            $lelang->id_user = $highestBid->id_user;
        } else {
            $lelang->harga_akhir = null;
            $lelang->id_user = null;
        }

        $lelang->status = 'ditutup';
        $lelang->save();

        return back()->with('success', 'Lelang telah ditutup.');
    }
}
