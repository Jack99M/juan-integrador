@extends('layouts.adminlte')

@section('title', 'Dashboard Reportero')

@section('content')
<style>
:root {
    --primary-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    --success-gradient: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
    --warning-gradient: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    --danger-gradient: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
}
</style>
<!-- Bienvenida personalizada -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card" style="background: var(--primary-gradient); color: white; border-radius: 15px;">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3><i class="fas fa-newspaper"></i> Bienvenido, {{ Auth::user()->nombre }}</h3>
                        <p class="mb-0">Panel de control para reporteros - Gestiona tus imágenes y reportes</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <i class="fas fa-camera fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estadísticas rápidas -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card" style="background: var(--success-gradient); color: white; border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-images fa-2x mb-2"></i>
                <h3>{{ $stats['total_imagenes'] }}</h3>
                <p class="mb-0">Mis Imágenes</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="background: var(--warning-gradient); color: white; border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-file-pdf fa-2x mb-2"></i>
                <h3>{{ $stats['total_reportes'] }}</h3>
                <p class="mb-0">Mis Reportes</p>
            </div>
        </div>
    </div>
</div>

<!-- Acciones rápidas -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-bolt"></i> Acciones Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('imagenes.index') }}?create=1" class="btn btn-primary btn-lg w-100" style="border-radius: 15px;">
                            <i class="fas fa-upload fa-2x d-block mb-2"></i>
                            <strong>Subir Nueva Imagen</strong>
                            <small class="d-block">Cargar imagen para análisis</small>
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('reportes.index') }}?create=1" class="btn btn-success btn-lg w-100" style="border-radius: 15px;">
                            <i class="fas fa-file-plus fa-2x d-block mb-2"></i>
                            <strong>Generar Reporte</strong>
                            <small class="d-block">Crear nuevo reporte</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mis últimas imágenes -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-images"></i> Mis Últimas Imágenes</h5>
                <a href="{{ route('imagenes.index') }}" class="btn btn-sm btn-outline-primary">Ver todas</a>
            </div>
            <div class="card-body">
                @if($ultimasImagenes->count() > 0)
                <div class="row">
                    @foreach($ultimasImagenes->take(3) as $imagen)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100" style="border-radius: 10px;">
                            <div class="position-relative">
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px; border-radius: 10px 10px 0 0;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                                <div class="position-absolute top-0 end-0 m-2">
                                    @if($imagen->estado == 'terminado')
                                        <span class="badge bg-success">Completada</span>
                                    @elseif($imagen->estado == 'procesando')
                                        <span class="badge bg-warning">Procesando</span>
                                    @else
                                        <span class="badge bg-info">{{ ucfirst($imagen->estado) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">{{ Str::limit($imagen->nombre_original, 20) }}</h6>
                                <p class="card-text small text-muted">
                                    <i class="fas fa-calendar"></i> {{ $imagen->created_at->format('d/m/Y H:i') }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('imagenes.show', $imagen->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('imagenes.edit', $imagen->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No tienes imágenes aún</h5>
                    <p class="text-muted">Comienza subiendo tu primera imagen</p>
                    <a href="{{ route('imagenes.create') }}" class="btn btn-primary">
                        <i class="fas fa-upload"></i> Subir Imagen
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Mis últimos reportes -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-file-alt"></i> Mis Últimos Reportes</h5>
                <a href="{{ route('reportes.index') }}" class="btn btn-sm btn-outline-primary">Ver todos</a>
            </div>
            <div class="card-body">
                @if($ultimosAnalisis->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ultimosAnalisis->take(5) as $analisis)
                            <tr>
                                <td><strong>{{ $analisis->cod_analisis }}</strong></td>
                                <td>{{ $analisis->imagen->nombre_original ?? 'N/A' }}</td>
                                <td>
                                    @if($analisis->estado == 'completado')
                                        <span class="badge bg-success">Completado</span>
                                    @elseif($analisis->estado == 'pendiente')
                                        <span class="badge bg-warning">Pendiente</span>
                                    @else
                                        <span class="badge bg-info">{{ ucfirst($analisis->estado) }}</span>
                                    @endif
                                </td>
                                <td>{{ $analisis->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('reportes.create') }}" class="btn btn-sm btn-outline-success" title="Generar reporte">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No tienes reportes aún</h5>
                    <p class="text-muted">Los reportes aparecerán aquí cuando tengas análisis completados</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection