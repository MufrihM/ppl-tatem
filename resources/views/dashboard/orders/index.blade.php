@extends('dashboard.layout.main')

@section('container')
    @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
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
        <th scope="col">Nama</th>
        <th scope="col">Produk</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($order as $order)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $order->user->nama }}</td>
          <td>{{ $order->produk->nama }}</td>
          <td>{{ $order->jumlah }}</td>
          <td>
            <a href="/pesanan/{{ $order->pembayaran->id }}"> {{ $order->pembayaran->status }}</a>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection