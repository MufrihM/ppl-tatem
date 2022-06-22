@extends('dashboard.layout.main')

@section('container')
    <div class="container-fluid" >
        <a href="/home" class="btn mt-2"><ion-icon name="arrow-back-outline"></ion-icon></a>
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-3" style="background-color: #EEF1E0; height: 550px;">
                <form method="post" action="/home/produk/{{ $produk->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <h4 class="pt-3 px-3">Masukkan Produk</h4>
                    <div class="mb-2 pt-2 px-3">
                        <label class="form-label" for="nama">Nama Produk</label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" id="nama" name='nama'placeholder="Masukkan nama produk" value="{{ old('nama', $produk->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 px-3">
                        <label class="form-label" for="slug">Slug</label>
                        <input class="form-control" type="text" id="slug" name='slug' value="{{ old('slug', $produk->slug) }}" readonly>
                    </div>
                    <div class="mb-2 px-3">
                        <label class="form-label" for="harga">Harga Produk</label>
                        <input class="form-control @error('harga') is-invalid @enderror" type="text" id="harga" name="harga" placeholder="Masukkan harga produk" value="{{ old('harga', $produk->harga) }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 px-3">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="Masukkan keterangan produk">
                    </div>
                    <div class="mb-2 px-3">
                        <label for="gambar" class="form-label @error('gambar') is-invalid @enderror">Gambar Produk</label>
                        <input class="form-control" type="file" id="gambar" name="gambar" value="{{ old('gambar', $produk->gambar) }}">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center pt-4 form-group">
                        <button type="submit" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #448D09;" name="submit">Simpan</button>
                        <a href="/home" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #DD2902;" name="batal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function(){
        fetch('/home/produk/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })
</script>
@endsection