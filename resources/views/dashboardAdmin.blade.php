<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Sertakan Bootstrap CSS untuk modal jika perlu -->
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
            <a href="{{ route('dashboardAdmin') }}">Beranda</a>
            <a href="{{ route('kelolaBarang') }}">Barang</a>
            <a href="{{ route('managePetugas') }}">Petugas</a>

            <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle" type="button" id="akunDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Akun Saya
                </button>
                <div class="dropdown-menu" aria-labelledby="akunDropdown">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Cari barang...">
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="welcome">Selamat Datang, {{ Auth::guard('petugas')->user()->username }}</h1>
        <h2>Barang Lelang</h2>

        <!-- Daftar Barang -->
        <div class="product-list">
            @foreach ($barang as $item)
            <div class="product-card">
            <img src="{{ Storage::url($item->foto) }}"
                     alt="{{ $item->nama_barang }}"
                     style="width: 150px; height: 150px; object-fit: cover;">
                <h3>{{ $item->nama_barang }}</h3>
                <p>{{ $item->deskripsi_barang }}</p>
                <p>Harga Awal: Rp {{ number_format($item->harga_awal, 0, ',', '.') }}</p>
                <button class="btn-bid">Bid Sekarang</button>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Tombol Plus untuk Tambah Barang -->
    <button type="button" class="btn-add" data-toggle="modal" data-target="#addBarangModal">+</button>

    <!-- Modal Form Tambah Barang -->
    <div class="modal fade" id="addBarangModal" tabindex="-1" role="dialog" aria-labelledby="addBarangModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBarangModalLabel">Tambah Barang Lelang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <input type="date" class="form-control" name="tgl" id="tgl" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_awal">Harga Awal</label>
                            <input type="number" class="form-control" name="harga_awal" id="harga_awal" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_barang">Deskripsi Barang</label>
                            <textarea class="form-control" name="deskripsi_barang" id="deskripsi_barang" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Gambar Barang</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Barang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Sertakan jQuery dan Bootstrap JS untuk modal -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
