<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .btn-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-add {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Blur effect for confirmation dialog */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .overlay.active {
            display: flex;
        }

        .overlay .modal {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .overlay .modal button {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
        }

        .overlay .modal button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>

        <div class="btn-container">
            <a href="{{ route('mahasiswa.create') }}" class="btn-add">Tambah Mahasiswa Baru</a>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                        <td>
                            <a href="javascript:void(0);" class="btn-delete"
                                onclick="showDeleteConfirmation({{ $mahasiswa->id }})">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Confirmation Modal -->
    <div class="overlay" id="overlay">
        <div class="modal">
            <h3>Anda yakin ingin menghapus?</h3>
            <div>
                <button onclick="deleteRecord()">Ya, Hapus</button>
                <button onclick="closeModal()">Batal</button>
            </div>
        </div>
    </div>

    <script>
        let selectedId = null;

        function showDeleteConfirmation(id) {
            selectedId = id;
            document.getElementById('overlay').classList.add('active');
        }

        function closeModal() {
            document.getElementById('overlay').classList.remove('active');
        }

        function deleteRecord() {
            if (selectedId) {
                window.location.href = `/mahasiswa/delete/${selectedId}`;
            }
        }
    </script>
</body>

</html>
