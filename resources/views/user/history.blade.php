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
    <div class="card w-75 mx-auto bg-light mt-5">
      <div class="card-header text-center bg-green rounded-0">
        <span class="fw-bold text-white">Histori Transaksi</span>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="table-container">
            <table class="table table-bordered table-striped text-center">
              <thead class="fw-bold">
                <tr>
                  <td>No</td>
                  <td>Merek</td>
                  <td>Tanggal Mulai</td>
                  <td>Tanggal Selesai</td>
                  <td>Total Sewa</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                @forelse ($historis as $item)
                <tr>
                  <td class="align-top">{{$loop->iteration}}</td>
                  <td class="align-top">{{$item->mobil->merek}}</td>
                  <td class="align-top">{{$item->tanggal_mulai}}</td>
                  <td class="align-top">{{$item->tanggal_selesai}}</td>
                  <td class="align-top">{{ $item->total_harga ? 'Rp ' . number_format($item->total_harga, 0, ',', '.') : '-' }}</td>
                  <td>
                    @if($item->status == 1)
                    <div class="badge bg-success">Disewa</div>
                    @else
                    <div class="badge bg-danger">Dikembalikan</div>
                    @endif
                  </td>
                </tr>
                @empty
                <td colspan="4" class="text-center bg-danger">-- Data Tidak Ada --</td>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="mx-auto text-center mb-3">
          <a href="{{url('/')}}" class="btn btn-danger rounded-0">Kembali</a>
        </div>
      </div>
    </div>
  </section>
</body>

</html>