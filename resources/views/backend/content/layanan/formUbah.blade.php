@extends('backend/layout/main')
@section('content')
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Form Ubah Layanan</h1>

    <div class="card shadow mb-4">
      <div class="card-body">
        <form action="{{route('layanan.prosesUbah')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama Layanan</label>
            <input type="text" name="nama_layanan" value="{{$layanan->nama_layanan}}" class="form-control @error('nama_layanan') is-invalid @enderror">
            @error('nama_layanan')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Bagian Layanan</label>
            <select name="id_bagian_layanan" class = "form-control @error('id_bagian_layanan') is-invalid @enderror" id="">
              @foreach($bagian_layanan as $row)
                @php
                $selected = ($row->id_bagian_layanan == $layanan->id_bagian_layanan) ? "selected" : "";
                @endphp
                <option value="{{$row->id_bagian_layanan}}" {{$selected}}>{{$row->nama_bagian_layanan}}</option>
              @endforeach
            </select>
            @error('bagian_layanan')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Foto Layanan</label>
            <input type="file" name="gambar_layanan" class="form-control @error('gambar_layanan') is-invalid @enderror" accept="image/*" onchange="tampilkanPreview(this, 'tampilFoto')">
            @error('gambar_layanan')
            <span style="...">{{$message}}</span>
            @enderror
            <p></p>
            <img id="tampilFoto" onerror="this.onerror=null;this.src='https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'" src="{{asset('storage/' . $layanan->gambar_layanan)}}" alt="" width="15%">
          </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi Layanan</label>
            <textarea name="deskripsi_layanan" id="editor" class="form-control @error('deskripsi_layanan') is-invalid @enderror">{{$layanan->deskripsi_layanan}}</textarea>
            @error('deskripsi_layanan')
            <span style="...">{{$message}}</span>
            @enderror
          </div>

          <input type="hidden" name="id_layanan" value="{{$layanan->id_layanan}}">
          <button type="submit" class="btn btn-primary">Ubah</button>
          <a href="{{route('layanan.index')}}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
@endsection