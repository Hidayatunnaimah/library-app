@extends('content.sidebar')
@section('pages')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Map Lokasi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                            <li class="breadcrumb-item active">Map Lokasi</li>
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
                                    Data Master Map Lokasi
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Button tambah Map Lokasi -->
                                <button type="button" class="btn btn-default mb-4" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fas fa-plus"></i>
                                    Tambah Map Lokasi
                                </button>
                                <!-- Table  Responsive -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">List Data Map Lokasi</h3>

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
                                                            <th>Nama Map Lokasi</th>
                                                            <th>Gambar</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($mapLocations as $x)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{$x->nama_gambar}}</td>
                                                            <td><img width="100px;" src="{{ asset('images/' . $x->gambar) }}" alt=""></td>
                                                            <td>
                                                                <a class="btn btn-default"
                                                                        onclick="showMapDetail({{ $x->id }})"><i
                                                                            class="fas fa-eye"></i></a>


                                                                    <a href="{{ route('mapLocation.show', $x->id) }}"
                                                                        class="btn btn-default btn-show">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <form action="{{ route('mapLocation.destroy', $x->id) }}"
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
                            <form action="{{route('mapLocation.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Lokasi</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Map Lokasi" name="nama_gambar">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gambar</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Map Lokasi" name="gambar">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                        <label for="exampleInputEmail1">Nama Lokasi</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Map Lokasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gambar</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Map Lokasi">
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
                            <h4 class="modal-title">Detail Lokasi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Nama Lokasi</label> <br>
                                        <span id="modal-nama_gambar"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label><br>
                                        <img id="modal-gambar" width="350px" src="" alt="">
                                    </div>
                                    <!-- /.form-group -->
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
        function showMapDetail(mapId) {
            $.ajax({
                type: 'GET',
                url: '/admin/map-location/edit/' + mapId,
                success: function(data) {
                    console.log(data)
                    $('#modal-lg').modal('show');

                    $('#modal-nama_gambar').text(data.nama_gambar);
                    $('#modal-gambar').attr('src', '{{ asset('images') }}/' + data.gambar);
                },
                error: function() {
                    alert('Oops! Something went wrong.');
                }
            });
        }
    </script>
@endsection
