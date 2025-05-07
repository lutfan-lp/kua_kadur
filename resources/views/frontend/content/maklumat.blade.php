@extends('frontend.layout.pagelayout')

@section('content')
<main>
  <!-- Hero Section -->
  <section class="py-5 position-relative text-white" style="background: linear-gradient(to bottom right, #0a3420, #0e4429, #155c39); overflow: hidden;">
    <div class="container text-center position-relative z-2">
      <h1 class="display-4 fw-bold">Maklumat & Pengumuman</h1>
      <p class="lead">Maklumat dan pengumuman resmi dari KUA Kecamatan Kadur</p>
    </div>
  </section>

  <!-- Search Section -->
  <section class="py-4 border-bottom">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
      <h2 class="h4 mb-3 mb-md-0">Semua Maklumat</h2>
      <form class="d-flex" action="" method="GET">
        <input type="search" name="search" class="form-control me-2" placeholder="Cari maklumat...">
        <button type="submit" class="btn btn-outline-secondary">Cari</button>
      </form>
    </div>
  </section>

  <!-- Tabbed Maklumat Section -->
  <section class="py-5">
    <div class="container">
      <!-- Nav Tabs -->
      <!-- <ul class="nav nav-tabs mb-4" id="maklumatTabs" role="tablist">
        <li class="nav-item">
          <button class="nav-link active" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab">Semua</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="pelayanan-tab" data-bs-toggle="tab" data-bs-target="#pelayanan" type="button" role="tab">Pelayanan</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="pengumuman-tab" data-bs-toggle="tab" data-bs-target="#pengumuman" type="button" role="tab">Pengumuman</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="informasi-tab" data-bs-toggle="tab" data-bs-target="#informasi" type="button" role="tab">Informasi</button>
        </li>
      </ul> -->
      <ul name="id_kategori_maklumat" class="nav nav-tabs mb-4" id="maklumatTabs" role="tablist">
        <!-- show semua maklumat -->
        <li class="nav-item">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab" value="1">Semua</button>
        </li>
        @foreach($kategori_maklumat as $row)
          <!-- show maklumat sesuai kategori maklumat -->
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#{{ Str::slug($row->nama_kategori_maklumat) }}" type="button" role="tab" value="{{$row->id_kategori}}">{{$row->nama_kategori_maklumat}}</button>
          </li>
        @endforeach
      </ul>

      <div class="tab-content" id="maklumatTabsContent">

        {{-- Tab SEMUA --}}
        <div class="tab-pane fade show active" id="semua" role="tabpanel">
          <div class="row g-4">
            @foreach ($maklumats as $item)
              <div class="col-md-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h5 class="card-title">
                        <a href="{{route('home.detailMaklumat', $item->id_maklumat)}}" class="text-decoration-none text-dark">
                          {{ $item->judul_maklumat }}
                        </a>
                      </h5>
                      <span class="badge bg-light text-dark text-capitalize border">
                        {{ $item->kategori_maklumat->nama_kategori_maklumat ?? '-' }}
                      </span>
                    </div>
                    <p class="card-subtitle mb-2 text-muted small">
                      <i class="bi bi-calendar-event me-1"></i> {{ $item->created_at ? $item->created_at->format('Y-m-d') : 'Tanggal tidak tersedia' }}
                    </p>
                    <p class="card-text">{!! substr($item->isi_maklumat, 0, 50) !!} ...</p>
                  </div>
                  <div class="card-footer bg-transparent">
                    <a href="{{route('home.detailMaklumat', $item->id_maklumat)}}" class="btn btn-sm btn-outline-success">Baca Selengkapnya</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Tab Per Kategori --}}
        @foreach ($kategori_maklumat as $row)
          <div class="tab-pane fade" id="{{ Str::slug($row->nama_kategori_maklumat) }}" role="tabpanel">
            <div class="row g-4">
              @foreach ($groupedMaklumats[$row->id_kategori_maklumat] ?? [] as $item)
                <div class="col-md-6">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                          <a href="{{route('home.detailMaklumat', $item->id_maklumat)}}" class="text-decoration-none text-dark">
                            {{ $item->judul_maklumat }}
                          </a>
                        </h5>
                        <span class="badge bg-light text-dark text-capitalize border">{{ $row->nama_kategori_maklumat }}</span>
                      </div>
                      <p class="card-subtitle mb-2 text-muted small">
                        <i class="bi bi-calendar-event me-1"></i> {{ $item->created_at ? $item->created_at->format('Y-m-d') : 'Tanggal tidak tersedia' }}
                      </p>
                      <p class="card-text">{!! substr($item->isi_maklumat, 0, 100) !!}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                      <a href="{{route('home.detailMaklumat', $item->id_maklumat)}}" class="btn btn-sm btn-outline-success">Baca Selengkapnya</a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
</main>
@endsection
