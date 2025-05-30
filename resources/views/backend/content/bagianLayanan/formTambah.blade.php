@extends('backend/layout/main')
@section('content')
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Form Tambah Bagian Layanan</h1>

    <div class="card shadow mb-4">
      <div class="card-body">
        <form action="{{route('bagianLayanan.prosesTambah')}}" method="post">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama Bagian Layanan</label>
            <input type="text" name="nama_bagian_layanan" value="{{old('nama_bagian_layanan')}}" class="form-control @error('nama_bagian_layanan') is-invalid @enderror">
            @error('nama_bagian_layanan')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Koordinator Bagian</label>
            <input type="text" name="koordinator_bagian" value="{{old('koordinator_bagian')}}" class="form-control @error('koordinator_bagian') is-invalid @enderror">
            @error('koordinator_bagian')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" value="{{old('kontak')}}" class="form-control @error('kontak') is-invalid @enderror" placeholder="nomor WA">
            @error('koordinator_bagian')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Tambah</button>
          <a href="{{route('bagianLayanan.index')}}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
@endsection