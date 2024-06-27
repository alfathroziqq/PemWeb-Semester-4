<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }

        .table {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .table tbody tr {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
        }

        .btn {
            border-radius: 20px;
            font-weight: bold;
            padding: 8px 20px;
        }

        .btn-outline-success {
            color: #28a745;
            border-color: #28a745;
        }

        .btn-outline-warning {
            color: #ffc107;
            border-color: #ffc107;
        }

        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>

<body>
    <h1 class="text-center mb-4">Data Pegawai</h1>
    <div class="container">
        <div class="d-flex justify-content-end mb-3">
            <a href="tambahdata" type="button" class="btn btn-outline-success">Tambah</a>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Alamat</th>
                        <th class="text-center" scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $row->id }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jenis_kelamin }}</td>
                            <td>{{ $row->no_hp }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>
                                <a href="editdata/{{ $row->id }}" type="button"
                                    class="btn btn-outline-warning">Edit</a>
                                <a href="delete/{{ $row->id }}"
                                    onclick='return confirm("Yakin hapus pegawai atas nama {{ $row->nama }} ?")'
                                    type="button" class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
