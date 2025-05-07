<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>KUA Kadur</title>
</head>
<body>

    <!-- header -->
    <header id="mainHeader" class="sticky-top bg-white transition-shadow">
        <nav class="navbar navbar-expand-md navbar-light container py-3">
            <div class="container px-5">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <!-- <div class="rounded-circle d-flex align-items-center justify-content-center bg-success text-white fw-bold" style="width: 32px; height: 32px; font-size: 12px;">
                        KUA
                    </div> -->
                    <span class="fw-bold text-success">KUA Kec. Kadur</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        @php
                            $navItems = [
                                ['name' => 'Beranda', 'href' => '/'],
                                ['name' => 'Profile', 'href' => '/profile'],
                                ['name' => 'Berita', 'href' => '/berita'],
                                ['name' => 'Maklumat', 'href' => '/maklumat'],
                                ['name' => 'Pelayanan', 'href' => '/layanan'],
                                ['name' => 'Kontak', 'href' => '/kontak'],
                            ];
                        @endphp
                        @foreach ($navItems as $item)
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ request()->is(ltrim($item['href'], '/')) ? 'active fw-semibold text-success' : '' }}"
                                    href="{{ url($item['href']) }}"
                                >
                                    {{ $item['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="https://simkah4.kemenag.go.id/" class="ms-md-3 mt-2 mt-md-0" target="blank">
                        <button class="btn btn-success shadow-sm">Daftar Nikah</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <section>
        @yield('content')
    </section>

    <!-- footer -->
    <footer class="text-white position-relative" style="background: linear-gradient(to bottom right, #0a3420, #0e4429, #155c39); overflow: hidden;">

        <div class="container py-5 position-relative">
            <div class="row gy-5">

                <div class="col-lg-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <!-- <div class="bg-white rounded-circle p-1">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <span class="text-white fw-bold small">KUA</span>
                            </div>
                        </div> -->
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
                        <li><a href="/layanan" class="text-white text-decoration-none d-block py-1 opacity-75 hover-opacity">Pelayanan</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h5 class="fw-semibold">Layanan</h5>
                    <ul class="list-unstyled small">
                        <!-- <li><a href="https://simkah4.kemenag.go.id/" class="text-white text-decoration-none d-block py-1 opacity-75">Pendaftaran Nikah</a></li>
                        <li><a href="/pelayanan/konsultasi" class="text-white text-decoration-none d-block py-1 opacity-75">Konsultasi Keluarga</a></li>
                        <li><a href="/pelayanan/surat" class="text-white text-decoration-none d-block py-1 opacity-75">Penerbitan Surat</a></li>
                        <li><a href="/pelayanan/wakaf" class="text-white text-decoration-none d-block py-1 opacity-75">Wakaf</a></li>
                        <li><a href="/pelayanan/haji" class="text-white text-decoration-none d-block py-1 opacity-75">Bimbingan Haji & Umrah</a></li> -->
                        @php
                        use App\Models\Layanan;
                        $layanan = Layanan::all();
                        @endphp
                        @foreach($layanan as $row)
                        <li>
                            <a href="{{route('home.layanan')}}" class="text-white text-decoration-none d-block py-1 opacity-75">{{$row->nama_layanan}}</a>
                        </li>
                        @endforeach
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.getElementById("mainHeader");

            window.addEventListener("scroll", function () {
                if (window.scrollY > 10) {
                    header.classList.add("shadow-sm");
                } else {
                    header.classList.remove("shadow-sm");
                }
            });
        });
    </script>

</body>
</html>