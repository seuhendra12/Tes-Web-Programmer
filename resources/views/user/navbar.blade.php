<nav class="navbar navbar-expand-md bg-biru fixed-top">
  <div class="container-fluid">
    <div class="ms-3">
      <img src="{!! asset('/img/logo_white.png') !!}" alt="user" style="width: 10%;" />
    </div>
    <!-- Button responsive -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse offcanvas offcanvas-end bg-dark" data-bs-scroll="true" id="offcanvasWithBothOptions" tabindex="-1" id="navbarNav">
      <div class="offcanvas-header w-100 align-items-center">
        <h2 class="mb-0 text-white fw-bold">SIMAS</h2>
        <button type="button" class="btn-close text-reset bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <ul class="navbar-nav ms-auto mx-3 pt-2">
        <li class="nav-item py-2 me-3">
          <a class="nav-link text-white fw-bold" aria-current="page" href="/">Beranda</a>
        </li>
        <li class="nav-item py-2 me-4">
          <a class="nav-link text-white fw-bold" href="#kontak">Kontak</a>
        </li>
        @if (Auth::check())
        <!-- Button trigger modal -->
        <div class="d-flex align-items-center">
          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profile">
            <img src="{!! asset('/img/icon_user.jpg') !!}" alt="User Image" class="rounded-circle me-2" style="width: 30px; height: 30px;">
            <span class="text-white fw-bold">{{ Auth::user()->name }}</span>
          </button>
        </div>
        @else
        <li class="nav-item">
          <div class="mb-2 text-white"></div>
          <div class="nav-link d-inline">
            <a href="/login" class="btn btn-light mb-3 rounded-0 fw-bold">Masuk</a>
            <a href="/register" class="btn btn-secondary mb-3 px-3 rounded-0 fw-bold">Daftar</a>
          </div>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

@if (Auth::check())
<!-- Modal -->
<div class="modal fade mt-4" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-biru">
        <h1 class="modal-title fs-5 fw-bold text-white" id="exampleModalLabel">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-aliceblue">
        <div class="mx-auto text-center">
          <img src="{!! asset('/img/icon_user.jpg') !!}" alt="User Image" class="rounded-circle me-2" style="width: 130px; height: 130px;">
          <div class="modal-profile">
            <h5 class="text-dark fw-bold">{{ Auth::user()->nama }}</h5>
            <p class="text-dark fw-bold">SIM ID : {{ Auth::user()->no_sim }}</p>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col text-center">
            <div class="btn-group">
              <a href="/history/{{ Auth::user()->id }}" class="btn btn-primary text-white rounded-0 fw-semibold me-2"><i class="fa-solid fa-clock-rotate-left me-2"></i>Histori</a>
              <a href="/logout" class="btn btn-danger rounded-0 fw-semibold" onclick="return confirm('Apakah yakin ingin keluar ?')"><i class="fas fa-power-off me-2"></i>Keluar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
<script>
  function confirmLogout() {
    return confirm('Yakin ingin keluar?');
  }
</script>