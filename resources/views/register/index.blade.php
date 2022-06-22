@extends('dashboard.layout.login')

@section('container')
<main class="form-signin w-100 m-auto rounded-5">
    <form action="/register/post" method="post">
        @csrf
        <h1 class="h3 mb-4 fw-normal">Register</h1>
        <div class="form-floating">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}">
            <label for="nama">Nama Lengkap</label>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat')}}">
            <label for="alamat">Alamat</label>
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <a href="/login">Have an account?</a>
        <button class="w-100 btn btn-lg mt-3" style="background-color: lightgreen;" type="submit">Register</button>
    </form>
    </main>
@endsection