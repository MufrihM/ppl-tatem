@extends('dashboard.layout.main')

@section('container')
    <div class="container-fluid">
        <a href="/order" class="btn mt-2"><ion-icon name="arrow-back-outline"></ion-icon></a>
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-3" style="background-color: #EEF1E0; height: 250px;">
                <form method="post" action="/order/{{ $order->id }}/pembayaran/store" enctype="multipart/form-data">
                    @csrf
                    <h4 class="pt-3 px-3">Bukti Pembayaran</h4>
                    <div class="mb-2 px-3 pt-2">
                        <label for="gambar" class="form-label @error('gambar') is-invalid @enderror">Upload Bukti</label>
                        <input class="form-control" type="file" id="gambar" name="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- <div class="form-check pt-1 px-5 ">
                        <input class="form-check-input" type="checkbox" value="Terkonfirmasi" id="status" name="status">
                        <label class="form-check-label @error('status') is-invalid @enderror" for="status">
                            Konfirmasi
                        </label>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> -->
                    <div class="row justify-content-center pt-4 form-group">
                        <button type="submit" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #448D09;" name="submit">Simpan</button>
                        <a href="/order" class="mb-2 mx-2 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 btn text-light" style="background-color: #DD2902;" name="batal">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection