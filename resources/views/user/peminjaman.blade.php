<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SS RENTAL</title>

  <!-- Styling tampilan dengan bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <!-- ICON LOCALHOST -->
  <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/logo_sim_min.png') }}">

  <!-- Styling buatan sendiri -->
  <link href="{!! asset('/css/style.css') !!}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background-color: #e3f8ff;
    }
  </style>
</head>

<body>
  @include('user.navbar')

  <section class="container bg-aliceblue py-5">
    <div class="card w-75 mx-auto mt-5">
      <div class="card-header text-center bg-dark rounded-0">
        <span class="fw-bold text-white">Data Transaksi</span>
      </div>
      <div class="card-body bg-light px-3">
        @if ($errors->any())
        <div id="notification" class="alert alert-danger" style="display: none;">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <script>
          // Tampilkan notifikasi saat halaman dimuat
          document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('notification').style.display = 'block';

            // Atur waktu penghilangan notifikasi setelah 3 detik
            setTimeout(function() {
              document.getElementById('notification').style.display = 'none';
            }, 5000);
          });
        </script>
        @endif
        <form action="/konfirmasiPeminjaman" method="POST">
          @csrf
          <div class="row">
            <div class="col-4 mx-auto text-center">
              <img src="{!! asset('/img/icon_user.jpg') !!}" alt="User Image" class="rounded-circle me-2" style="width: 150px; height: 150px;">
            </div>
            <div class="col-8 pt-2">
              <div class="mb-3 row">
                <label for="no_sim" class="col-sm-4 col-form-label">SIM ID</label>
                <div class="col-sm-7">
                  <input type="text" value="{{ Auth::user()->no_sim ? Auth::user()->no_sim : '' }}" class="form-control bg-secondary" id="no_sim" name="no_sim" readonly>
                  <input type="hidden" name="mobil_id" value="{{$mobil->id}}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-7">
                  <input type="text" name="nama" value="{{ Auth::user()->nama }}" class="form-control bg-secondary" id="name" readonly>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="tanggal_mulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-7">
                  <input type="date" name="tanggal_mulai" value="{{ Auth::user()->nama }}" class="form-control" id="tanggal_mulai">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="tanggal_selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
                <div class="col-sm-7">
                  <input type="date" name="tanggal_selesai" value="{{ Auth::user()->nama }}" class="form-control" id="tanggal_selesai">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="tanggal_selesai" class="col-sm-4 col-form-label">Detail Mobil</label>
                <div class="col-sm-7">
                  <ul>
                    <li>{{$mobil->merek}}</li>
                    <li>{{$mobil->model}}</li>
                    <li>{{$mobil->plat}}</li>
                    <li>{{ $mobil->harga_sewa ? 'Rp ' . number_format($mobil->harga_sewa, 0, ',', '.') : '-' }} /hari</li>
                  </ul>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="total_harga" class="col-sm-4 col-form-label">Total Harga</label>
                <div class="col-sm-7">
                  <input type="number" name="total_harga" class="form-control bg-secondary" id="total_harga" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="mx-auto text-center">
            <a href="{{url('/')}}" class="btn btn-danger rounded-0">Kembali</a>
            <button class="btn btn-success rounded-0" name="submit" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function hitungTotalHarga() {
        var tanggalMulai = new Date(document.getElementById('tanggal_mulai').value);
        var tanggalSelesai = new Date(document.getElementById('tanggal_selesai').value);

        var hargaSewaPerHari = '{{ $mobil->harga_sewa ?? 0 }}';

        if (!isNaN(tanggalMulai.getTime()) && !isNaN(tanggalSelesai.getTime()) && tanggalSelesai >= tanggalMulai) {
            var selisih = Math.floor((tanggalSelesai - tanggalMulai) / (1000 * 60 * 60 * 24)) + 1;
            var totalHarga = selisih * hargaSewaPerHari;

            document.getElementById('total_harga').value = totalHarga.toFixed(2);
        } else {
            document.getElementById('total_harga').value = '';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        hitungTotalHarga();
        document.getElementById('tanggal_mulai').addEventListener('change', hitungTotalHarga);
        document.getElementById('tanggal_selesai').addEventListener('change', hitungTotalHarga);
    });
</script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>