<div class="navbar navbar-dark bg-dark shadow">
    <div class="container d-flex justify-content-between">
        <a href="{{ route('all.ocorrencia') }}" class="navbar-brand d-flex align-items-center">
            <strong>Mapa Colaborativo</strong>
        </a>
        <a class="btn btn-outline-danger" href="{{ route('new.ocorrencia') }}">
            <span class="light-orange">Nova ocorrência</span>
        </a>
    </div>
    {{-- <a class="navbar-brand mr-1" href="{{ url('/') }}">Mapa Colaborativo</a> --}}

    {{-- <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button> --}}


    <!-- Navbar -->
    {{-- <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul> --}}

</div>