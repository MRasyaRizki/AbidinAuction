<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Petugas</title>
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Daftar Petugas</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
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
                            <a href="{{ route('editPetugas', $pet->id) }}" class="btn btn-sm">Edit</a>
                            <a href="{{ route('destroyPetugas', $pet->id) }}" class="btn btn-sm">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('createPetugas') }}" class="btn">Tambah Petugas</a>
        <a href="/dashboardAdmin" class="btn"> kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
