<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

class DashboardProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.orders.index',[
            'title' => 'Pesanan'
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
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
            'harga' => 'required|max:255',
            'keterangan' => 'nullable',
            'gambar' => 'image|file|max:1024'
        ]);
        
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-produk');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Produk::create($validatedData);
        // DB::table('produks')->insert($validatedData);

        // $request->session()->flash('berhasil', 'Produk berhasil ditambahkan');

        // return redirect('/home');
        return redirect('/home')->with('sukses', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin.ubahProduk',[
            'title' => 'Pesanan',
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
            'harga' => 'required|max:255',
            'keterangan' => 'nullable',
            'gambar' => 'image|file|max:1024|required'
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-produk');
        }

        // $validatedData['user_id'] = auth()->user()->id;

        Produk::where('id', $produk->id)->update($validatedData);

        return redirect('/home')->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect('/home')->with('berhasil', 'Produk telah dihapus');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Produk::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
