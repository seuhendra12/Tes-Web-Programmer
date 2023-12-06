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
<div class="jumbotron jumbotron-fluid bg-aliceblue">
  <img src="{!! asset('/img/bg.png') !!}" alt="" class="background">
  <div class="position-absolute top-50 start-50 translate-middle" style="z-index: 1;">
    <div class="card" style="width: 1000px;">
      <div class="card-body">
        <h5 class="card-title text-center">Cari Data Mobil</h5>
        <form action="/" method="GET">
          <div class="row mt-4">
            <div class="col-4">
              <label>Merek Mobil</label>
              <input type="text" name="mobil" placeholder="exp: Toyota" class="form-control">
            </div>
            <div class="col-4">
              <label>Tanggal Mulai</label>
              <input type="date" name="tanggal_mulai" class="form-control">
            </div>
            <div class="col-4">
              <label>Tanggal Selesai</label>
              <input type="date" name="tanggal_akhir" class="form-control">
            </div>
          </div>
          <div class="mt-3 mx-auto text-center">
            <button type="submit" class="btn btn-primary rounded-0 px-5">Submit</button>
            <a href="/" class="btn btn-secondary rounded-0 px-5">Reset</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<section class="container-fluid bg-aliceblue py-5">
  <div class="row">
    @foreach($mobils as $item)
    <div class="col-4 mt-3">
      <div class="card">
        <div class="card-body">
          <div class="text-center mb-4 col-md-12">
            <img src="{{ asset('img_mobil/' . $item->gambar) }}" alt="Gambar Mobil" class="img rounded-0" style="width:100%">
          </div>
          <table>
            <tr>
              <td>Merek</td>
              <td>:</td>
              <td>{{$item->merek}}</td>
            </tr>
            <tr>
              <td>Model</td>
              <td>:</td>
              <td>{{$item->model}}</td>
            </tr>
            <tr>
              <td>Plat</td>
              <td>:</td>
              <td>{{$item->plat}}</td>
            </tr>
            <tr>
              <td>Harga Sewa</td>
              <td>:</td>
              <td>{{ $item->harga_sewa ? 'Rp ' . number_format($item->harga_sewa, 0, ',', '.') : '-' }} /hari</td>
            </tr>
          </table>
          <div class="text-center mt-3">
            <a href="/sewa/{{$item->id}}" class="btn btn-success rounded-0">Sewa</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="card-footer clearfix">
    {{ $mobils->links('pagination::bootstrap-5') }}
  </div>
</section>