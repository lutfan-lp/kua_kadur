<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Website KUA Kadur</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets-fe/assets/favicon.ico')}}" />
        <!-- Bootstrap icons-->
         <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets-fe/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <header class="sticky-top bg-white transition-shadow">
                <!-- Navigation-->
                <nav class="navbar navbar-expand-md navbar-light container py-3">
                    <div class="container px-5">
                        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-success text-white fw-bold" style="width: 32px; height: 32px; font-size: 12px;">
                                KUA
                            </div>
                            <span class="fw-bold text-success">KUA Kec. Kadur</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                @foreach($menu as $dm)
                                @if(sizeof($dm['itemMenu']) > 0)
                                    <li class='nav-item dropdown'>
                                        <a href="{{$dm['url']}}" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                                            {{$dm['menu']}}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @foreach($dm['itemMenu'] as $idm)
                                                <li>
                                                    <a href="{{$idm['sub_menu_url']}}" class="dropdown-item" target="{{$idm['sub_menu_target']}}">
                                                        {{$idm['sub_menu_nama']}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{$dm['url']}}" class="nav-link" target="{{$dm['target']}}">
                                            {{$dm['menu']}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            @yield('content')

        </main>
        <!-- Footer-->
        <footer class="bg-success bg-gradient text-white position-relative">
            <div class="container py-5 position-relative">
                <div class="row gy-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="bg-white rounded-circle p-1">
                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <span class="text-white fw-bold small">KUA</span>
                        </div>
                    </div>
                    <h5 class="mb-0 fw-bold">KUA Kec. Kadur</h5>
                    </div>
                    <p class="small opacity-75">
                    Kantor Urusan Agama Kecamatan Kadur melayani masyarakat dalam urusan keagamaan dengan profesional dan amanah.
                    </p>
                </div>

                <div class="col-lg-3">
                    <h5 class="fw-semibold">Tautan</h5>
                    <ul class="list-unstyled small">
                    <li><a href="/" class="text-white text-decoration-none d-block py-1 opacity-75 hover-opacity">Beranda</a></li>
                    <li><a href="/profile" class="text-white text-decoration-none d-block py-1 opacity-75 hover-opacity">Profile</a></li>
                    <li><a href="/berita" class="text-white text-decoration-none d-block py-1 opacity-75 hover-opacity">Berita</a></li>
                    <li><a href="/maklumat" class="text-white text-decoration-none d-block py-1 opacity-75 hover-opacity">Maklumat</a></li>
                    <li><a href="/pelayanan" class="text-white text-decoration-none d-block py-1 opacity-75 hover-opacity">Pelayanan</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h5 class="fw-semibold">Layanan</h5>
                    <ul class="list-unstyled small">
                    <li><a href="/pelayanan/nikah" class="text-white text-decoration-none d-block py-1 opacity-75">Pendaftaran Nikah</a></li>
                    <li><a href="/pelayanan/konsultasi" class="text-white text-decoration-none d-block py-1 opacity-75">Konsultasi Keluarga</a></li>
                    <li><a href="/pelayanan/surat" class="text-white text-decoration-none d-block py-1 opacity-75">Penerbitan Surat</a></li>
                    <li><a href="/pelayanan/wakaf" class="text-white text-decoration-none d-block py-1 opacity-75">Wakaf</a></li>
                    <li><a href="/pelayanan/haji" class="text-white text-decoration-none d-block py-1 opacity-75">Bimbingan Haji & Umrah</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h5 class="fw-semibold">Kontak</h5>
                    <ul class="list-unstyled small">
                    <li class="d-flex align-items-start gap-2">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Jl. Raya Kadur No. 123, Kecamatan Kadur</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 mt-2">
                        <i class="bi bi-telephone-fill"></i>
                        <span>(0123) 456789</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 mt-2">
                        <i class="bi bi-envelope-fill"></i>
                        <span>info@kuakadur.go.id</span>
                    </li>
                    </ul>

                    <div class="d-flex gap-3 pt-3">
                    <a href="#" class="text-white opacity-75 hover-opacity" title="Facebook">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>
                    <a href="#" class="text-white opacity-75 hover-opacity" title="Twitter">
                        <i class="bi bi-twitter fs-5"></i>
                    </a>
                    <a href="#" class="text-white opacity-75 hover-opacity" title="Instagram">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                    </div>
                </div>
                </div>

                <div class="text-center mt-5 pt-4 border-top border-white-50 small">
                <p class="mb-0">&copy; {{ date('Y') }} KUA Kecamatan Kadur. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('assets-fe/js/scripts.js')}}"></script>
    </body>
</html>
