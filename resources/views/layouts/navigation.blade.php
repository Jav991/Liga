<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar-custom">
    <div class="navbar-left">
        <a href="{{ route('/') }}" class="navbar-brand">
            <div class="navbar-brand-icon">
                <i class="fas fa-trophy"></i>
            </div>
            <span class="navbar-brand-text">LIGA <span>GAMER</span></span>
        </a>

        <div class="navbar-links">
            <a href="{{ route('partidos.index') }}" class="nav-link-custom {{ request()->routeIs('partidos.*') ? 'active' : '' }}">
                <i class="fas fa-gamepad mr-1"></i> Partidos
            </a>
            @if (Route::has('equipos.index'))
                <a href="{{ route('equipos.index') }}" class="nav-link-custom {{ request()->routeIs('equipos.*') ? 'active' : '' }}">
                    <i class="fas fa-shield-alt mr-1"></i> Equipos
                </a>
            @endif
        </div>
    </div>

    <div class="navbar-right">
        <div class="user-dropdown">
            <button class="user-dropdown-btn">
                <i class="fas fa-user-circle user-avatar-icon"></i>
                <span>{{ Auth::user()->name ?? 'Javier Gómez-Comino' }}</span>
                <i class="fas fa-chevron-down text-xs opacity-60"></i>
            </button>
            
            <!-- Menú desplegable con el botón de logout -->
            <div class="user-dropdown-menu">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>