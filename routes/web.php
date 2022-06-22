<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\postController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\profileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [postController::class, 'laravel']);

Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [loginController::class, 'authenticate']);

Route::get('/register', [registerController::class, 'index'])->middleware('guest');

Route::post('/register/post', [registerController::class, 'store']);

Route::get('/home', [postController::class,'home'])->middleware('auth');

Route::get('/tambahProduk', [postController::class,'tambahProduk']);

Route::get('/ubahProduk', [postController::class,'ubahProduk']);

Route::get('/home/produk/checkSlug', [DashboardProdukController::class, 'checkSlug']);

Route::resource('home/produk',DashboardProdukController::class);

Route::get('/konfirmasi', [postController::class, 'konfirmasi']);

// Route::post('home/produk/{{ $produk->slug }}',DashboardProdukController::class, 'destroy');

Route::get('/home/{produk:slug}', [postController::class,'produk']);

Route::get('/pesanan/', [postController::class, 'pesanan'])->middleware('admin');

Route::get('/pesanan/{pembayaran:id}', [pembayaranController::class, 'edit']);

Route::put('/pesanan/{pembayaran:id}/konfirmasi', [pembayaranController::class, 'update']);

Route::get('/reports', [reportController::class, 'show'])->middleware('admin');

Route::get('/pedagang', [postController::class,'pedagang']);

Route::get('/pedagang/{produk:slug}', [postController::class,'produkPedagang']);

Route::get('/pedagang/{produk:slug}/pesan', [postController::class, 'pesan']);

Route::post('/pedagang/{produk:slug}/pesan/store',[orderController::class, 'store']);

Route::get('/order', [orderController::class, 'index']);

Route::get('/order/{order:id}', [postController::class,'order']);

Route::put('/order/{order:id}/update', [orderController::class,'update']);

Route::delete('/order/{order:id}/delete', [orderController::class,'destroy']);

Route::get('/order/{order:id}/pembayaran', [pembayaranController::class, 'create']);

Route::post('/order/{order:id}/pembayaran/store', [pembayaranController::class, 'store']);

Route::get('/profile/{id}', [profileController::class, 'index']);

Route::get('/profile/{id}/edit', [profileController::class, 'edit']);

Route::put('/profile/{id}/edit/update', [profileController::class, 'update']);

Route::post('/logout', [loginController::class, 'logout']);