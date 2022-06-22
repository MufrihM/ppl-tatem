<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use App\Models\User;
use App\Models\Pembayaran;

class postController extends Controller
{
    public function laravel(){
        return view('welcome');
    }

    public function home(){
        return view('admin\home',[
            "title" => "Home",
            "produk" => Produk::all()
        ]);
    }

    public function pedagang(){
        return view('pedagang\homePedagang',[
            "title" => "Home",
            "produk" => Produk::all()
        ]);
    }

    public function tambahProduk(){
        return view('admin\tambahProduk',[
            "title" => "Tambah Produk"
        ]);
    }

    public function ubahProduk(){
        return view('admin\ubahProduk',[
            "title" => "Ubah Produk"
        ]);
    }

    public function reports(){
        return view('dashboard\reports\index',[
            'title' => 'Laporan Keuangan'
        ]);
    }

    public function profiles($id){
        return view('dashboard\profiles\index',[
            'title' => 'Profil',
            'user' => User::find($id)
        ]);
    }
    public function produk(Produk $produk){
        return view('admin\produk',[
        'title' => 'Produk',
            'produk' => $produk
        ]);
    }
    public function produkPedagang(Produk $produk){
        return view('pedagang\produk',[
            'title' => 'Produk',
            'produk' => $produk
        ]);
    }
    public function pesan(Produk $produk){
        return view('pedagang\pesan',[
            "title" => "Pesanan",
            'produk' => $produk
        ]);
    }
    public function pesanan(){
        return view('dashboard\orders\index',[
            "title" => "Pesanan",
            "order" => Order::all(),
            'pembayaran' => Pembayaran::all()
        ]);
    }
    public function order(Order $order){
        return view('pedagang.pesanan.update',[
            "title" => "Pesanan",
            "order" => $order
        ]);
    }
    public function konfirmasi(Order $order){
        return view('admin\konfirmasi',[
            "title" => "Pesanan",
            "order" => $order
        ]);
    }

}
