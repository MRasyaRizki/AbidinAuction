<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang</title>
</head>

<body>
    <table border="1">
        <thead>
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
                    <td><img src="{{ asset('storage/' . $barang->foto) }}" alt="{{ $barang->nama_barang }}"
                            style="width: 150px; height: 150px; object-fit: cover;"></td>
                    <td>
                        <a href="{{ route('editBarang', $barang->id) }}">Edit</a>
                        <a href="{{ route('hapusBarang', $barang->id) }}">Hapus</a>
                        @php
                            $lelang = \App\Models\Lelang::where('id_barang', $barang->id)->first();
                        @endphp

                        @if (!$lelang)
                            <form action="{{ route('lelangBarang', $barang->id) }}" method="POST">
                                @csrf
                                <button type="submit">Lelangkan</button>
                            </form>
                        @elseif ($lelang->status == 'dibuka')
                            <form action="{{ route('TutuplelangBarang', $barang->id) }}" method="POST">
                                @csrf
                                <button type="submit">Selesai</button>
                            </form>
                        @else
                            <button disabled>Selesai</button>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
