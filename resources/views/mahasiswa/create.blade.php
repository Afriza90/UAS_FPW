<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>

<body>
    <h1>Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <label for="npm">NPM:</label>
        <input type="text" name="npm" id="npm" required><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" id="prodi" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
