@extends('layouts.base')

@section('sidebar-content')
<!-- Mis Imágenes -->
<li class="nav-header text-white-50"><i class="fas fa-images"></i> MIS IMÁGENES</li>
<li class="nav-item">
    <a href="{{ route('imagenes.index') }}" class="nav-link {{ request()->routeIs('imagenes.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-upload"></i>
        <p>Subir Imágenes</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-history"></i>
        <p>Historial de Subidas</p>
    </a>
</li>

<!-- Análisis -->
<li class="nav-header text-white-50"><i class="fas fa-chart-line"></i> ANÁLISIS</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-play-circle"></i>
        <p>Solicitar Análisis</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clock"></i>
        <p>Análisis Pendientes</p>
    </a>
</li>

<!-- Reportes -->
<li class="nav-header text-white-50"><i class="fas fa-file-alt"></i> REPORTES</li>
<li class="nav-item">
    <a href="{{ route('reportes.index') }}" class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>Mis Reportes</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-download"></i>
        <p>Descargar Reportes</p>
    </a>
</li>

<!-- Herramientas -->
<li class="nav-header text-white-50"><i class="fas fa-tools"></i> HERRAMIENTAS</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-question-circle"></i>
        <p>Ayuda y Tutoriales</p>
    </a>
</li>
@endsection