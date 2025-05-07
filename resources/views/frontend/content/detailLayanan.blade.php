@extends('frontend.layout.pagelayout')
@section('content')
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            
            <div class="col-lg-9">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$layanan->nama_layanan}}</h1>
                        <!-- Post meta content-->
                    </header>
                    
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{!! $layanan->deskripsi_layanan !!}</p>
                    </section>
                </article>
                <div class="d-flex align-items-center mt-lg-5 mb-4">
                    <!-- Preview image figure-->
                    <figure class="mb-4">
                        <img class="img-fluid rounded" src="{{ asset('storage/' . $layanan->gambar_layanan) }}" alt="{{ $layanan->nama_layanan }}">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection