<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Order;
use Illuminate\Http\Request;

class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        return view('pedagang\pembayaran\index',[
            'title' => 'Pembayaran',
            'order' => $order
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'gambar' => 'image|file|max:1024'
        ]);
        
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-produk');
        }

        $validatedData['order_id'] = $order->id;
        $validatedData['status'] = 'Tidak Terkonfirmasi';

        Pembayaran::create($validatedData);
        return redirect('/order')->with('sukses', 'Bukti pembayaran berhasil diupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('dashboard.orders.konfirmasi',[
            'title' => 'Pembayaran',
            'pembayaran' => $pembayaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);

        $validatedData['gambar'] = $pembayaran->gambar;

        Pembayaran::where('id', $pembayaran->id)->update($validatedData);
        return redirect('/pesanan')->with('sukses', 'Bukti pembayaran telah dikonfirmasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
