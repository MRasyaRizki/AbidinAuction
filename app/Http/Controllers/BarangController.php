<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        // Mengambil semua data barang
        $barang = Barang::all();
        // Mengirim data ke view dashboardAdmin
        return view('dashboardAdmin', compact('barang'));
    }

    public function kelola()
    {
        $barang = Barang::all();
        return view('test.managebarang', [
            'Barang' => $barang
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang'      => 'required|max:25',
            'tgl'              => 'required|date',
            'harga_awal'       => 'required|integer',
            'deskripsi_barang' => 'required|max:100',
            'foto'             => 'required|image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);
        $barang = new Barang($validated);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
            $barang->foto = $path;
        } else {
            return back()->with('error', 'Foto tidak ditemukan');
        }

        $barang->save();

        return redirect()->route('dashboardAdmin')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Barang $barang) {
        return view('test.editBarang', [
            'Data' => $barang
        ]);
    }

    public function update(Request $request, Barang $barang) {
        // Validasi input
        $validated = $request->validate([
            'nama_barang'      => 'required|max:25',
            'tgl'              => 'required|date',
            'harga_awal'       => 'required|integer',
            'deskripsi_barang' => 'required|max:100'
        ]);

        $barang->update($validated);

        if ($request->hasFile('foto')) {
            if ($barang->foto) {
                Storage::disk('public')->delete($barang->foto);
            }

            $path = $request->file('foto')->store('images', 'public');
            $barang->foto = $path;
            $barang->save();
        }
        $barang->save();

        return redirect()->route('kelolaBarang')->with('success', 'Barang berhasil ditambahkan');
        // KALO MAU GANTI RETURN NYA BISA LE BEBAS ATUR AE
    }

    public function destroy(Barang $barang) { //INI BUAT HAPUS BARANG LE
        if ($barang->foto) {
            Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();

        return back()->with('success', 'Barang berhasil dihapus!');
    }

}
