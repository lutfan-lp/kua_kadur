@extends('backend/layout/main')
@section('content')
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Form Ubah Profile</h1>

    <div class="card shadow mb-4">
      <div class="card-body">
        <form action="{{route('profile.prosesUbah')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Judul Profile</label>
            <input type="text" name="judul_profile" value="{{$profile->judul_profile}}" class="form-control @error('judul_profile') is-invalid @enderror">
            @error('judul_profile')
            <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Foto Profile</label>
            <input type="file" name="gambar_profile" class="form-control @error('gambar_profile') is-invalid @enderror" accept="image/*" onchange="tampilkanPreview(this, 'tampilFoto')">
            @error('gambar_profile')
            <span style="...">{{$message}}</span>
            @enderror
            <p></p>
            <img id="tampilFoto" onerror="this.onerror=null;this.src='https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'" src="{{asset('storage/' . $profile->gambar_profile)}}" alt="" width="15%">
          </div>

          <div class="mb-3">
            <label class="form-label">Isi Profile</label>
            <textarea name="isi_profile" id="editor" class="form-control @error('isi_profile') is-invalid @enderror">{{$profile->isi_profile}}</textarea>
            @error('isi_profile')
            <span style="...">{{$message}}</span>
            @enderror
          </div>

          <input type="hidden" name="id_profile" value="{{$profile->id_profile}}">
          <button type="submit" class="btn btn-primary">Ubah</button>
          <a href="{{route('profile.index')}}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
@endsection