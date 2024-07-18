@extends('content.sidebar')
@section('pages')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Buku</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('book.index')}}">Data Master</a></li>
                            <li class="breadcrumb-item active">Buku</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-book"></i>
                                    Data Master Buku
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Button tambah Buku -->
                                <button type="button" class="btn btn-default mb-4" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fas fa-plus"></i>
                                    Tambah Buku
                                </button>
                                <!-- Table  Responsive -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">List Data Buku</h3>

                                                <div class="card-tools">
                                                    <div class="input-group input-group-sm" style="width: 150px;">
                                                        <input type="text" name="table_search"
                                                            class="form-control float-right" placeholder="Search">

                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-hover text-nowrap" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Judul Buku</th>
                                                            <th>Penulis</th>
                                                            <th>Penerbit</th>
                                                            <th>ISBN</th>
                                                            <th>Ketersediaan Buku</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($books as $book)
                                                            <tr>
                                                                <td>{{ $book->id }}</td>
                                                                <td>{{ $book->judul }}</td>
                                                                <td>{{ $book->penulis }}</td>
                                                                <td>{{ $book->penerbit }}</td>
                                                                <td>{{ $book->isbn }}</td>
                                                                <td>
                                                                    @if ($book->ketersediaan == 1)
                                                                        <span class="badge bg-success">Tersedia</span>
                                                                    @else
                                                                        <span class="badge bg-danger">Tidak Tersedia</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-default"
                                                                        onclick="showBookDetail({{ $book->id }})"><i
                                                                            class="fas fa-eye"></i></a>


                                                                    <a href="{{ route('book.show', $book->id) }}"
                                                                        class="btn btn-default btn-show">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    {{-- <button type="button" class="btn btn-default"
                                                                        data-toggle="modal" data-target="#modal-edit"><i
                                                                            class="fas fa-edit"></i></button> --}}
                                                                    <form action="{{ route('book.destroy', $book->id) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-default"
                                                                            onclick="return confirm('Yakin untuk menghapus data ini?')">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>


                <!-- ./row -->
            </div><!-- /.container-fluid -->
            <!-- /.modal -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data baru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('book.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" name="judul" class="form-control"
                                                    placeholder="Masukkan judul buku" required>
                                            </div>
                                        </div>

                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Penulis</label>
                                                <input type="text" name="penulis" class="form-control"
                                                    placeholder="Masukkan nama penulis" required>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit"
                                            placeholder="Masukkan penerbit buku" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Jumlah Halaman</label>
                                                <input type="text" class="form-control" name="jumlah_halaman"
                                                    placeholder="Masukkan jumlah halaman" required>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Warna Buku</label>
                                                <input type="text" class="form-control" name="warna"
                                                    placeholder="Masukkan Warna buku" required>
                                            </div>
                                            <!-- /.form-group -->

                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ISBN</label>
                                        <input type="text" class="form-control" name="isbn"
                                            placeholder="Masukkan ISBN" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ketersediaan Buku</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ketersediaan"
                                                id="tersedia" value="1" checked>
                                            <label class="form-check-label" for="tersedia">Tersedia</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ketersediaan"
                                                id="tidak-tersedia" value="0">
                                            <label class="form-check-label" for="tidak-tersedia">Tidak Tersedia</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi Fisik</label>
                                        <textarea class="form-control" name="deskripsi_fisik" rows="3" placeholder="Deskripsi fisik" required></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="modal-edit">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sunting Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan judul buku" name="judul">
                                            </div>
                                        </div>

                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Penulis</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan nama penulis">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Penerbit</label>
                                        <input type="text" class="form-control" placeholder="Masukkan penerbit buku">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Jumlah Halaman</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan jumlah halaman">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Warna Buku</label>
                                                <input type="text" name="warna" class="form-control"
                                                    placeholder="Masukkan Warna buku">
                                            </div>
                                            <!-- /.form-group -->

                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ISBN</label>
                                        <input type="text" class="form-control" placeholder="Masukkan ISBN">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ketersediaan Buku</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1" checked>
                                            <label class="form-check-label">Tersedia</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Tidak Tersedia</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi Fisik</label>
                                        <textarea class="form-control" rows="3" placeholder="Deskripsi fisik"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- Detail Modal -->
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Buku</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul Buku</label><br>
                                        <span id="modal-judul"></span>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Penulis</label><br>
                                        <span id="modal-penulis"></span>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Jumlah Halaman</label><br>
                                        <span id="modal-jumlah-halaman"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Warna</label><br>
                                        <span id="modal-warna"></span>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ISBN</label><br>
                                        <span id="modal-isbn"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit</label><br>
                                        <span id="modal-penerbit"></span>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Ketersediaan Buku</label> <br>
                                        <span id="modal-ketersediaan"></span>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Fisik</label><br>
                                        <span id="modal-deskripsi-fisik"></span>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


        </section>
        <!-- /.content -->
    </div>

    <script>
        function showBookDetail(bookId) {
            $.ajax({
                type: 'GET',
                url: '/admin/book/edit/' + bookId,
                success: function(data) {
                    console.log(data)
                    $('#modal-lg').modal('show');

                    $('#modal-judul').text(data.judul);
                    $('#modal-penulis').text(data.penulis);
                    $('#modal-jumlah-halaman').text(data.jumlah_halaman);
                    $('#modal-warna').text(data.warna);
                    $('#modal-isbn').text(data.isbn);
                    $('#modal-penerbit').text(data.penerbit);
                    $('#modal-deskripsi-fisik').text(data.deskripsi_fisik);

                    var ketersediaan = (data.ketersediaan == 1) ?
                        '<span class="badge bg-success">Tersedia</span>' :
                        '<span class="badge bg-danger">Tidak Tersedia</span>';
                    $('#modal-ketersediaan').html(ketersediaan);
                },
                error: function() {
                    alert('Oops! Something went wrong.');
                }
            });
        }
    </script>
@endsection
