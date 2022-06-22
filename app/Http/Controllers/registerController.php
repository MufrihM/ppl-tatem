<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register'
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|max:255|unique:users|email:dns',
            'password' => 'required|min:8|max:255',
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        $request->session()->flash('sukses', 'Registrasi berhasil');

        return redirect('/login');
    }
}
