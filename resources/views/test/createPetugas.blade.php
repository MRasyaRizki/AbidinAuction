<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
</head>

<body>

    <h2>Tambah Petugas</h2>
    <form action="{{ route('storePetugas') }}" method="POST">
        @csrf
        <label for="nama_petugas">Nama Petugas:</label>
        <input type="text" id="nama_petugas" name="nama_petugas" required> <br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required> <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required> <br>

        <label for="level">Level:</label>
        <select id="level" name="level">
            @foreach ($level as $lev)
                <option value="{{ $lev->id }}">{{ $lev->level }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Tambah Petugas</button>
    </form>

</body>

</html>
