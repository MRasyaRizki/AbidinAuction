<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Lelang</title>
    <!-- Sertakan Bootstrap CSS jika diperlukan -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #F3F2F2;
        }

        .navbar {
            background-color: #14181B;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar img {
            height: 90px;
            width: auto;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .navbar a {
            color: #FFAE00;
            text-decoration: none;
            margin: 0 10px;
        }

        .search-bar {
            margin-left: 10px;
        }

        .search-bar input {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #FFAE00;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .product-card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .btn-bid {
            background-color: #FFAE00;
            color: #14181B;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn-bid:hover {
            background-color: #d99700;
        }

        .btn-bid,
        .btn-add {
            background-color: #FFAE00;
            color: #14181B;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn-bid:hover,
        .btn-add:hover {
            background-color: #d99700;
        }

        /* Style untuk tombol plus */
        .btn-add {
            font-size: 1.5rem;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: fixed;
            bottom: 30px;
            right: 30px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="{{ asset('assets/logo2.png') }}" alt="logo">
        <div class="nav-links">
            <a href="#">Beranda</a>
            <a href="#">Kategori</a>
            <a href="#">Akun Saya</a>
            <a href="{{ route('logout') }}">Logout</a>
            <div class="search-bar">
                <input type="text" placeholder="Cari barang...">
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="welcome">Selamat Datang
            @if ($ifPetugas)
                {{ Auth::guard('petugas')->user()->username }}
            @elseif ($ifMasyarakat)
                {{ Auth::guard('masyarakat')->user()->username }}
            @else
                Gagal baca login
            @endif
        </h1>
        <h2>Barang Lelang</h2>

        <!-- Daftar Barang -->
        <div class="product-list">
            @foreach ($lelang as $item)
                @if ($item->barang)
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $item->barang->foto) }}" alt="{{ $item->barang->nama_barang }}"
                            style="width: 150px; height: 150px; object-fit: cover;">
                        <h3>{{ $item->barang->nama_barang }}</h3>
                        <p>{{ $item->barang->deskripsi_barang }}</p>
                        <p>Harga Awal : Rp {{ number_format($item->barang->harga_awal, 0, ',', '.') }}</p>
                        <p>Penawaran Tertinggi: Rp {{ number_format($item->highest_bid, 0, ',', '.') }}</p>
                        <button type="button" class="btn-bid" data-toggle="modal"
                            data-target="#lelangmodal-{{ $item->id }}" class="btn-bid">Bid Sekarang</button>
                    </div>
                @else
                    <p>Barang tidak ditemukan.</p>
                @endif
                <!-- Modal Lelang Tawar le -->
                <div class="modal fade" id="lelangmodal-{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="lelangmodalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{ route('bid', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addBarangModalLabel">Tawar Barang Lelang</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h6>Nama Barang : {{ $item->barang->nama_barang }}</h6>
                                    <div class="form-group">
                                        <label for="harga_awal">Penawaran Harga</label>
                                        <input type="number" class="form-control" name="penawaran_harga"
                                            id="penawaran_harga" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Bid Sekarang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>



    <!-- Sertakan jQuery dan Bootstrap JS jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
