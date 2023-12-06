@extends('admin.layouts.index')
@section('title', 'Halaman Dashboard')
@section('header', 'Data Peminjaman')
@section('breadcrumb', 'Mobil')
@section('content')
<div class="container">

  @if(Session::has('success'))
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center w-50 mx-auto">
        <div class="modal-body text-center">
          <div class="mb-5">
            <img alt="Logo" src="{!! asset('/img/success.png') !!}" style="width: 50%;" />
            <H5 class="mt-1 fw-bold">SUKSES</H5>
          </div class="mb-2">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var myModal = new bootstrap.Modal(document.getElementById('successModal'));
      myModal.show();

      // Menghilangkan modal setelah 3 detik
      setTimeout(function() {
        myModal.hide();
      }, 1000);
    });
  </script>
  @endif

  <div class="card card-outline card-success mt-3">
    <div class="card-header">
      <form action="/mobil" method="GET">
        <input type="text" name="search" id="liveSearch" class="form-control w-25 float-left" placeholder="Search..." onchange="this.form.submit()">
      </form>
      <a href="/mobil" class=" ml-2 btn btn-secondary" title="reset"> <i class="fas fa-sync-alt" title="reset"></i></a>
    </div>

    <div class="card-body">
      <div id="example_wrapper">
        <div class="table-responsive table-bordered">
          <table id="example1" class="table  table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Merek Mobil</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Dikembalikan</th>
                <th>Harga Sewa</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($peminjamans as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->user->nama ?? '-'}}</td>
                <td>{{$item->mobil->merek}} | {{$item->mobil->model}} | {{$item->mobil->plat}}</td>
                <td>{{$item->tanggal_mulai ?? '-'}}</td>
                <td>{{$item->tanggal_selesai ?? '-'}}</td>
                <td>{{$item->total_harga ? 'Rp ' . number_format($item->total_harga, 0, ',', '.') : '-' }}</td>
                <td>
                  <a href="mobil/{{$item->id}}/edit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                  <form action="{{ url('mobil/'.$item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="card-footer clearfix">
      {{ $peminjamans->links('pagination::bootstrap-5') }}
    </div>
  </div>
</div>
@endsection