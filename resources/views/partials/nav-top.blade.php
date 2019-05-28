<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                    <strong>Mapa da Violência</strong>
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-info" href="{{ route('new.ocorrencia') }}">
                    <span>Nova ocorrência</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @if (Session::has('cidade'))
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('estatistica') }}">Estatísticas</a>
                </li>
            @endif
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
