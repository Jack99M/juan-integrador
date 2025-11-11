@extends('layouts.base')

@section('sidebar-content')
<!-- Cola de Análisis -->
<li class="nav-header text-white-50"><i class="fas fa-tasks"></i> COLA DE TRABAJO</li>
<li class="nav-item">
    <a href="{{ route('analisis.index') }}" class="nav-link {{ request()->routeIs('analisis.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list-ul"></i>
        <p>Análisis Pendientes</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-spinner"></i>
        <p>En Proceso</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-check-circle"></i>
        <p>Completados</p>
    </a>
</li>

<!-- Herramientas de Análisis -->
<li class="nav-header text-white-50"><i class="fas fa-microscope"></i> HERRAMIENTAS</li>
<li class="nav-item">
    <a href="{{ route('imagenes.index') }}" class="nav-link {{ request()->routeIs('imagenes.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Revisar Imágenes</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('datos_exif.index') }}" class="nav-link {{ request()->routeIs('datos_exif.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-camera"></i>
        <p>Análisis EXIF</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-fire"></i>
        <p>Mapas de Calor</p>
    </a>
</li>

<!-- Validación y Reportes -->
<li class="nav-header text-white-50"><i class="fas fa-clipboard-check"></i> VALIDACIÓN</li>
<li class="nav-item">
    <a href="{{ route('reportes.index') }}" class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>Generar Reportes</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>Estadísticas</p>
    </a>
</li>

<!-- Configuración -->
<li class="nav-header text-white-50"><i class="fas fa-sliders-h"></i> CONFIGURACIÓN</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog"></i>
        <p>Parámetros de Análisis</p>
    </a>
</li>
@endsection