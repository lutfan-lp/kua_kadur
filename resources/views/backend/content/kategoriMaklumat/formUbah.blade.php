@extends('backend/layout/main')
@section('content')
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Form Ubah Kategori Maklumat</h1>

    <div class="card shadow mb-4">
      <div class="card-body">
        <form action="{{route('kategoriMaklumat.prosesUbah')}}" method="post">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori_maklumat" value="{{$kategori_maklumat->nama_kategori_maklumat}}" class="form-control @error('nama_kategori_maklumat') is-invalid @enderror">
            @error('nama_kategori_maklumat')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>
          <input type="hidden" name="id_kategori_maklumat" value="{{$kategori_maklumat->id_kategori_maklumat}}">
          <button type="submit" class="btn btn-primary">Ubah</button>
          <a href="{{route('kategoriMaklumat.index')}}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
@endsection