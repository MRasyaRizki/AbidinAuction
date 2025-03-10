<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
</head>

<body>
    <form action="{{ route('updateBarang',$Data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" maxlength="25" required value="{{ $Data->nama_barang }}">
        </div>

        <div class="mb-3">
            <label for="tgl" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tgl" name="tgl" required value="{{ $Data->tgl }}">
        </div>

        <div class="mb-3">
            <label for="harga_awal" class="form-label">Harga Awal</label>
            <input type="number" class="form-control" id="harga_awal" name="harga_awal" required value="{{ $Data->harga_awal }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
            <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" rows="3" maxlength="100" required >{{ $Data->deskripsi_barang }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Upload Foto</label>
            <input type="file" class="form-control" id="foto" name="foto"
                accept="image/jpeg, image/png, image/jpg, image/gif" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>
