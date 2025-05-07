@extends('backend/layout/main')
@section('content')
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Form Tambah Maklumat</h1>

    <div class="card shadow mb-4">
      <div class="card-body">
        <form action="{{route('maklumat.prosesTambah')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Judul Maklumat</label>
            <input type="text" name="judul_maklumat" value="{{old('judul_maklumat')}}" class="form-control @error('judul_maklumat') is-invalid @enderror">
            @error('judul_maklumat')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Kategori Maklumat</label>
            <select name="id_kategori_maklumat" class = "form-control @error('id_kategori_maklumat') is-invalid @enderror" id="">
              @foreach($kategori_maklumat as $row)
                <option value="{{$row->id_kategori_maklumat}}">{{$row->nama_kategori_maklumat}}</option>
              @endforeach
            </select>
            @error('judul_maklumat')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Foto Maklumat</label>
            <input type="file" name="gambar_maklumat" class="form-control @error('gambar_maklumat') is-invalid @enderror" accept="image/*" onchange="tampilkanPreview(this, 'tampilFoto')">
            @error('gambar_maklumat')
            <span style="...">{{$message}}</span>
            @enderror
            <p></p>
            <img id="tampilFoto" onerror="this.onerror=null;this.src='https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'" src="" alt="" width="15%">
          </div>

          <div class="mb-3">
            <label class="form-label">Isi Maklumat</label>
            <textarea name="isi_maklumat" id="editor" class="form-control @error('isi_maklumat') is-invalid @enderror">{{old('isi_maklumat')}}</textarea>
            @error('isi_maklumat')
            <span style="...">{{$message}}</span>
            @enderror
          </div>


          <button type="submit" class="btn btn-primary">Tambah</button>
          <a href="{{route('maklumat.index')}}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
@endsection