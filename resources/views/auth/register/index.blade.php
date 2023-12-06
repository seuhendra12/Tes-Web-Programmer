@extends('auth.layouts.index')
@section('title', 'Halaman Register')
@section('content')
<div class="card card-outline card-success">
  <div class="text-center mt-2 mb-3">
    <img src="{{ asset('img/logo.png') }}" class="img-logo" width="140px" height="130px" alt="">
  </div>

  <div class="text-center">
    <a href="{{ url('/register') }}" class="text-login h3"><b>Halaman Register</b></a>
  </div>
  <div class="card-body">
    <form action="/registerProses" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" name="no_sim" class="form-control @error('no_sim') is-invalid @enderror" value="{{ old('no_sim') }}" placeholder="Masukan Nomor SIM">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-solid fa-address-card"></span>
          </div>
        </div>
        @error('no_sim')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukan Nama Lengkap">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-solid fa-file-signature"></span>
          </div>
        </div>
        @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}" placeholder="Masukan Nomor Telepon">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-solid fa-phone"></span>
          </div>
        </div>
        @error('no_telp')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="input-group mb-3">
        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat"></textarea>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-solid fa-address-book"></span>
          </div>
        </div>
        @error('alamat')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mx-auto text-center">
        <button type="submit" class="btn btn-success">Register</button>
        <a href="/login" class="btn btn-info">Login</a>
      </div>
    </form>
  </div>
</div>
@endsection