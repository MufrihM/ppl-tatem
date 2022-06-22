@extends('dashboard.layout.main')

@section('container')
    @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid" >
        <a href="{{ asset('/profile/' . Auth::user()->id) }}" class="btn mt-2"><ion-icon name="arrow-back-outline"></ion-icon></a>
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-3" style="background-color: #EEF1E0; height: 600px;">
                <form method="post" action="{{ asset('/profile/' . Auth::user()->id . '/edit/update') }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <h4 class="pt-3 px-3">Ubah Profile</h4>
                    <div class="mb-2 pt-2 px-3">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" id="nama" name='nama'placeholder="Masukkan nama lengkap anda" value="{{ old('nama', Auth::user()->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 px-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" placeholder="Masukkan email panda" value="{{ old('email', Auth::user()->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 px-3">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" type="text" id="alamat" name="alamat" placeholder="Masukkan alamat anda" value="{{ old('alamat', Auth::user()->alamat) }}">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 px-3">
                        <label class="form-label" for="nik">NIK</label>
                        <input class="form-control @error('nik') is-invalid @enderror" type="text" id="nik" name="nik" placeholder="Masukkan nik anda" value="{{ old('nik', Auth::user()->nik) }}">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 px-3">
                        <label class="form-label" for="telepon">Nomor Telepon</label>
                        <input class="form-control @error('telepon') is-invalid @enderror" type="text" id="telepon" name="telepon" placeholder="Masukkan nomor telepon anda" value="{{ old('telepon', Auth::user()->telepon) }}">
                        @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 px-3">
                        <label for="gambar" class="form-label @error('gambar') is-invalid @enderror">Gambar Profil</label>
                        <input class="form-control" type="file" id="gambar" name="gambar" value="{{ old('gambar', Auth::user()->gambar) }}">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center pt-4 form-group">
                        <button type="submit" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #448D09;" name="submit">Simpan</button>
                        <a href="{{ asset('/profile/' . Auth::user()->id) }}" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #DD2902;" name="batal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection