<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Merriweather', serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2C3E50;
        }

        .btn-container {
            display: flex;
            justify-content: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .btn-add,
        .btn-export,
        .btn-back {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-add:hover,
        .btn-export:hover,
        .btn-back:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn-delete {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-delete:hover {
            color: #c0392b;
        }

        /* Modal (Delete Confirmation) */
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(5px);
            transition: opacity 0.3s ease;
        }

        #overlay.active {
            display: flex;
            opacity: 1;
        }

        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .modal h3 {
            margin: 0;
            font-size: 18px;
        }

        .modal .btn {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .modal .btn:hover {
            background-color: #c0392b;
        }

        .modal .btn-cancel {
            background-color: #bdc3c7;
            margin-left: 10px;
        }

        .modal .btn-cancel:hover {
            background-color: #95a5a6;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>

        <div class="btn-container">
            <a href="{{ route('mahasiswa.create') }}" class="btn-add">Tambah Mahasiswa Baru</a>
            <a href="{{ route('mahasiswa.export') }}" class="btn-export">Download Excel</a>
            <a href="{{ route('mahasiswa.exportPDF') }}" class="btn-export">Download PDF</a>
            <!-- New Back Button -->
            <a href="{{ route('dashboard') }}" class="btn-back">Kembali</a>
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
    <div id="overlay">
        <div class="modal">
            <h3>Anda yakin ingin menghapus data ini?</h3>
            <button class="btn" onclick="deleteRecord()">Hapus</button>
            <button class="btn btn-cancel" onclick="closeModal()">Batal</button>
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
