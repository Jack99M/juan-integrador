<!-- Sidebar -->
<aside class="main-sidebar elevation-4">
    <a href="{{ url('/') }}" class="brand-link text-center">
        <i class="fas fa-shield-alt fa-2x text-white mb-2"></i><br>
        <span class="brand-text font-weight-bold text-white">JOTA Verificador</span>
    </a>
    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                
                <!-- Dashboard - Todos los roles -->
                <li class="nav-header text-white-50"><i class="fas fa-tachometer-alt"></i> DASHBOARD</li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                
                @yield('sidebar-content')
                
                <!-- Prototipos - Todos los roles -->
                <li class="nav-header text-white-50"><i class="fas fa-palette"></i> PROTOTIPOS</li>
                <li class="nav-item">
                    <a href="{{ route('prototipos.index') }}" class="nav-link {{ request()->routeIs('prototipos.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paint-brush"></i>
                        <p>Ver Prototipos</p>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>