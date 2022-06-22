@extends('dashboard.layout.main')

@section('container')
    <div class="container-fluid">
        <a href="/pedagang" class="btn mt-2"><ion-icon name="arrow-back-outline"></ion-icon></a>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-10 mb-3" style="background-color: #EEF1E0; height: 530px;">
                <h4 class="pt-3 pb-2 px-3">Konfirmasi Bukti Pembayaran</h4>
                <img src="{{ asset('storage/' . $pembayaran->gambar) }}" class="px-3 col-sm-10 col-md-10 col-lg-10 col-xl-10" alt="">
                <form method="post" action="/pesanan/{{ $pembayaran->id }}/konfirmasi">
                    @method('put')
                    @csrf
                    <div class="form-check pt-2 px-5 ">
                        <input class="form-check-input" type="checkbox" value="Terkonfirmasi" id="status" name="status">
                        <label class="form-check-label @error('status') is-invalid @enderror" for="status">
                            Konfirmasi
                        </label>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center pt-4 form-group">
                        <button type="submit" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #448D09;" name="submit">Simpan</button>
                        <a href="/pedagang" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #DD2902;" name="batal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection