@extends('dashboard.layout.main')

@section('container')
    <div class="container-fluid">
        <a href="/order" class="btn mt-2"><ion-icon name="arrow-back-outline"></ion-icon></a>
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-3" style="background-color: #EEF1E0; height: 350px;">
                <form method="post" action="/order/{{ $order->id }}/update">
                    @method('put')
                    @csrf
                    <h4 class="pt-3 px-3">Pesanan</h4>
                    <div class="mb-2 px-3">
                        <label class="form-label" for="jumlah">Jumlah Produk</label>
                        <input class="form-control @error('jumlah') is-invalid @enderror" type="text" id="jumlah" name="jumlah" placeholder="Masukkan jumlah produk" value="{{ old('jumlah', $order->jumlah) }}">
                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center pt-4 form-group">
                        <button type="submit" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #448D09;" name="submit">Ubah</button>
                        <a href="/order" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #DD2902;" name="batal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection