@extends('content.sidebar')
@section('pages')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kategori</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('category.index')}}">Data Master</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
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
                                    <i class="fas fa-category"></i>
                                    Data Master Kategori
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Button tambah Kategori -->
                                <button type="button" class="btn btn-default mb-4" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fas fa-plus"></i>
                                    Tambah Kategori
                                </button>
                                <!-- Table  Responsive -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">List Data Kategori</h3>

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
                                                            <th>Kategori</th>
                                                            <th>Panduan Lokasi</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($categorys as $x)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{$x->kategori}}</td>
                                                            <td>{{$x->panduan_lokasi}}</td>
                                                            <td>
                                                                <a class="btn btn-default"
                                                                        onclick="showCategoryDetail({{ $x->id }})"><i
                                                                            class="fas fa-eye"></i></a>


                                                                    <a href="{{ route('category.show', $x->id) }}"
                                                                        class="btn btn-default btn-show">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <form action="{{ route('category.destroy', $x->id) }}"
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
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Kategori" name="kategori" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Panduan Lokasi</label>
                                        <textarea class="form-control" rows="3" placeholder="Rincian lokasi" name="panduan_lokasi" required></textarea>
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
                            <h4 class="modal-title">Detail Buku</h4>
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
                                        <label>Kategori</label> <br>
                                        <span id="modal-kategori"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Panduan Lokasi</label><br>
                                        <span id="modal-panduan_lokasi"></span>
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
        function showCategoryDetail(categoryId) {
            $.ajax({
                type: 'GET',
                url: '/admin/category/edit/' + categoryId,
                success: function(data) {
                    console.log(data)
                    $('#modal-lg').modal('show');

                    $('#modal-kategori').text(data.kategori);
                    $('#modal-panduan_lokasi').text(data.panduan_lokasi);
                },
                error: function() {
                    alert('Oops! Something went wrong.');
                }
            });
        }
    </script>
@endsection
