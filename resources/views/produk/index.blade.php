@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-body">
        <h1>Semua Produk</h1>
     
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table id="table_id" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk_table as $produk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk->kode_barang }}</td>
                    <td>{{ $produk->nama_barang }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>{{ $produk->harga_beli }}</td>
                    <td>{{ $produk->harga_jual }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm mb-1" href="/produk/{{ $produk->id }}/edit" role="button"><i class="menu-icon tf-icons bx bx-edit-alt"></i></a>

                        <form action="/produk/{{ $produk->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Yakin Ingin Menghapus Post ?')"><i class="menu-icon tf-icons bx bx-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection