<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- AdminLTE CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --danger-gradient: linear-gradient(135deg, #fc466b 0%, #3f5efb 100%);
        }
        
        .main-header {
            background: var(--primary-gradient) !important;
            border: none !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1) !important;
        }
        
        .main-sidebar {
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%) !important;
            box-shadow: 2px 0 20px rgba(0,0,0,0.1) !important;
        }
        
        .brand-link {
            background: rgba(255,255,255,0.1) !important;
            border-bottom: 1px solid rgba(255,255,255,0.1) !important;
        }
        
        .nav-sidebar .nav-link {
            border-radius: 10px !important;
            margin: 2px 8px !important;
            transition: all 0.3s ease !important;
        }
        
        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1) !important;
            transform: translateX(5px) !important;
        }
        
        .card {
            border: none !important;
            border-radius: 15px !important;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1) !important;
            transition: all 0.3s ease !important;
        }
        
        .card:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 35px rgba(0,0,0,0.15) !important;
        }
        
        .card-primary .card-header {
            background: var(--primary-gradient) !important;
            border: none !important;
            border-radius: 15px 15px 0 0 !important;
        }
        
        .card-warning .card-header {
            background: var(--warning-gradient) !important;
            border: none !important;
            border-radius: 15px 15px 0 0 !important;
        }
        
        .btn {
            border-radius: 25px !important;
            padding: 8px 20px !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
        }
        
        .btn-primary {
            background: var(--primary-gradient) !important;
            border: none !important;
        }
        
        .btn-success {
            background: var(--success-gradient) !important;
            border: none !important;
        }
        
        .btn-warning {
            background: var(--warning-gradient) !important;
            border: none !important;
        }
        
        .btn-danger {
            background: var(--danger-gradient) !important;
            border: none !important;
        }
        
        .btn:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
        }
        
        .table {
            border-radius: 10px !important;
            overflow: hidden !important;
        }
        
        .table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            border: none !important;
            font-weight: 600 !important;
        }
        
        .table tbody tr {
            transition: all 0.2s ease !important;
        }
        
        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.1) !important;
            transform: scale(1.01) !important;
        }
        
        .badge {
            border-radius: 20px !important;
            padding: 8px 12px !important;
            font-weight: 500 !important;
        }
        
        .form-control {
            border-radius: 10px !important;
            border: 2px solid #e9ecef !important;
            transition: all 0.3s ease !important;
        }
        
        .form-control:focus {
            border-color: #667eea !important;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25) !important;
        }
        
        .input-group-text {
            background: var(--primary-gradient) !important;
            color: white !important;
            border: none !important;
            border-radius: 10px 0 0 10px !important;
        }
        
        .content-wrapper {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) !important;
        }
        
        .main-footer {
            background: var(--primary-gradient) !important;
            color: white !important;
            border: none !important;
        }
        
        .alert {
            border-radius: 15px !important;
            border: none !important;
        }
        
        .navbar-nav .nav-link {
            color: white !important;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card {
            animation: fadeInUp 0.6s ease-out !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

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

    <!-- Sidebar -->
    <aside class="main-sidebar elevation-4">
        <a href="{{ url('/') }}" class="brand-link text-center">
            <i class="fas fa-shield-alt fa-2x text-white mb-2"></i><br>
            <span class="brand-text font-weight-bold text-white">Verificador</span>
        </a>
        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-header text-white-50"><i class="fas fa-tachometer-alt"></i> DASHBOARD</li>
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    
                    @if(Auth::user()->rol->nombre == 'Administrador')
                    <li class="nav-header text-white-50"><i class="fas fa-users-cog"></i> ADMINISTRACIÓN</li>
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    @endif
                    
                    @if(in_array(Auth::user()->rol->nombre, ['Administrador', 'Analista']))
                    <li class="nav-header text-white-50"><i class="fas fa-images"></i> GESTIÓN DE IMÁGENES</li>
                    <li class="nav-item">
                        <a href="{{ route('imagenes.index') }}" class="nav-link {{ request()->routeIs('imagenes.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-image"></i>
                            <p>Imágenes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datos_exif.index') }}" class="nav-link {{ request()->routeIs('datos_exif.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-camera"></i>
                            <p>Datos EXIF</p>
                        </a>
                    </li>
                    @endif
                    
                    <li class="nav-header text-white-50"><i class="fas fa-chart-line"></i> ANÁLISIS</li>
                    @if(in_array(Auth::user()->rol->nombre, ['Administrador', 'Analista', 'Investigador']))
                    <li class="nav-item">
                        <a href="{{ route('analisis.index') }}" class="nav-link {{ request()->routeIs('analisis.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Análisis</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('reportes.index') }}" class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Reportes</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <div class="float-right d-none d-sm-inline">
            <i class="fas fa-shield-alt"></i> Identificación de Manipulación de Imágenes
        </div>
        <strong><i class="fas fa-copyright"></i> 2025</strong> Todos los derechos reservados.
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
