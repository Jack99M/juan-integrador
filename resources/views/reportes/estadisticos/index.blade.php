@extends('layouts.adminlte')

@section('title', 'Reportes Estadísticos')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-bar"></i> Reportes Estadísticos</h3>
            </div>
            <div class="card-body">
                <p class="text-muted">Selecciona el tipo de reporte que deseas generar</p>
                
                <div class="row mt-4">
                    <!-- Reporte por Estado de Análisis -->
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5><i class="fas fa-tasks text-primary"></i> Por Estado de Análisis</h5>
                                <p class="text-muted">Reporte de imágenes agrupadas por estado de análisis (pendiente, completado, etc.)</p>
                                <a href="{{ route('reportes.estadisticos.estado-analisis') }}" class="btn btn-primary" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Generar PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte por Formato -->
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5><i class="fas fa-image text-success"></i> Por Formato de Imagen</h5>
                                <p class="text-muted">Reporte de imágenes agrupadas por formato (JPG, PNG, WEBP, etc.)</p>
                                <a href="{{ route('reportes.estadisticos.formato') }}" class="btn btn-success" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Generar PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte por Estado de Subida -->
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5><i class="fas fa-upload text-info"></i> Por Estado de Subida</h5>
                                <p class="text-muted">Reporte de imágenes agrupadas por estado (activa, inactiva, procesando, etc.)</p>
                                <a href="{{ route('reportes.estadisticos.estado-subida') }}" class="btn btn-info" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Generar PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte Último Mes -->
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5><i class="fas fa-calendar-alt text-warning"></i> Último Mes</h5>
                                <p class="text-muted">Reporte de imágenes analizadas en el último mes</p>
                                <a href="{{ route('reportes.estadisticos.ultimo-mes') }}" class="btn btn-warning" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Generar PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte Último Año -->
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5><i class="fas fa-calendar text-danger"></i> Último Año</h5>
                                <p class="text-muted">Reporte de imágenes analizadas en el último año</p>
                                <a href="{{ route('reportes.estadisticos.ultimo-anio') }}" class="btn btn-danger" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Generar PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte por Periodo -->
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5><i class="fas fa-calendar-week text-purple"></i> Por Periodo Personalizado</h5>
                                <p class="text-muted">Reporte de imágenes en un rango de fechas específico</p>
                                <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#modalPeriodo">
                                    <i class="fas fa-file-pdf"></i> Generar PDF
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte General -->
                    <div class="col-md-12 mb-3">
                        <div class="card h-100" style="border: 2px solid #667eea;">
                            <div class="card-body">
                                <h5><i class="fas fa-chart-pie" style="color: #667eea;"></i> Reporte General</h5>
                                <p class="text-muted">Reporte completo con todas las estadísticas, porcentajes de manipuladas/limpias y resumen general</p>
                                <a href="{{ route('reportes.estadisticos.general') }}" class="btn" style="background: #667eea; color: white;" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Generar PDF Completo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Periodo Personalizado -->
<div class="modal fade" id="modalPeriodo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('reportes.estadisticos.periodo') }}" method="GET" target="_blank">
                <div class="modal-header">
                    <h5 class="modal-title">Seleccionar Periodo</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha Fin</label>
                        <input type="date" name="fecha_fin" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Generar Reporte</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
