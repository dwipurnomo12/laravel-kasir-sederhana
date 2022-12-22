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

   
        <form action="/kasir" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label @error('name') is-invalid @enderror">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name') }}">
                  @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              <div class="mb-3">
                <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                <input type="text" class="form-control" id="email" name="email" required autofocus value="{{ old('email') }}">
                  @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              <div class="mb-3">
                <label for="username" class="form-label @error('username') is-invalid @enderror">Username</label>
                <input type="text" class="form-control" id="username" name="username" required autofocus value="{{ old('username') }}">
                  @error('username')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              <div class="row">
                <div class="col">
                    <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                </div>
              </div>

              <div class="mb-3">
                    <label for="level" class="form-label">Tambah Sebagai</label>
                    <select class="form-select" aria-label="Default select example" name="level" id="level">
                        <option selected value="3">Kasir</option>
                    </select>
              </div>


              <div class="mb-3 my-4 float-end">
                <button type="submit" class="btn btn-primary">Tambah Kasir</button>
              </div>
        </form>
    </div>
</div>

@endsection