@extends('layouts.base')

@section('sidebar-content')
<!-- Administración - Solo Administrador -->
<li class="nav-header text-white-50"><i class="fas fa-users-cog"></i> ADMINISTRACIÓN</li>
<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>Gestión de Roles</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Gestión de Usuarios</p>
    </a>
</li>

<!-- Gestión de Imágenes -->
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

<!-- Análisis y Reportes -->
<li class="nav-header text-white-50"><i class="fas fa-chart-line"></i> ANÁLISIS Y REPORTES</li>
<li class="nav-item">
    <a href="{{ route('analisis.index') }}" class="nav-link {{ request()->routeIs('analisis.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-search-plus"></i>
        <p>Análisis Forense</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('reportes.index') }}" class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>Reportes</p>
    </a>
</li>

<!-- Configuración -->
<li class="nav-header text-white-50"><i class="fas fa-cogs"></i> CONFIGURACIÓN</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog"></i>
        <p>Configuración Sistema</p>
    </a>
</li>
@endsection