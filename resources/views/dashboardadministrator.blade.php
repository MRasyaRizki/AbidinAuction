<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Lelang</title>

    <link rel="stylesheet" href="{{ url('style.css') }}">
</head>
<body>

    <div class="navbar">
        <img src="{{ asset ('assetsSendiri/logo2.png') }}" alt="logo">
        <div class="nav-links">
            <a href="#">Beranda</a>
            <a href="#">Kategori</a>
            <div class="dropdown">
                <button class="dropbtn">Akun Saya ⌵</button>
                <div class="dropdown-content">
                    <a href="#">Profil</a>
                    <a href="#">Riwayat</a>
                    <a href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Cari barang...">
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="welcome">Selamat Datang {{  session('user.username')  }}</h1>
        <h2>Barang Lelang</h2>
        <div class="product-list">
            <div class="product-card">
                <span class="status-lelang">Buka</span>
                <img src="assets/rasya.jpg" alt="Barang 1">
                <h3>Barang 1</h3>
                <p>Harga Awal: Rp 100.000</p>
                <button class="btn-bid">Tawar</button>
            </div>
            <div class="product-card">
                <span class="status-lelang closed">Tutup</span>
                <img src="assets/rasya.jpg" alt="Barang 2">
                <h3>Barang 2</h3>
                <p>Harga Awal: Rp 200.000</p>
                <button class="btn-bid">Tawar</button>
            </div>
            <div class="product-card">
                <span class="status-lelang">Buka</span>
                <img src="assets/rasya.jpg" alt="Barang 3">
                <h3>Barang 3</h3>
                <p>Harga Awal: Rp 300.000</p>
                <button class="btn-bid">Tawar</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let dropBtn = document.querySelector(".dropbtn");
            let dropdownContent = document.querySelector(".dropdown-content");

            dropBtn.addEventListener("click", function (event) {
                event.stopPropagation();
                dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
            });

            document.addEventListener("click", function () {
                dropdownContent.style.display = "none";
            });
        });
    </script>

</body>
</html>
