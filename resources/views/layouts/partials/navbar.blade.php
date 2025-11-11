<!-- Navbar -->
<nav class="main-header navbar navbar-expand">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-user-circle"></i> {{ Auth::user()->nombre ?? 'Usuario' }}
                <span class="badge badge-light ml-1">{{ Auth::user()->rol->nombre ?? 'Sin rol' }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('perfil.show') }}">
                    <i class="fas fa-user"></i> Mi Perfil
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>