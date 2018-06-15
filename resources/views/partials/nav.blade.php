<nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/favicon/favicon-32x32.png') }}" width="30" alt="Logo de Corocora">
            {{ config('app.name', 'Corocora (Aula Virtual)') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Expandir navegación</span>
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ url('courses') }}" class="nav-link">Cursos</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Acceder</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Registrarme</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->picture)
                                <img src="{{ asset(Auth::user()->picture) }}" width="25" alt="Imágen de {{ Auth::user()->name }}" class="mr-1 img-responsive">
                            @endif
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->isTeacher())
                                <h6 class="dropdown-header">Administrador</h6>
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Panel de administración</a> 
                                <div class="dropdown-divider"></div>
                            @endif

                            <h6 class="dropdown-header">Configuración</h6>
                            <a href="{{ route('users.profile') }}" class="dropdown-item">Editar perfil</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>