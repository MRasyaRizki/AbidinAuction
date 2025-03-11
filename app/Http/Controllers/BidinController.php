<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidinController extends Controller
{
    public function bid(Request $request, Lelang $lelang)
    {
        $request->validate([
            'penawaran_harga' => 'required|numeric',
        ]);
        $bid = new HistoryLelang();
        $bid -> id_lelang = $lelang -> id;
        $bid -> id_barang = $lelang -> id_barang;
        $bid -> id_user = Auth::guard('masyarakat')->user()->id;
        $bid -> penawaran_harga = $request -> penawaran_harga;
        $bid -> save();
        return back();
    }
}
