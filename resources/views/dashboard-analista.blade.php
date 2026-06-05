@extends('layouts.adminlte')

@section('title', 'Dashboard Analista')

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
                        <h3><i class="fas fa-microscope"></i> Bienvenido, {{ Auth::user()->nombre }}</h3>
                        <p class="mb-0">Panel de control para analistas - Gestiona análisis y datos EXIF</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <i class="fas fa-chart-line fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estadísticas de análisis -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card" style="background: var(--success-gradient); color: white; border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-2x mb-2"></i>
                <h3>{{ $stats['imagenes_autenticas'] }}</h3>
                <p class="mb-0">Auténticas</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="background: var(--danger-gradient); color: white; border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
                <h3>{{ $stats['imagenes_manipuladas'] }}</h3>
                <p class="mb-0">Manipuladas</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="background: var(--warning-gradient); color: white; border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-camera fa-2x mb-2"></i>
                <h3>{{ $stats['total_exif'] }}</h3>
                <p class="mb-0">Datos EXIF</p>
            </div>
        </div>
    </div>
</div>

<!-- Acciones rápidas -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-tools"></i> Herramientas de Análisis</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('analisis.index') }}" class="btn btn-primary btn-lg w-100" style="border-radius: 15px;">
                            <i class="fas fa-plus fa-2x d-block mb-2"></i>
                            <strong>Nuevo Análisis</strong>
                            <small class="d-block">Iniciar análisis forense</small>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('datos_exif.index') }}" class="btn btn-info btn-lg w-100" style="border-radius: 15px;">
                            <i class="fas fa-camera fa-2x d-block mb-2"></i>
                            <strong>Extraer EXIF</strong>
                            <small class="d-block">Analizar metadatos</small>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('reportes.index') }}" class="btn btn-success btn-lg w-100" style="border-radius: 15px;">
                            <i class="fas fa-file-pdf fa-2x d-block mb-2"></i>
                            <strong>Generar Reporte</strong>
                            <small class="d-block">Crear informe técnico</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cola de trabajo -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-tasks"></i> Cola de Trabajo</h5>
                <a href="{{ route('analisis.index') }}" class="btn btn-sm btn-outline-primary">Ver todos</a>
            </div>
            <div class="card-body">
                @if($ultimosAnalisis->count() > 0)
                <div class="row">
                    @foreach($ultimosAnalisis->take(3) as $analisis)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100" style="border-radius: 10px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="card-title">{{ $analisis->cod_analisis }}</h6>
                                    @if($analisis->estado == 'completado')
                                        <span class="badge bg-success">Completado</span>
                                    @elseif($analisis->estado == 'pendiente')
                                        <span class="badge bg-warning">Pendiente</span>
                                    @else
                                        <span class="badge bg-info">{{ ucfirst($analisis->estado) }}</span>
                                    @endif
                                </div>
                                <p class="card-text small">
                                    <strong>Imagen:</strong> {{ $analisis->imagen->nombre_original ?? 'N/A' }}<br>
                                    <strong>Resultado:</strong> 
                                    @if($analisis->resultado == 'manipulada')
                                        <span class="text-danger">Manipulada</span>
                                    @elseif($analisis->resultado == 'autentica')
                                        <span class="text-success">Auténtica</span>
                                    @else
                                        <span class="text-muted">{{ ucfirst($analisis->resultado) }}</span>
                                    @endif
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('analisis.show', $analisis->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    @if($analisis->estado == 'completado')
                                    <a href="{{ route('reportes.create') }}" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-file-pdf"></i> Reporte
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-microscope fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No hay análisis pendientes</h5>
                    <p class="text-muted">Los análisis aparecerán aquí cuando se asignen</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Distribución de confianza -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-pie"></i> Distribución de Confianza</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <small>90-100% (Alta confianza)</small>
                        <small><strong>{{ $stats['analisis_completados'] > 0 ? round(($stats['imagenes_autenticas'] / $stats['analisis_completados']) * 100) : 0 }}%</strong></small>
                    </div>
                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: {{ $stats['analisis_completados'] > 0 ? ($stats['imagenes_autenticas'] / $stats['analisis_completados']) * 100 : 0 }}%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <small>70-89% (Media confianza)</small>
                        <small><strong>{{ $stats['analisis_completados'] > 0 ? round(($stats['imagenes_manipuladas'] / $stats['analisis_completados']) * 100) : 0 }}%</strong></small>
                    </div>
                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar bg-warning" style="width: {{ $stats['analisis_completados'] > 0 ? ($stats['imagenes_manipuladas'] / $stats['analisis_completados']) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-camera"></i> Últimos Datos EXIF</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Cámara</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 5; $i++)
                            <tr>
                                <td><strong>EX_00{{ $i }}</strong></td>
                                <td>{{ ['Canon EOS R5', 'Sony A7R IV', 'Nikon D850', 'iPhone 14 Pro', 'Samsung S23'][($i-1) % 5] }}</td>
                                <td>
                                    <span class="badge bg-{{ ['success', 'warning', 'info', 'success', 'danger'][($i-1) % 5] }}">
                                        {{ ['Íntegro', 'Modificado', 'Procesando', 'Íntegro', 'Sin EXIF'][($i-1) % 5] }}
                                    </span>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('datos_exif.index') }}" class="btn btn-sm btn-outline-primary">Ver todos los EXIF</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Resumen de actividad -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-bar"></i> Resumen de Actividad</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-primary mb-1">{{ $stats['total_analisis'] }}</h3>
                            <small class="text-muted">Total Análisis</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-success mb-1">{{ $stats['analisis_completados'] }}</h3>
                            <small class="text-muted">Completados</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-info mb-1">{{ $stats['total_exif'] }}</h3>
                            <small class="text-muted">Datos EXIF</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-warning mb-1">{{ $stats['total_reportes'] }}</h3>
                        <small class="text-muted">Reportes</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection