<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Lelang</title>
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
        .product-card img {
            max-width: 100%;
            border-radius: 5px;
        }
        .product-card h3 {
            color: #14181B;
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
    </style>
</head>
<body>
    <div class="navbar">
        <img src="assets/logo2.png" alt="logo">
        <div class="nav-links">
            <a href="#">Beranda</a>
            <a href="#">Kategori</a>
            <a href="#">Akun Saya</a>
            <a href="{{ route('logout') }}">Logout</a>
            <!-- Menampilkan username setelah login -->
            <div class="search-bar">
                <input type="text" placeholder="Cari barang...">
            </div>
        </div>
    </div>
    <div class="container">
    <h1 class="welcome">Selamat Datang {{ Auth::guard('masyarakat')->user()->username }}</span>
        <h2>Barang Lelang</h2>
        <div class="product-list">
            <div class="product-card">
                <img src="" alt="Barang 1">
                <h3>Barang 1</h3>
                <p>Harga Awal: Rp 100.000</p>
                <button class="btn-bid">Tawar</button>
            </div>
            <div class="product-card">
                <img src="" alt="Barang 2">
                <h3>Barang 2</h3>
                <p>Harga Awal: Rp 200.000</p>
                <button class="btn-bid">Tawar</button>
            </div>
            <div class="product-card">
                <img src="" alt="Barang 3">
                <h3>Barang 3</h3>
                <p>Harga Awal: Rp 300.000</p>
                <button class="btn-bid">Tawar</button>
            </div>
        </div>
    </div>
</body>
</html>
