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
                            <li class="breadcrumb-item"><a href="{{route('book-relation.index')}}">Transaksi</a></li>
                            <li class="breadcrumb-item active">Mapping Buku</li>
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
                                    Sunting Mapping Buku
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Table  Responsive -->
                                <form action="{{route('book-relation.update', $transaction->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Buku</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_buku">
                                            @foreach ($books as $book)
                                                <option value="{{ $book->id }}" {{ $book->id == $transaction->id_buku ? 'selected' : '' }}>{{$book->judul}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gambar</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_gambar" name="id_gambar" onchange="showSelectedImage()" id="id_gambar">
                                            @foreach ($images as $img)
                                                <option data-url="{{ asset('images/' . $img->gambar) }}" value="{{ $img->id }}" {{ $img->id == $transaction->id_gambar ? 'selected' : '' }}>{{$img->nama_gambar}}</option>
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
                                                <option value="{{ $category->id }}" {{ $category->id == $transaction->id_kategory ? 'selected' : '' }}>{{$category->kategori}}</option>
                                            @endforeach
                                        </select>
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
    <script>
        function showSelectedImage() {
            var selectElement = document.getElementById('id_gambar');
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var imageUrl = selectedOption.getAttribute('data-url');
            document.getElementById('gambar_pilihan').src = imageUrl;
        }
    </script>
@endsection
