<!DOCTYPE html>
<html>
<head>
    <title>List of Films</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #343a40;
            font-weight: bold;
        }
        .table {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .img-thumbnail {
            transition: transform 0.2s;
        }
        .img-thumbnail:hover {
            transform: scale(1.1);
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">List of Films</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Kode Film</th>
                    <th>Judul</th>
                    <th>Sutradara</th>
                    <th>Tahun Rilis</th>
                    <th>Cover</th>
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                <tr>
                    <td>{{ $film->kode_film }}</td>
                    <td>{{ $film->judul }}</td>
                    <td>{{ $film->sutradara }}</td>
                    <td>{{ $film->tahun_rilis }}</td>
                    <td>
                        @if($film->cover)
                            <img src="{{ $film->cover }}" alt="{{ $film->judul }}" class="img-thumbnail" width="100">
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
