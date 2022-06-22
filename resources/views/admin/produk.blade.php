@extends('dashboard.layout.main')

@section('container')
    <a href="/home" class="btn mt-2"><ion-icon name="arrow-back-outline"></ion-icon></a>
    <div class="row">
        <div class="mt-3 col-lg-10 align-self-start">
            <div class="card mb-3" style="  height: 550px; background-color: #CAF4A9;">
                <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid mx-0" style="height: 400px">
                <div class="card-body">
                    <h4>{{ $produk->nama }}</h4>
                    <p class="card-text">{{ $produk->harga }}</p>
                    @can('pedagang')
                    <a href="/pedagang/{{ $produk->slug }}/pesan" class="btn mb-2 col-auto text-light bg-success">Pesan</a>
                    @endcan
                    @can('admin')
                        <div class="row justify-content-end">
                            <a href="/home/produk/{{ $produk->id }}/edit" class="col-auto btn text-light btn-warning"><ion-icon name="pencil-outline"></ion-icon>Ubah</a>
                            <form action="/home/produk/{{ $produk->id }}" method="post" class="col-auto d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0 text-light" onclick="return confirm('Apakah anda yakin?')"><ion-icon name="trash-outline"></ion-icon>Hapus</button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection