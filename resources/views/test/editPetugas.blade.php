<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
</head>

<body>

    <h2>Edit Petugas</h2>
    <form action="{{ route('updatePetugas', $petugas->id) }}" method="POST">
        @csrf
        <label for="nama_petugas">Nama Petugas:</label>
        <input type="text" id="nama_petugas" name="nama_petugas" required value="{{ $petugas->nama_petugas }}"> <br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required value="{{ $petugas->username }}"> <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Jika tidak update password, kosongkan"> <br>

        <label for="level">Level:</label>
        <select id="level" name="level">
            @foreach ($level as $lev)
                <option {{ $petugas->id_level == $lev->id ? "selected" : "" }} value="{{ $lev->id }}">{{ $lev->level }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Edit Petugas</button>
    </form>

</body>

</html>
