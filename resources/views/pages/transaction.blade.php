@extends('content.sidebar')
@section('pages')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mapping Data Buku</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                            <li class="breadcrumb-item active">Mapping Data Buku</li>
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
                                    Mapping Buku
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Button tambah Kategori -->
                                <button type="button" class="btn btn-default mb-4" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fas fa-plus"></i>
                                    Tambah Data
                                </button>
                                <!-- Table  Responsive -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">List Data</h3>

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
                                                            <th>No</th>
                                                            <th>Lokasi</th>
                                                            <th>Nama</th>
                                                            <th>Kategori</th>
                                                            <th>Gambar</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $row)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $row->nama_gambar }}</td>
                                                                <td>{{ $row->judul }}</td>
                                                                <td>{{ $row->kategori }}</td>
                                                                <td><img width="100px;" src="{{ asset('images/' . $row->gambar) }}" alt=""></td>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-default"
                                                                        onclick="showMappingDetail({{ $row->id }})"><i
                                                                            class="fas fa-eye"></i></a>


                                                                    <a href="{{ route('book-relation.show', $row->id) }}"
                                                                        class="btn btn-default btn-show">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <form action="{{ route('book-relation.destroy', $row->id) }}"
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
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('book-relation.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Buku</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_buku">
                                            @foreach ($books as $book)
                                                <option value="{{ $book->id }}">{{ $book->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1" name="id_gambar">Gambar</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_gambar" onchange="showSelectedImage()" id="id_gambar">
                                            @foreach ($images as $img)
                                                <option value="{{ $img->id }}" data-url="{{ asset('images/' . $img->gambar) }}">{{ $img->nama_gambar }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="gambar_container" class="mb-3">
                                        <img id="gambar_pilihan" src="" style="max-width: 100%; max-height: 300px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1" name="id_kategori">Kategori</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_kategory">
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                                            @endforeach
                                        </select>
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
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kategori</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Slice of live">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Panduan Lokasi</label>
                                        <textarea class="form-control" rows="3" placeholder="Rincian lokasi"></textarea>
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
                            <h4 class="modal-title">Detail Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul Buku</label><br>
                                        <span id="judul"></span>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Penulis</label><br>
                                        <span id="penulis"></span>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Kategori</label><br>
                                        <span id="kategori"></span>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ISBN</label><br>
                                        <span id="isbn"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit</label><br>
                                        <span id="penerbit"></span>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Ketersediaan Buku</label> <br>
                                        <span  id="ketersediaan"></span>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Fisik</label><br>
                                        <span id="deskripsi"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Panduan Lokasi</label><br>
                                        <span id="lokasi"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Map Lokasi</label><br>
                                        <img id="modal-gambar" width="350px" src="" alt="">
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
        function showMappingDetail(mappingId) {
            $.ajax({
                type: 'GET',
                url: '/admin/book-relation/edit/' + mappingId,
                success: function(data) {
                    console.log(data)
                    $('#modal-lg').modal('show');

                    $('#judul').text(data.judul);
                    $('#penulis').text(data.penulis);
                    $('#kategori').text(data.kategori);
                    $('#isbn').text(data.isbn);
                    $('#penerbit').text(data.penerbit);
                    var ketersediaan = (data.ketersediaan == 1) ?
                        '<span class="badge bg-success">Tersedia</span>' :
                        '<span class="badge bg-danger">Tidak Tersedia</span>';
                    $('#ketersediaan').html(ketersediaan);
                    $('#deskripsi').text(data.deskripsi_fisik);
                    $('#lokasi').text(data.panduan_lokasi);
                    $('#modal-gambar').attr('src', '{{ asset('images') }}/' + data.gambar);
                },
                error: function() {
                    alert('Oops! Something went wrong.');
                }
            });
        }

        function showSelectedImage() {
            var selectElement = document.getElementById('id_gambar');
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var imageUrl = selectedOption.getAttribute('data-url');
            document.getElementById('gambar_pilihan').src = imageUrl;
        }
    </script>
@endsection
