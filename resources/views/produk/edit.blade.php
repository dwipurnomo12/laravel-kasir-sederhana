@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-body">
        <h1>Perbarui Produk</h1>

        <form action="/produk/{{ $produk->id }}" method="POST">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="kode_barang" class="form-label @error('kode_barang') is-invalid @enderror">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" required autofocus value="{{ old('kode_barang', $produk->kode_barang) }}">
                  @error('kode_barang')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              <div class="mb-3">
                <label for="nama_barang" class="form-label @error('nama_barang') is-invalid @enderror">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required autofocus value="{{ old('nama_barang', $produk->nama_barang) }}">
                  @error('nama_barang')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              <div class="mb-3">
                <label for="stok" class="form-label @error('stok') is-invalid @enderror">Jumlah Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required autofocus value="{{ old('stok', $produk->stok) }}">
                  @error('stok')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              <div class="row">
                <div class="col">
                    <label for="harga_beli" class="form-label @error('harga_beli') is-invalid @enderror">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $produk->harga_beli) }}">
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                </div>
                <div class="col">
                    <label for="harga_jual" class="form-label @error('harga_jual') is-invalid @enderror">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $produk->harga_jual) }}">
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                </div>
              </div>

              <div class="mb-3 my-4 float-end">
                <button type="submit" class="btn btn-primary">Edit Barang</button>
              </div>
        </form>
        
    </div>
</div>


@endsection