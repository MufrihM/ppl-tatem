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
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Pesanan</h1>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Produk</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Aksi</th>
        <th scope="col">Pembayaran</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach($order as $order)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $order->produk->nama }}</td>
                <td>{{ $order->jumlah }}</td>
                <td>
                  <a href="/order/{{ $order->id }}" class="col-auto btn text-light btn-warning"><ion-icon name="pencil-outline"></ion-icon></a>
                  <form action="/order/{{ $order->id }}/delete" method="post" class="col-auto d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0 text-light" onclick="return confirm('Apakah anda yakin?')"><ion-icon name="trash-outline"></ion-icon></button>
                  </form>
                </td>
                <td>
                  <a href="/order/{{ $order->id }}/pembayaran">Upload</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection