<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('assets/background.jpg') no-repeat center center fixed;
            background-size: cover;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .table {
            margin-top: 20px;
        }

        .btn {
            margin-right: 5px;
            background-color: #FFAE00;
            color: #000;
            border: none;
        }

        .btn:hover {
            background-color: #d99700;
        }

        .btn-lelang {
            background-color: red;
            color: white;
        }

        .btn-lelang:hover {
            background-color: darkred;
        }

        .btn-selesai {
            background-color: green;
            color: white;
        }

        .btn-disabled {
            background-color: gray;
            color: white;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Manage Barang</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Barang as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->deskripsi_barang }}</td>
                        <td>Rp{{ number_format($barang->harga_awal, 0, ',', '.') }}</td>
                        <td><img src="{{ asset('storage/' . $barang->foto) }}" alt="{{ $barang->nama_barang }}" style="width: 150px; height: 150px; object-fit: cover;"></td>
                        <td>
                            <a href="{{ route('editBarang', $barang->id) }}" class="btn btn-sm">Edit</a>
                            <a href="{{ route('hapusBarang', $barang->id) }}" class="btn btn-sm">Hapus</a>
                            @php
                                $lelang = \App\Models\Lelang::where('id_barang', $barang->id)->first();
                            @endphp
                            @if (!$lelang)
                                <form action="{{ route('lelangBarang', $barang->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-lelang">Lelangkan</button>
                                </form>
                            @elseif ($lelang->status == 'dibuka')
                                <form action="{{ route('TutuplelangBarang', $barang->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-selesai">Selesai</button>
                                </form>
                            @else
                                <button class="btn btn-sm btn-disabled" disabled>Selesai</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/dashboardAdmin" class="btn">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
