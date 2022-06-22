<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pedagang.pesanan.read',[
            "title" => "Pesanan",
            "order" => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'jumlah' => 'required',
        ]);

        $validatedData['produk_id'] = $produk->id;
        $validatedData['user_id'] = auth()->user()->id;

        Order::create($validatedData);

        return redirect('/pedagang')->with('sukses', 'Berhasil membuat pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // return view('pedagang.pesanan.read',[
        //     'title' => 'Pesanan',
        //     'order' => $order
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'jumlah' => 'required'
        ]);

        $validatedData['produk_id'] = $order->produk->id;

        Order::where('id', $order->id)->update($validatedData);

        return redirect('/order')->with('sukses', 'Pesanan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect('/order')->with('berhasil', 'Pesanan telah dihapus');
    }
}
