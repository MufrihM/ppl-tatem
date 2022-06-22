@extends('dashboard.layout.coba')

@section('container')
    @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
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
                            <a href="/pedagang/{{ $produk->slug }}">{{ $produk->nama }}</a>
                        </h5>
                        <p class="card-text">{{ $produk->harga }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection