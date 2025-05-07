@extends('frontend.layout.pagelayout')
@section('content')
<!-- Hero Section -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(to bottom right, #0a3420, #0e4429, #155c39); overflow: hidden;">
    <div class="container text-center position-relative z-2">
        <h1 class="display-4 fw-bold">Profile KUA Kecamatan Kadur</h1>
        <p class="lead text-light">Mengenal lebih dekat Kantor Urusan Agama Kecamatan Kadur</p>
    </div>
</section>

<!-- Tabs Section -->
<section class="py-5">
    <div class="container">
        <ul class="nav nav-tabs mb-4" id="profileTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tentang-tab" data-bs-toggle="tab" data-bs-target="#tentang" type="button" role="tab">Tentang KUA</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="visimisi-tab" data-bs-toggle="tab" data-bs-target="#visimisi" type="button" role="tab">Visi & Misi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="struktur-tab" data-bs-toggle="tab" data-bs-target="#struktur" type="button" role="tab">Struktur Organisasi</button>
            </li>
        </ul>

        <div class="tab-content" id="profileTabContent">

            <!-- Tentang -->
            <div class="tab-pane fade show active" id="tentang" role="tabpanel">
                <div class="row mb-5 align-items-center">
                    <div class="col-lg-6">
                        <h2>KANTOR URUSAN AGAMA KECAMATAN KADUR</h2>
                        <!-- <p>KUA Kecamatan Kadur didirikan tahun 1985 sebagai upaya pelayanan keagamaan yang lebih baik.</p>
                        <p>Gedung direnovasi tahun 2010, kini melayani pernikahan, wakaf, bimbingan keluarga, dan lainnya.</p> -->
                        <p>
                            Kantor Urusan Agama Kecamatan Kadur memiliki sarana berupa gedung balainikah yang letaknya berada dijalan raya Sokolelah Kadur posisinya kurang lebih 500 meterkearah Timur Kantor Kecamatan Kadur (sebelah selatan SMPN I Kadur).
                        </p>
                        <p>
                            Gedung balai nikah Kantor Urusan Agama (KUA) tersebut dibangun pada tahun 1997
                            melalui sumber dana anggaran pendapatan dan belanja negara (APBN) dengan luas bangunan
                            gedung 180,5 meter persegi yang berdiri di atas areal tanah seluas 368 meter persegi sedangkan
                            kondisi bangunan tersebut hingga saat ini tergolong berkategori sedang, oleh karena itu masih
                            memerlukan perbaikan-perbaikan.
                        </p>
                    </div>
                <div class="col-lg-6 text-center">
                    <img src="/storage/default-image.jpg" alt="Gedung KUA" class="img-fluid rounded">
                </div>
                </div>
                <div>
                    <h2>Tugas dan Fungsi</h2>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Administrasi Nikah dan Rujuk</h5>
                                    <p class="card-text">Pencatatan nikah dan rujuk serta bimbingan perkawinan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Pembinaan Keluarga Sakinah</h5>
                                    <p class="card-text">Bimbingan dan konsultasi mewujudkan keluarga sakinah.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Pembinaan Kemasjidan</h5>
                                    <p class="card-text">Pengembangan kemasjidan dan ibadah sosial.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Pengelolaan Wakaf</h5>
                                    <p class="card-text">Administrasi dan pembinaan pengelolaan wakaf.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visi Misi -->
            <div class="tab-pane fade" id="visimisi" role="tabpanel">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Visi</h5>
                                <p class="text-center">"Terwujudnya masyarakat Kadur yang taat beragama, rukun, cerdas, dan sejahtera lahir batin."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Misi</h5>
                                <ul>
                                    <li>Meningkatkan pelayanan nikah & rujuk</li>
                                    <li>Pembinaan keluarga sakinah</li>
                                    <li>Pembinaan kemasjidan & wakaf</li>
                                    <li>Pembinaan ibadah sosial</li>
                                    <li>Good governance & akuntabilitas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body text-center">
                        <h5>Motto Pelayanan</h5>
                        <p class="fw-bold text-success">"IKHLAS - Integritas, Komunikatif, Humanis, Loyal, Akuntabel, Santun"</p>
                        <p class="text-muted">Pelayanan penuh keikhlasan & profesionalisme untuk masyarakat.</p>
                    </div>
                </div>
            </div>

            <!-- Struktur Organisasi -->
            <div class="tab-pane fade" id="struktur" role="tabpanel">
                <h2>Struktur Organisasi KUA Kecamatan Kadur</h2>
                <div class="text-center mb-5">
                    <img src="/storage/profile/struktur.png" alt="Struktur Organisasi" class="img-fluid rounded">
                </div>
                <div class="row g-4">
                    <h2>Personalia Pegawai KUA Kecamatan Kadur</h2>
                    <div class="col-md-4 text-center">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>Kepala KUA</h5>
                                <p class="text-muted">H. AHMAD SYAIHU, M.Si.<br>NIP. 197410282000031001</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>Penghulu</h5>
                                <p class="text-muted">Muhammad Hasan, S.HI<br>NIP. 198203102009011005</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>Penyuluh Agama</h5>
                                <p class="text-muted">Hj. Siti Aminah, S.Pd.I<br>NIP. 198107202010012008</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>Kepala KUA</h5>
                                <p class="text-muted">H. Ahmad Fauzi, S.Ag<br>NIP. 197505152005011001</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>Penghulu</h5>
                                <p class="text-muted">Muhammad Hasan, S.HI<br>NIP. 198203102009011005</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>Penyuluh Agama</h5>
                                <p class="text-muted">Hj. Siti Aminah, S.Pd.I<br>NIP. 198107202010012008</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Bootstrap Tabs JS dependencies -->
<script>
    const tabTriggerEl = document.querySelector('#profileTab button')
    if (tabTriggerEl) {
        new bootstrap.Tab(tabTriggerEl)
    } 
</script>
@endsection
<!-- <section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-3">
                <div class="d-flex align-items-center mt-lg-5 mb-4">
                    <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                    
                </div>
            </div>
            <div class="col-lg-9">

                ##Post content
                <article>

                    ##Post header
                    <header class="mb-4">

                        ##Post title
                        <h1 class="fw-bolder mb-1">{{$profile->judul_profile}}</h1>
                        ##Post meta content
                        <div class="text-muted fst-italic mb-2">{{$profile->created_at}}</div>
                    </header>

                    ##Preview image figure
                    <figure class="mb-4">
                    <img class="img-fluid rounded" src="{{ asset('storage/' . $profile->gambar_profile) }}" alt="{{ $profile->judul_profile }}">
                    </figure>

                    ##Post content
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{!! $profile->isi_profile !!}</p>
                    </section>
                </article>
            </div>
        </div>
    </div>
</section> -->

