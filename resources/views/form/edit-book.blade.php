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
                                    Sunting Master Buku
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Table  Responsive -->
                                <form action="{{route('book.update', $book->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" class="form-control" placeholder="Masukkan judul buku"
                                                    name="judul" value="{{ $book->judul }}" required>
                                            </div>
                                        </div>

                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Penulis</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan nama penulis" name="penulis" value="{{ $book->penulis }}"
                                                    required>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan penerbit buku"
                                            value="{{ $book->penerbit }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Jumlah Halaman</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan jumlah halaman" name="jumlah_halaman"
                                                    value="{{ $book->jumlah_halaman }}" required>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Warna Buku</label>
                                                <input type="text" name="warna" class="form-control"
                                                    placeholder="Masukkan Warna buku" value="{{ $book->warna }}" required>
                                            </div>
                                            <!-- /.form-group -->

                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ISBN</label>
                                        <input type="text" class="form-control" name="isbn" placeholder="Masukkan ISBN"
                                            value="{{ $book->isbn }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ketersediaan</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ketersediaan" value="1"
                                                {{ $book->ketersediaan == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label">Tersedia</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ketersediaan" value="0"
                                                {{ $book->ketersediaan == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label">Tidak Tersedia</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi Fisik</label>
                                        <textarea name="deskripsi_fisik" class="form-control" rows="3" placeholder="Deskripsi fisik" required>{{ $book->deskripsi_fisik }}</textarea>
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
