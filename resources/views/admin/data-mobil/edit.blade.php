@extends('admin.layouts.index')
@section('title', 'Halaman Dashboard')
@section('header', 'Ubah Data Mobil')
@section('link')
<a href="{{ url('mobil') }}">Mobil</a>
@endsection
@section('breadcrumb', 'Ubah Mobil')
@section('content')

<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="{{ url('mobil/'.$mobil->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="container">
          <div class="mb-2">
            <label for="merek" class="form-label">Merek Mobil</label>
            <select class="form-select" required name="merek" aria-label="Default select example">
              <option selected>-- pilih merek mobil ---</option>
              <option value="Toyota">Toyota</option>
              <option value="Honda">Honda</option>
              <option value="BMW">BMW</option>
              <option value="Mercedes-Benz">Mercedes-Benz</option>
              <option value="Nissan">Nissan</option>
              <option value="Ford">Ford</option>
              <option value="Cavrolet">Cavrolet</option>
              <option value="Audi">Audi</option>
              <option value="Hyundai">Hyundai</option>
              <option value="Kia">Kia</option>
            </select>
            @error('merek')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-2">
            <label for="model" class="form-label">Model Mobil</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" value="{{ old('model', $mobil->model) }}" name="model" placeholder="Masukkan Model Mobil" autofocus required>
            @error('model')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-2">
            <label for="plat" class="form-label">Plat Mobil</label>
            <input type="text" class="form-control @error('plat') is-invalid @enderror" id="plat" value="{{ old('plat', $mobil->plat) }}" name="plat" placeholder="Masukkan Plat Mobil" autofocus required>
            @error('plat')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-2">
            <label for="harga_sewa" class="form-label">Harga Sewa</label>
            <input type="number" class="form-control @error('harga_sewa') is-invalid @enderror" id="harga_sewa" name="harga_sewa" placeholder="Masukkan Harga Sewa" value="{{ old('harga_sewa', $mobil->harga_sewa) }}">
            @error('harga_sewa')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-2">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" placeholder="Masukkan gambar" value="{{ old('gambar') }}">
            @error('gambar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            <img src="{{ asset('img_mobil/' . $mobil->gambar) }}" alt="Gambar Mobil" class="img rounded-0" style="width:50%;height:50%">
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