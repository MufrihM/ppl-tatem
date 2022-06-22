@extends('dashboard.layout.main')

@section('container')
    @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        @foreach($produk as $produk)
            <div class="my-3 col-sm-12 col-md-6 col-lg-4 col-xl-3 rounded-5">
                <div class="card ms-2 mb-3" style=" height: 300px; background-color: #CAF4A9;">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" height="200px" alt="{{ $produk->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/home/{{ $produk->slug }}"> {{ $produk->nama }}</a>
                        </h5>
                        <p class="card-text">{{ $produk->harga }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @can('admin')
    <div class="row justify-content-center">
        <a href="/tambahProduk" class="btn mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 btn text-light" style="background-color: #448D09;"><ion-icon name="add-outline"></ion-icon>Tambahkan Produk</a>
    </div>
    @endcan
@endsection