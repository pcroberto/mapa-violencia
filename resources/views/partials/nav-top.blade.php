<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <strong>Mapa da Violência</strong>
        </a>

        
        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-info" href="{{ route('new.ocorrencia') }}">
                        <span>Nova ocorrência</span>
                    </a>
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
            <ul class="navbar-nav">
                @if (Session::has('cidade'))
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('estatistica') }}">Estatísticas</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link"  data-toggle="modal" data-target="#loginModal" href="#">Entrar</a>
                </li>
                {{-- <li class="nav-item">
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
        
        
                {{-- <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-info" href="{{ route('new.ocorrencia') }}">
                            <span>Nova ocorrência</span>
                        </a>
                    </li>
                </ul> --}}
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
        {{-- <a class="btn btn-outline-info my-2 my-sm-0" href="{{ route('new.ocorrencia') }}"> --}}
        {{-- <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i>
                </a>
            </li>
        </ul> --}}
    </div>
</nav>
