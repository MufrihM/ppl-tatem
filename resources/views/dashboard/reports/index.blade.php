@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Laporan Keuangan</h1>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Produk</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Harga</th>
        <th scope="col">Pemasukan</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @php 
          $total = 0;
      @endphp
      @foreach($order as $order)
        @php
          $total += $order->produk->harga*$order->jumlah;
        @endphp
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $order->produk->nama }}</td>
          <td>{{ $order->jumlah }}</td>
          <td>{{ $order->produk->harga }}</td>
          <td>{{ $order->produk->harga*$order->jumlah }}</td>
        </tr>
        @endforeach
        <tr>
          <th></th>
          <td></td>
          <td>Total pemasukan</td>
          <td></td>
          <td>{{ $total }}</td>
        </tr>
    </tbody>
  </table>
@endsection