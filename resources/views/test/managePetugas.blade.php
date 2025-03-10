<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Petugas</title>
</head>

<body>

    <h2>Daftar Petugas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $pet)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pet->nama_petugas }}</td>
                    <td>{{ $pet->username }}</td>
                    <td>{{ $pet->Level->level }}</td>
                    <td>
                        <a href="{{ route('editPetugas', $pet->id) }}">Edit</a>
                        <a href="{{ route('destroyPetugas', $pet->id) }}">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="{{ route('createPetugas') }}">Tambah Petugas</a></p>

</body>

</html>
