@extends('prototipos.layout')

@section('title', 'Gestión de Reportes')
@section('subtitle', 'Reportes técnicos y documentación forense')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="sidebar-nav">
            <h5 class="mb-3"><i class="fas fa-file-alt text-primary me-2"></i>Reportes</h5>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern active">
                    <i class="fas fa-list me-2"></i>Todos los Reportes
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-plus me-2"></i>Generar Reporte
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-chart-pie me-2"></i>Estadísticas
                </a>
            </div>
        </div>
        
        <div class="card-modern">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Estadísticas</h6>
                <div class="d-flex justify-content-between mb-2">
                    <span>Total Reportes</span>
                    <span class="badge bg-primary">78</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Este Mes</span>
                    <span class="badge bg-success">12</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Pendientes</span>
                    <span class="badge bg-warning">3</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Descargados</span>
                    <span class="badge bg-info">65</span>
                </div>
            </div>
        </div>
        
        <!-- Filtros -->
        <div class="card-modern mt-3">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Filtros</h6>
                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select form-select-sm">
                        <option>Todos</option>
                        <option>Técnico</option>
                        <option>Ejecutivo</option>
                        <option>Forense</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <select class="form-select form-select-sm">
                        <option>Último mes</option>
                        <option>Últimos 3 meses</option>
                        <option>Último año</option>
                        <option>Personalizado</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-sm w-100">Aplicar</button>
            </div>
        </div>
    </div>
    
    <!-- Contenido principal -->
    <div class="col-md-9">
        <!-- Barra de herramientas -->
        <div class="card-modern mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar reportes...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-secondary active" title="Vista de tarjetas">
                                <i class="fas fa-th"></i>
                            </button>
                            <button class="btn btn-outline-secondary" title="Vista de tabla">
                                <i class="fas fa-table"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary-modern btn-modern">
                            <i class="fas fa-plus me-2"></i>Generar Reporte
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Grid de reportes -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card-modern h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">RPT_001 - Análisis Técnico</h6>
                            <small class="text-muted">IMG_001.jpg</small>
                        </div>
                        <span class="badge bg-success">Completado</span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Analista</small>
                                <strong>John Doe</strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Fecha</small>
                                <strong>15/12/2024</strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Resultado</small>
                                <span class="badge bg-success">Auténtica</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Confianza</small>
                                <strong>94%</strong>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Resumen</small>
                            <p class="small mb-0">La imagen presenta características consistentes con una fotografía auténtica. No se detectaron signos de manipulación digital.</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="fas fa-eye me-1"></i>Ver
                            </button>
                            <button class="btn btn-sm btn-outline-success" title="Descargar PDF">
                                <i class="fas fa-download me-1"></i>PDF
                            </button>
                            <button class="btn btn-sm btn-outline-info" title="Compartir">
                                <i class="fas fa-share me-1"></i>Compartir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card-modern h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">RPT_002 - Informe Forense</h6>
                            <small class="text-muted">IMG_002.png</small>
                        </div>
                        <span class="badge bg-danger">Crítico</span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Analista</small>
                                <strong>María Silva</strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Fecha</small>
                                <strong>15/12/2024</strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Resultado</small>
                                <span class="badge bg-danger">Manipulada</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Confianza</small>
                                <strong>87%</strong>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Resumen</small>
                            <p class="small mb-0">Se detectaron múltiples alteraciones digitales. Evidencia de clonado de píxeles y modificación de metadatos EXIF.</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="fas fa-eye me-1"></i>Ver
                            </button>
                            <button class="btn btn-sm btn-outline-success" title="Descargar PDF">
                                <i class="fas fa-download me-1"></i>PDF
                            </button>
                            <button class="btn btn-sm btn-outline-info" title="Compartir">
                                <i class="fas fa-share me-1"></i>Compartir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card-modern h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">RPT_003 - Análisis Preliminar</h6>
                            <small class="text-muted">IMG_003.jpg</small>
                        </div>
                        <span class="badge bg-warning">Pendiente</span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Analista</small>
                                <strong>Carlos López</strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Fecha</small>
                                <strong>14/12/2024</strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Resultado</small>
                                <span class="badge bg-warning">Sospechosa</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Confianza</small>
                                <strong>65%</strong>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Resumen</small>
                            <p class="small mb-0">Análisis en progreso. Se requiere revisión adicional de los metadatos y análisis de compresión.</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-secondary" disabled title="En proceso">
                                <i class="fas fa-spinner fa-spin me-1"></i>Procesando
                            </button>
                            <button class="btn btn-sm btn-outline-warning" title="Priorizar">
                                <i class="fas fa-exclamation me-1"></i>Priorizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card-modern h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">RPT_004 - Reporte Ejecutivo</h6>
                            <small class="text-muted">Múltiples imágenes</small>
                        </div>
                        <span class="badge bg-info">Resumen</span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Analista</small>
                                <strong>Ana Martínez</strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Fecha</small>
                                <strong>13/12/2024</strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Imágenes</small>
                                <strong>15 analizadas</strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Período</small>
                                <strong>Nov 2024</strong>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Resumen</small>
                            <p class="small mb-0">Reporte mensual de actividades. 80% de imágenes auténticas, 20% con alteraciones detectadas.</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="fas fa-eye me-1"></i>Ver
                            </button>
                            <button class="btn btn-sm btn-outline-success" title="Descargar PDF">
                                <i class="fas fa-download me-1"></i>PDF
                            </button>
                            <button class="btn btn-sm btn-outline-info" title="Compartir">
                                <i class="fas fa-share me-1"></i>Compartir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Estadísticas rápidas -->
        <div class="card-modern mt-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Estadísticas de Reportes</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-primary mb-1">78</h3>
                            <small class="text-muted">Total Reportes</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-success mb-1">65</h3>
                            <small class="text-muted">Completados</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-warning mb-1">10</h3>
                            <small class="text-muted">En Proceso</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-info mb-1">3</h3>
                        <small class="text-muted">Pendientes</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection