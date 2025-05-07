@extends('frontend.layout.pagelayout')

@section('content')
<main>
  <!-- Hero Section -->
  <section class="py-5 position-relative text-white" style="background: linear-gradient(to bottom right, #0a3420, #0e4429, #155c39); overflow: hidden;">
    <div class="container text-center position-relative z-2">
      <h1 class="display-4 fw-bold">Layanan KUA Kecamatan Kadur</h1>
      <p class="lead">Berbagai layanan yang tersedia di KUA Kecamatan Kadur untuk melayani masyarakat</p>
    </div>
  </section>

  <!-- Search Section -->
  <section class="py-4 border-bottom">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
      <h2 class="h4 mb-3 mb-md-0">Semua Layanan</h2>
      <form class="d-flex" action="" method="GET">
        <input type="search" name="search" class="form-control me-2" placeholder="Cari layanan...">
        <button type="submit" class="btn btn-outline-secondary">Cari</button>
      </form>
    </div>
  </section>

  <!-- Card Maklumat Section -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        @foreach ($layanan as $row)
          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">
                    <a href="{{route('home.detailLayanan', $row->id_layanan)}}" class="text-decoration-none text-dark">
                      {{ $row->nama_layanan }}
                    </a>
                  </h5>
                  <span class="badge bg-light text-dark text-capitalize border">{{ $row->bagian_layanan->nama_bagian_layanan ?? '-'}}</span>
                </div>
                <p class="card-text">{!! substr($row->deskripsi_layanan, 0, 100) !!}</p>
              </div>
              <div class="card-footer bg-transparent">
                <a href="{{route('home.detailLayanan', $row->id_layanan)}}" class="btn btn-sm btn-outline-success">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

      {{-- Procedure Section --}}
      <section class="py-5 bg-light">
        <div class="container px-4 md:px-6">
          <div class="flex flex-col items-center justify-center space-y-4 text-center">
            <div class="space-y-2">
              <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl">Prosedur Pendaftaran Nikah</h2>
              <p class="max-w-[900px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                Langkah-langkah pendaftaran nikah di KUA Kecamatan Kadur
              </p>
            </div>
          </div>
          <div class="row justify-content-center">
            <!-- Step 1 -->
            <div class="col-md-4 mb-4">
              <div class="d-flex flex-column align-items-center">
                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; font-size: 20px;">
                  1
                </div>
                <h5 class="fw-bold">Persiapan Dokumen</h5>
                <p class="text-muted small">
                  Siapkan dokumen yang diperlukan seperti KTP, KK, Akta Kelahiran, dan dokumen lainnya milik pasangan calon pengantin.
                </p>
              </div>
            </div>

            <!-- Step 2 -->
            <div class="col-md-4 mb-4">
              <div class="d-flex flex-column align-items-center">
                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; font-size: 20px;">
                  2
                </div>
                <h5 class="fw-bold">Pendaftaran</h5>
                <p class="text-muted small">
                  Daftar di KUA Kecamatan Kadur minimal 10 hari kerja sebelum tanggal pernikahan.
                </p>
              </div>
            </div>

            <!-- Step 3 -->
            <div class="col-md-4 mb-4">
              <div class="d-flex flex-column align-items-center">
                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; font-size: 20px;">
                  3
                </div>
                <h5 class="fw-bold">Akad Nikah</h5>
                <p class="text-muted small">
                  Laksanakan akad nikah sesuai jadwal yang telah ditentukan di KUA atau di luar KUA.
                </p>
              </div>
            </div>
          </div>

          <div class="flex justify-center">
            <a href="https://simkah4.kemenag.go.id/">
              <button class="btn hover:bg-[#0a3420] text-white px-4 py-2 rounded btn-success">
                Daftar Nikah Sekarang
              </button>
            </a>
          </div>
        </div>
      </section>
    </div>
  </section>
</main>
@endsection
