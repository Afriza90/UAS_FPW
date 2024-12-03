<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-back {
            background-color: #6c757d;
            text-decoration: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Mahasiswa Baru</h1>

        @if ($errors->any())
            <div class="alert">
                <strong>Kesalahan!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="npm">NPM:</label>
                <input type="text" name="npm" id="npm" value="{{ old('npm') }}" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="form-group">
                <label for="prodi">Prodi:</label>
                <select name="prodi" id="prodi" required>

                    <option value="Informatika" {{ old('prodi') == 'Informatika' ? 'selected' : '' }}>Informatika
                    </option>
                    <option value="Sistem Informasi" {{ old('prodi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem
                        Informasi</option>
                    <option value="Teknik Informatika" {{ old('prodi') == 'Teknik Informatika' ? 'selected' : '' }}>
                        Teknik Informatika</option>
                </select>
            </div>

            <div class="action-buttons">
                <button type="submit">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>
