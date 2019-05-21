<div class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <strong>Mapa Colaborativo</strong>
        </a>

        @if (Session::has('cidade'))
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('estatistica') }}">Estatísticas</a>
                    </li>
                    {{-- <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown07">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li> --}}
                </ul>
            </div>   
        @endif
        {{-- <div class="collapse navbar-collapse" id="navbarsExample01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Estatísticas</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div> --}}
        <a class="btn btn-outline-danger" href="{{ route('new.ocorrencia') }}">
            <span class="light-orange">Nova ocorrência</span>
        </a>
    </div>
</div>
