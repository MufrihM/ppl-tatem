@extends('dashboard.layout.main')

@section('container')
    <a href="/pedagang" class="btn mt-2"><ion-icon name="arrow-back-outline"></ion-icon></a>
    <div class="row">
        <div class="mt-3 col-lg-10 align-self-start">
            <div class="card mb-3" style="  height: 500px; background-color: #CAF4A9;">
                <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid mx-0" style="height: 400px">
                <div class="card-body">
                    <h4>{{ $produk->nama }}</h4>
                    <div class="row justify-content-between">
                        <p class="card-text col-auto">{{ $produk->harga }}</p>
                        <a href="/pedagang/{{ $produk->slug }}/pesan" class="btn mb-2 mx-2 col-auto text-light bg-success">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection