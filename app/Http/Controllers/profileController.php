<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class profileController extends Controller
{
    public function index($id){
        return view('dashboard\profiles\index',[
            'title' => 'Profil',
            'user' => User::find($id)
        ]);
    }
    public function edit($id){
        return view('dashboard\profiles\ubahProfile',[
            'title' => 'Profile',
            'user' => User::find($id)
        ]);
    }
    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'alamat' => 'required',
            'nik' => 'required',
            'telepon' => 'required',
            'gambar' => 'required'
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-produk');
        }

        auth()->user()->update($validatedData);

        return redirect('/profile/{{ $user->id }}/edit')->with('sukses', 'Profil berhasil diubah');
    }
}
