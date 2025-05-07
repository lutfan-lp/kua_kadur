@extends('frontend.layout.pagelayout')
@section('content')
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-3">
                <div class="d-flex align-items-center mt-lg-5 mb-4">
                    <!-- Preview image figure-->
                    <figure class="mb-4">
                        <img class="img-fluid rounded" src="{{ asset('storage/' . $maklumats->gambar_maklumat) }}" alt="{{ $maklumats->judul_maklumat }}">
                    </figure>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$maklumats->judul_maklumat}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">{{$maklumats->created_at ? $maklumats->created_at->format('Y-M-d') : 'Tanggal tidak tersedia'}}</div>
                    </header>
                    
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{!! $maklumats->isi_maklumat !!}</p>
                    </section>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection