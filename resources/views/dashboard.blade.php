@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Bienvenida -->
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-tachometer-alt"></i> Dashboard - Verificador de Imágenes</h3>
            </div>
            <div class="card-body">
                <h4><i class="fas fa-shield-alt"></i> Bienvenido al Sistema de Verificación</h4>
                <p class="text-muted">Monitorea y gestiona la autenticidad de imágenes digitales</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Estadísticas Principales -->
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background: var(--primary-gradient); color: white; border-radius: 15px;">
            <div class="inner">
                <h3>{{ $stats['total_usuarios'] }}</h3>
                <p>Total Usuarios</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('usuarios.index') }}" class="small-box-footer" style="color: white;">
                Ver más <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box" style="background: var(--success-gradient); color: white; border-radius: 15px;">
            <div class="inner">
                <h3>{{ $stats['total_imagenes'] }}</h3>
                <p>Total Imágenes</p>
            </div>
            <div class="icon">
                <i class="fas fa-images"></i>
            </div>
            <a href="{{ route('imagenes.index') }}" class="small-box-footer" style="color: white;">
                Ver más <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box" style="background: var(--warning-gradient); color: white; border-radius: 15px;">
            <div class="inner">
                <h3>{{ $stats['total_analisis'] }}</h3>
                <p>Total Análisis</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <a href="{{ route('analisis.index') }}" class="small-box-footer" style="color: white;">
                Ver más <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box" style="background: var(--danger-gradient); color: white; border-radius: 15px;">
            <div class="inner">
                <h3>{{ $stats['total_reportes'] }}</h3>
                <p>Total Reportes</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <a href="{{ route('reportes.index') }}" class="small-box-footer" style="color: white;">
                Ver más <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <!-- Estadísticas Detalladas -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-pie"></i> Estadísticas de Análisis</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 text-center">
                        <div class="progress-group">
                            <span class="progress-text">Imágenes Auténticas</span>
                            <span class="float-right"><b>{{ $stats['imagenes_autenticas'] }}</b></span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="background: var(--success-gradient); width: {{ $stats['total_analisis'] > 0 ? ($stats['imagenes_autenticas'] / $stats['total_analisis']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="progress-group">
                            <span class="progress-text">Imágenes Manipuladas</span>
                            <span class="float-right"><b>{{ $stats['imagenes_manipuladas'] }}</b></span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="background: var(--danger-gradient); width: {{ $stats['total_analisis'] > 0 ? ($stats['imagenes_manipuladas'] / $stats['total_analisis']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="info-box">
                            <span class="info-box-icon" style="background: var(--success-gradient); color: white;"><i class="fas fa-check-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Usuarios Activos</span>
                                <span class="info-box-number">{{ $stats['usuarios_activos'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="info-box">
                            <span class="info-box-icon" style="background: var(--primary-gradient); color: white;"><i class="fas fa-camera"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Datos EXIF</span>
                                <span class="info-box-number">{{ $stats['total_exif'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actividad Reciente -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-clock"></i> Actividad Reciente</h3>
            </div>
            <div class="card-body">
                <div class="timeline">
                    @foreach($ultimasImagenes->take(3) as $imagen)
                    <div class="time-label">
                        <span class="bg-primary" style="background: var(--primary-gradient) !important;">
                            {{ $imagen->created_at->format('d M') }}
                        </span>
                    </div>
                    <div>
                        <i class="fas fa-image bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">Nueva imagen subida</h3>
                            <div class="timeline-body">
                                <strong>{{ $imagen->nombre_original }}</strong><br>
                                <small class="text-muted">Por: {{ $imagen->usuario->nombre ?? 'Usuario desconocido' }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Últimas Imágenes -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-images"></i> Últimas Imágenes Subidas</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ultimasImagenes as $imagen)
                            <tr>
                                <td>{{ Str::limit($imagen->nombre_original, 20) }}</td>
                                <td>{{ $imagen->usuario->nombre ?? '-' }}</td>
                                <td><small>{{ $imagen->created_at->diffForHumans() }}</small></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimos Análisis -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-line"></i> Últimos Análisis</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Resultado</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ultimosAnalisis as $analisis)
                            <tr>
                                <td>{{ $analisis->imagen->cod_imagen ?? '-' }}</td>
                                <td>
                                    @if($analisis->resultado == 'manipulada')
                                        <span class="badge badge-danger">Manipulada</span>
                                    @else
                                        <span class="badge badge-success">Auténtica</span>
                                    @endif
                                </td>
                                <td><small>{{ $analisis->created_at->diffForHumans() }}</small></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sección de Prototipos -->
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-palette"></i> Prototipos Visuales</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Explora los prototipos visuales de cada módulo del sistema</p>
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-6 mb-3">
                        <a href="{{ route('prototipos.index') }}" class="btn btn-app bg-primary" style="width: 100%; height: 80px;">
                            <i class="fas fa-th-large"></i> Prototipos
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-3">
                        <a href="{{ route('prototipos.usuarios') }}" class="btn btn-app bg-success" style="width: 100%; height: 80px;">
                            <i class="fas fa-users"></i> Usuarios
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-3">
                        <a href="{{ route('prototipos.roles') }}" class="btn btn-app bg-warning" style="width: 100%; height: 80px;">
                            <i class="fas fa-user-shield"></i> Roles
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-3">
                        <a href="{{ route('prototipos.imagenes') }}" class="btn btn-app bg-info" style="width: 100%; height: 80px;">
                            <i class="fas fa-images"></i> Imágenes
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-3">
                        <a href="{{ route('prototipos.analisis') }}" class="btn btn-app bg-secondary" style="width: 100%; height: 80px;">
                            <i class="fas fa-search-plus"></i> Análisis
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-3">
                        <a href="{{ route('prototipos.reportes') }}" class="btn btn-app bg-danger" style="width: 100%; height: 80px;">
                            <i class="fas fa-file-alt"></i> Reportes
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-6 mb-3">
                        <a href="{{ route('prototipos.datos-exif') }}" class="btn btn-app bg-dark" style="width: 100%; height: 80px;">
                            <i class="fas fa-camera"></i> Datos EXIF
                        </a>
                    </div>
                    <div class="col-md-10 col-sm-8">
                        <div class="alert alert-info mb-0">
                            <h6><i class="fas fa-info-circle"></i> Información</h6>
                            <p class="mb-0">Los prototipos son vistas estéticas no funcionales para visualizar el diseño de cada módulo CRUD del sistema.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection