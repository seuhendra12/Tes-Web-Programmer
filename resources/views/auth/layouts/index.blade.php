<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
  <style>
    body {
      background-image: url("{!! asset('img/background.png') !!}");
      background-size: cover;
      background-position: center;
      height: 100vh;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="container">
      @yield('content')
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{ asset('AdminLTE') }}/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  {{-- <script src="{{ asset('AdminLTE') }}/dist/js/demo.js"></script> --}}
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('AdminLTE') }}/dist/js/pages/dashboard3.js"></script>
</body>

</html>