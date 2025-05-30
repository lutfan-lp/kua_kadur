@extends('backend/layout/main')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="h3 mb-2 text-gray-800">List Layanan</h1>
      </div>
      <div class="col-lg-6 text-right">
        <a href="{{route('layanan.tambah')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"> Tambah</i></a>
      </div>
    </div>

    @if(session()->has('pesan'))
      <div class="alert alert-{{session()->get('pesan')[0]}}">
        {{session()->get('pesan')[1]}}
      </div>
    @endif

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Gambar Layanan</th>
                <th>Nama Layanan</th>
                <th>Bagian Layanan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach($layanan as $row)
                <tr>
                  <td>{{$no++}}</td>
                  <td><img src="{{ asset('storage/' . $row->gambar_layanan) }}" width="50px"></td>
                  <td>{{$row->nama_layanan}}</td>
                  <td>{{$row->bagian_layanan->nama_bagian_layanan}}</td>
                  <td>
                    <a href="{{route('layanan.ubah', $row->id_layanan)}}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> Ubah</a>
                    <a href="{{route('layanan.hapus', $row->id_layanan)}}" onclick="return confirm('Anda Yakin?')" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          {{ $layanan->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection