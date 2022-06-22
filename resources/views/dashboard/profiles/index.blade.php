@extends('dashboard.layout.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3>Profil</h3>
  </div>
  <div class="container mb-3" style="background-color: #EEF1E0; height: 500px;">
    <div class="row">
      <div class="col-lg-4 pt-4">
        <img src="{{ asset('storage/' . $user->gambar) }}" style=" height: 200px; clip-path: circle();"alt="{{ $user->nama }}">
      </div>
      <div class="col-lg-8">
        <div class="mb-2 pt-4 px-3">
          <label class="form-label" for="nama">Nama Lengkap</label>
          <input class="form-control" type="text" id="nama" name='nama' value="{{ old('nama', $user->nama) }}" readonly>
        </div>
        <div class="mb-2 pt-2 px-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control" type="text" id="email" name='email' value="{{ old('email', $user->email) }}" readonly>
        </div>
        <div class="mb-2 pt-2 px-3">
          <label class="form-label" for="alamat">Alamat</label>
          <input class="form-control" type="text" id="alamat" name='alamat' value="{{ old('alamat', $user->alamat) }}" readonly>
        </div>
        <div class="mb-2 pt-2 px-3">
          <label class="form-label" for="nik">NIK</label>
          <input class="form-control" type="text" id="nik" name='nik' value="{{ old('nik', $user->nik) }}" readonly>
        </div>
        <div class="mb-2 pt-2 px-3">
          <label class="form-label" for="telepon">Nomor Telepon</label>
          <input class="form-control" type="text" id="telepon" name='telepon' value="{{ old('telepon', $user->telepon) }}" readonly>
        </div>
        <div class="mb-2 pt-2 px-3">
          <a href="{{ asset('/profile/' . Auth::user()->id . '/edit') }}" class="btn text-light btn-warning"><ion-icon name="pencil-outline"></ion-icon>Ubah</a>
        </div>
      </div>
  </div>
  </div>
@endsection