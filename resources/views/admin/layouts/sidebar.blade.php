<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-success">
  <a href="/dashboard" class="brand-link" style="text-decoration: none">
    <img src="{{ asset('img/logo.png') }}" width="70px" alt="AdminLTE Logo" class="brand-image img-circle">
    <span class="brand-text fw-bold">SS RENTAL</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('pengguna') }}" class="nav-link {{ Request::is('pengguna') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link {{ Request::is('penduduk') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('jenis-surat') }}" class="nav-link {{ Request::is('jenis-surat') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                    Surat
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pengajuan') }}" class="nav-link {{ Request::is('pengajuan') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>
                    Pengajuan
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </div>
  <!-- /.sidebar -->
</aside>