@extends('auth.layouts.index')
@section('content')
<div class="card card-outline card-success">
  <div class="text-center mt-2 mb-3">
    <img src="{{ asset('img/logo.png') }}" class="img-logo" width="140px" height="130px" alt="">
  </div>

  <div class="text-center">
    <a href="{{ url('/login') }}" class="text-login h3"><b>Halaman Login</b></a>
  </div>
  <div class="card-body">
    <form action="/loginProses" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" name="no_sim" class="form-control @error('no_sim') is-invalid @enderror" value="{{ old('no_sim') }}" placeholder="Masukan Nomor SIM">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
        @error('no_sim')
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
        <button type="submit" class="btn btn-success">Login</button>
        <a href="/register" class="btn btn-info">Register</a>
      </div>
    </form>
  </div>
</div>
@endsection