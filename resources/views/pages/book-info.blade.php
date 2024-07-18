<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Perpustakaan UIN Syarif Hidayatullah Jakarta</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('lib/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('lib/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('lib/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Navbar Start -->
        <div class=" nav-bar sticky-top bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{asset('lib/img/logo.jpg')}}" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h5 class="m-0 text-primary">UIN Syarif Hidayatullah</h5>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">Kategori</a>
                    </div>
                    <a href="" class="btn btn-primary px-3 d-none d-lg-flex"><i class="fas fa-user-tie"
                            style="margin-right: 10px;"></i>Login</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <a href="{{route('fe.index')}}"><i class="fas fa-arrow-left fa-lg"></i></a>
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Detail Buku</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('images/' . $info->gambar) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Judul Buku</td>
                                    <td>{{$info->judul}}</td>
                                </tr>
                                <tr>
                                    <td>Penulis</td>
                                    <td>{{$info->penulis}}</td>
                                </tr>
                                <tr>
                                    <td>Penerbit</td>
                                    <td>{{$info->penerbit}}</td>
                                </tr>
                                <tr>
                                    <td>ISBN / ISSN</td>
                                    <td>{{$info->isbn}}</td>
                                </tr>
                                <tr>
                                    <td>Kategori Buku</td>
                                    <td>{{$info->kategori}}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi Fisik</td>
                                    <td>{{$info->deskripsi_fisik}}</td>
                                </tr>
                                <tr>
                                    <td>Ketersediaan Buku</td>
                                    @if ($info->ketersediaan == 1)
                                        <td><span class="badge bg-success">Tersedia</span></td>
                                    @else
                                        <td><span class="badge bg-error">Tidak Tersedia</span></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Panduan Lokasi</td>
                                    <td>{{$info->panduan_lokasi}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6">
                        <h5 class="text-white mb-4">Informasi</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Ir H. Juanda No.95, Ciputat,
                            Kec.
                            Ciputat Tim., Kota Tangerang Selatan, Banten 15412</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(021) 7401925</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('lib/js/main.js')}}"></script>
</body>

</html>
