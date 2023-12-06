@extends('admin.layouts.index')
@section('title', 'Halaman Dashboard')
@section('header', 'Ubah Data Status')
@section('link')
<a href="{{ url('peminjaman') }}">Status</a>
@endsection
@section('breadcrumb', 'Ubah Status')
@section('content')

<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="/peminjaman/{{$peminjaman->id}}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="container">
          <div class="mb-2">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" required name="status" aria-label="Default select example">
              <option value="1">Disewa</option>
              <option value="2">Dikembalikan</option>
            </select>
            @error('status')
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