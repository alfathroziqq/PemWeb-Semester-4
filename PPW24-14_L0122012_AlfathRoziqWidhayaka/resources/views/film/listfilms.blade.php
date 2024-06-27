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

        .table th,
        .table td {
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
        <div class="text-left">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createFilmModal">Add New
                Film</button>
            <a class="btn btn-secondary mb-3 float-right" href="{{ route('login') }}">Logout</a>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Kode Film</th>
                    <th>Judul</th>
                    <th>Sutradara</th>
                    <th>Tahun Rilis</th>
                    <th>Cover</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
                        <td>{{ $film->kode_film }}</td>
                        <td>{{ $film->judul }}</td>
                        <td>{{ $film->sutradara }}</td>
                        <td>{{ $film->tahun_rilis }}</td>
                        <td>
                            @if ($film->cover)
                                <img src="{{ $film->cover }}" alt="{{ $film->judul }}" class="img-thumbnail"
                                    width="100">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#viewFilmModal{{ $film->id }}">View</button>
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#editFilmModal{{ $film->id }}">Edit</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#deleteFilmModal{{ $film->id }}">Delete</button>
                        </td>
                    </tr>

                    <!-- View Film Modal -->
                    <div class="modal fade" id="viewFilmModal{{ $film->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="viewFilmModalLabel{{ $film->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewFilmModalLabel{{ $film->id }}">Film Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="kode_film">Kode Film</label>
                                        <p class="form-control">{{ $film->kode_film }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <p class="form-control">{{ $film->judul }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="sutradara">Sutradara</label>
                                        <p class="form-control">{{ $film->sutradara }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_rilis">Tahun Rilis</label>
                                        <p class="form-control">{{ $film->tahun_rilis }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cover">Cover</label>
                                        @if ($film->cover)
                                            <img src="{{ $film->cover }}" alt="{{ $film->judul }}"
                                                class="img-thumbnail" width="100">
                                        @else
                                            <p>N/A</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Edit Film Modal -->
                    <div class="modal fade" id="editFilmModal{{ $film->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editFilmModalLabel{{ $film->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editFilmModalLabel{{ $film->id }}">Edit Film</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('films.update', $film->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="kode_film">Kode Film</label>
                                            <input type="text" class="form-control" name="kode_film"
                                                value="{{ $film->kode_film }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" name="judul"
                                                value="{{ $film->judul }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sutradara">Sutradara</label>
                                            <input type="text" class="form-control" name="sutradara"
                                                value="{{ $film->sutradara }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun_rilis">Tahun Rilis</label>
                                            <input type="number" class="form-control" name="tahun_rilis"
                                                value="{{ $film->tahun_rilis }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cover">Cover</label>
                                            <input type="file" class="form-control" name="cover">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Film Modal -->
                    <div class="modal fade" id="deleteFilmModal{{ $film->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="deleteFilmModalLabel{{ $film->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteFilmModalLabel{{ $film->id }}">Delete Film
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('films.destroy', $film->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this film?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Create Film Modal -->
    <div class="modal fade" id="createFilmModal" tabindex="-1" role="dialog"
        aria-labelledby="createFilmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFilmModalLabel">Add New Film</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kode_film">Kode Film</label>
                            <input type="text" class="form-control" name="kode_film" required>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="sutradara">Sutradara</label>
                            <input type="text" class="form-control" name="sutradara" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun_rilis">Tahun Rilis</label>
                            <input type="number" class="form-control" name="tahun_rilis" required>
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover</label>
                            <input type="file" class="form-control" name="cover">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
