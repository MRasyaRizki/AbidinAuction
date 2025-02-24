<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }

    // Menampilkan form untuk tambah barang
    public function create()
    {
        return view('admin.barang.create');
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang'     => 'required|string|max:25',
            'tgl'             => 'required|date',
            'harga_awal'      => 'required|integer',
            'deskripsi_barang'=> 'required|string|max:100'
        ]);

        Barang::create($validated);

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan detail barang (opsional)
    public function show(Barang $barang)
    {
        return view('admin.barang.show', compact('barang'));
    }

    // Menampilkan form edit barang
    public function edit(Barang $barang)
    {
        return view('admin.barang.edit', compact('barang'));
    }

    // Memperbarui data barang
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang'     => 'required|string|max:25',
            'tgl'             => 'required|date',
            'harga_awal'      => 'required|integer',
            'deskripsi_barang'=> 'required|string|max:100'
        ]);

        $barang->update($validated);

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus data barang
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
