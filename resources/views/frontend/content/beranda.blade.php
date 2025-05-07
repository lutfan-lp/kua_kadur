<!-- resources/views/home.blade.php -->
@extends('frontend.layout.pagelayout')

@section('content')
<div class="min-vh-100 d-flex flex-column">
  <!-- Hero Section -->
  <section class="position-relative" style="background-image: url('{{ asset('storage/lorem.jpeg') }}'); background-size: cover; background-position: center; height: 95vh;">
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
    <!-- Content -->
    <div class="container h-100 d-flex align-items-center justify-content-center text-white text-center" style="z-index: 2; position: relative;">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">Kantor Urusan Agama Kecamatan Kadur</h1>
                <p class="lead mt-3">Temukan informasi seputar layanan, berita, dan aktivitas KUA Kadur di sini.</p>
                <a href="{{route('home.profile')}}" class="btn btn-light text-success fw-medium">Lihat Profil</a>
            </div>
        </div>
    </div>
</section>
  <!-- <section class="bg-success text-white py-5 position-relative overflow-hidden">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom right, #0a3420, #0e4429, #155c39); opacity: 0.9;"></div>
    <div class="container position-relative z-1 py-5">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold">Kantor Urusan Agama Kecamatan Kadur</h1>
          <p class="lead">Melayani dengan sepenuh hati untuk masyarakat Kecamatan Kadur dalam urusan keagamaan</p>
          <div class="d-flex flex-column flex-sm-row gap-3 mt-4">
            <a href="{{ url('/pelayanan') }}" class="btn btn-light text-success fw-medium">Layanan Kami</a>
            <a href="{{ url('/profile') }}" class="btn btn-outline-light">Tentang Kami</a>
          </div>
        </div>
        <div class="col-lg-6 text-center">
          <img src="/placeholder.svg" class="img-fluid rounded shadow-lg" alt="KUA Kec. Kadur">
        </div>
      </div>
    </div>
  </section> -->

  <!-- Info Cards -->
  <section class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold">Informasi Penting</h2>
      <p class="text-muted">Temukan informasi penting tentang KUA Kecamatan Kadur</p>
      <div class="row mt-5">
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Profile</h5>
              <p class="card-text">Informasi lengkap tentang KUA Kecamatan Kadur, visi, misi, dan struktur organisasi.</p>
              <a href="{{ url('/profile') }}" class="btn btn-outline-success w-100">Lihat Profile</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Maklumat</h5>
              <p class="card-text">Pengumuman dan maklumat penting dari KUA Kecamatan Kadur untuk masyarakat.</p>
              <a href="{{ url('/maklumat') }}" class="btn btn-outline-success w-100">Lihat Maklumat</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Pelayanan</h5>
              <p class="card-text">Informasi lengkap tentang layanan yang tersedia di KUA Kecamatan Kadur.</p>
              <a href="{{ url('/layanan') }}" class="btn btn-outline-success w-100">Lihat Pelayanan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Layanan Kami -->
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="fw-bold">Layanan Kami</h2>
      <p class="text-muted">KUA Kecamatan Kadur menyediakan berbagai layanan untuk masyarakat</p>
      <div class="row mt-5">
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="mb-3 text-success">
                <i class="bi bi-people-fill fs-3"></i>
              </div>
              <h5 class="card-title">Pendaftaran Nikah</h5>
              <p class="card-text">Layanan pendaftaran pernikahan bagi calon pengantin</p>
              <a href="{{ url('/pelayanan/nikah') }}" class="btn btn-outline-success w-100">Detail Layanan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="mb-3 text-success">
                <i class="bi bi-calendar-event fs-3"></i>
              </div>
              <h5 class="card-title">Konsultasi Keluarga</h5>
              <p class="card-text">Layanan konsultasi untuk keluarga sakinah</p>
              <a href="{{ url('/pelayanan/konsultasi') }}" class="btn btn-outline-success w-100">Detail Layanan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="mb-3 text-success">
                <i class="bi bi-file-earmark-text fs-3"></i>
              </div>
              <h5 class="card-title">Penerbitan Surat</h5>
              <p class="card-text">Layanan penerbitan surat dan dokumen keagamaan</p>
              <a href="{{ url('/pelayanan/surat') }}" class="btn btn-outline-success w-100">Detail Layanan</a>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-4">
        <a href="{{route('home.layanan')}}" class="btn btn-success">Lihat Semua Layanan</a>
      </div>
    </div>
  </section>

  <!-- Berita Terbaru -->
  <section class="py-5">
    <div class="container text-center px-5">
      <h2 class="fw-bold">Berita Terbaru</h2>
      <p class="text-muted">Informasi dan berita terkini dari KUA Kecamatan Kadur</p>
      <div class="row gx-5">
        @foreach ($berita as $row)
        <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow border-0">
                <img class="card-img-top" src="{{ asset('storage/' . $row->gambar_berita) }}" width="50px" alt="{{$row->judul_berita}}" />
                <div class="card-body p-4">
                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$row->kategori->nama_kategori}}</div>
                    <a class="text-decoration-none link-dark stretched-link" href="{{route('home.detailBerita', $row->id_berita)}}"><div class="h5 card-title mb-3">{{$row->judul_berita}}</div></a>
                    <p class="card-text mb-0">{!! substr($row->isi_berita, 0, 200) !!}...</p>
                </div>
                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                    <div class="d-flex align-items-end justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="small">
                                <div class="fw-bold">Admin</div>
                                <div class="text-muted">{{$row->created_at  }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
      <div class="mt-4">
        <a href="{{ url('/berita') }}" class="btn btn-success">Lihat Semua Berita</a>
      </div>
    </div>
  </section>

  <!-- Testimoni -->
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="fw-bold mb-3">Apa Kata Mereka</h2>
      <p class="text-muted mb-4">Pendapat masyarakat tentang pelayanan KUA Kecamatan Kadur</p>
      
    </div>
  </section>
</div>
@endsection
