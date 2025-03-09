<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Lelang</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1, h3 { text-align: center; }
        p { font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Laporan Lelang</h1>
    <h3>Tanggal Laporan: {{ $tanggal }}</h3>
    <p><strong>Petugas:</strong> {{ $petugas }}</p>
    <p><strong>Jumlah Barang yang Dilelang:</strong> {{ $jumlah_barang }}</p>
    <p><strong>Jumlah Barang Terjual:</strong> {{ $jumlah_terjual }}</p>
    <p><strong>Total Nilai Lelang:</strong> Rp {{ number_format($total_lelang, 0, ',', '.') }}</p>

    <h3> Daftar Barang yang Dilelang:</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Harga Awal</th>
                <th>Harga Akhir</th>
                <th>Pemenang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lelang as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>Rp {{ number_format($item->barang->harga_awal, 0, ',', '.') }}</td>
                    <td>
                        @if ($item->harga_akhir)
                            Rp {{ number_format($item->harga_akhir, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->masyarakat->nama_lengkap ?? '-' }}</td>
                    <td>{{ $item->harga_akhir ? 'Terjual' : 'Tidak Terjual' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
