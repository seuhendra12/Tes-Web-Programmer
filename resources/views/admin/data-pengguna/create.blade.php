@extends('admin.layouts.index')
@section('title', 'Halaman Dashboard')
@section('header', 'Tambah Data Pengguna')
@section('link')
<a href="{{ url('pengguna') }}">Pengguna</a>
@endsection
@section('breadcrumb', 'Tambah Pengguna')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('pengguna') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="container">
                    <div class="mb-2">
                        <label for="no_sim" class="form-label">No SIM</label>
                        <input type="text" class="form-control @error('no_sim') is-invalid @enderror" id="no_sim" value="{{ old('no_sim') }}" name="no_sim" autofocus required placeholder="Masukan Nomor SIM">
                        @error('no_sim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}" name="nama" placeholder="Masukkan Nama Lengkap Anda" autofocus required>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" value="{{ old('no_telp') }}" name="no_telp" placeholder="Masukkan Nomor Telepon" autofocus required>
                        @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-secondary mr-2">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection