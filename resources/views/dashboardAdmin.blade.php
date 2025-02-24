@extends('layouts.app')

@section('content')
<div class="navbar" style="background-color: #14181B; padding: 15px; display: flex; justify-content: space-between; align-items: center; color: white;">
    <img src="{{ asset('assets/logo2.png') }}" alt="logo" style="height: 90px; width: auto;">
    <div class="nav-links" style="display: flex; align-items: center;">
        <a href="#" style="color: #FFAE00; text-decoration: none; margin: 0 10px;">Beranda</a>
        <a href="#" style="color: #FFAE00; text-decoration: none; margin: 0 10px;">Manajemen Barang</a>
        <a href="#" style="color: #FFAE00; text-decoration: none; margin: 0 10px;">Pengguna</a>
        <a href="{{ route('logout') }}" style="color: #FFAE00; text-decoration: none; margin: 0 10px;">Logout</a>
    </div>
</div>

<div class="container" style="max-width: 1200px; margin: auto; padding: 20px;">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, {{ $user->nama_petugas }}!</p>
    
    <!-- Contoh bagian data barang -->
    <h2>Daftar Barang Lelang</h2>
    <div class="product-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
        @foreach ($barang as $item)
            <div class="product-card" style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); text-align: center;">
                {{-- Jika ada kolom gambar, pastikan kolom tersebut ada di database. --}}
                @if(isset($item->gambar))
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_barang }}" style="max-width: 100%; border-radius: 5px;">
                @endif
                <h3 style="color: #14181B;">{{ $item->nama_barang }}</h3>
                <p>Harga Awal: Rp {{ number_format($item->harga_awal, 0, ',', '.') }}</p>
                {{-- Form edit --}}
                <form action="{{ route('admin.barang.edit', $item->id_barang) }}" method="GET" style="display:inline;">
                    <button type="submit" class="btn-bid" style="background-color: #FFAE00; color: #14181B; padding: 10px; border: none; cursor: pointer; border-radius: 5px; margin-top: 10px;">Edit</button>
                </form>
                {{-- Form delete --}}
                <form action="{{ route('admin.barang.destroy', $item->id_barang) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus data?')" class="btn-bid" style="background-color: #FFAE00; color: #14181B; padding: 10px; border: none; cursor: pointer; border-radius: 5px; margin-top: 10px;">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
