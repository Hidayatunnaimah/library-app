@extends('content.sidebar')
@section('pages')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Master Map Lokasi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('mapLocation.index')}}">Data Master</a></li>
                            <li class="breadcrumb-item active">Master Map Lokasi</li>
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
                                    Sunting Master Map Lokasi
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Table  Responsive -->
                                <form action="{{route('mapLocation.update', $mapLocation->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Nama Lokasi</label>
                                        <input type="text" class="form-control" name="nama_gambar" placeholder="Masukkan Nama Lokasi"
                                            value="{{ $mapLocation->nama_gambar }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1"
                                            placeholder="Masukkan Map Lokasi" name="gambar"><br>
                                            <img width="200px" src="{{ asset('images/' . $mapLocation->gambar) }}" alt="">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>


                <!-- ./row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
