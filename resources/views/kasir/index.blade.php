@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-body">
        <h1>Semua Data Kasir</h1>
     
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a class="btn btn-primary mb-4" href="/kasir/create" role="button"><i class="menu-icon tf-icons bx 
            bx-plus-circle"></i>Tambah Kasir</a>
        <table id="table_id" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $kasir)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kasir->name }}</td>
                    <td>{{ $kasir->username }}</td>
                    <td>{{ $kasir->password}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm mb-1" href="/kasir/{{ $kasir->id }}/edit" role="button"><i class="menu-icon tf-icons bx bx-edit-alt"></i></a>

                        <form action="/kasir/{{ $kasir->id }}" method="POST" class="d-inline">
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