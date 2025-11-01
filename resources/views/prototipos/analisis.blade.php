@extends('prototipos.layout')

@section('title', 'Análisis Forense')
@section('subtitle', 'Resultados de verificación y autenticidad de imágenes')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="sidebar-nav">
            <h5 class="mb-3"><i class="fas fa-search-plus text-primary me-2"></i>Análisis</h5>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern active">
                    <i class="fas fa-list me-2"></i>Todos los Análisis
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-plus me-2"></i>Nuevo Análisis
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-chart-bar me-2"></i>Estadísticas
                </a>
            </div>
        </div>
        
        <div class="card-modern">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Resumen</h6>
                <div class="d-flex justify-content-between mb-2">
                    <span>Auténticas</span>
                    <span class="badge bg-success">89</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Manipuladas</span>
                    <span class="badge bg-danger">23</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Sospechosas</span>
                    <span class="badge bg-warning">15</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>En Proceso</span>
                    <span class="badge bg-info">8</span>
                </div>
            </div>
        </div>
        
        <!-- Gráfico de confianza -->
        <div class="card-modern mt-3">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Distribución de Confianza</h6>
                <div class="mb-2">
                    <div class="d-flex justify-content-between">
                        <small>90-100%</small>
                        <small>45</small>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 75%"></div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between">
                        <small>70-89%</small>
                        <small>32</small>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-info" style="width: 53%"></div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between">
                        <small>50-69%</small>
                        <small>28</small>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-warning" style="width: 47%"></div>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-between">
                        <small>0-49%</small>
                        <small>30</small>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-danger" style="width: 50%"></div>
                    </div>
                </div>
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
                            <input type="text" class="form-control" placeholder="Buscar análisis...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option>Todos los resultados</option>
                            <option>Auténticas</option>
                            <option>Manipuladas</option>
                            <option>Sospechosas</option>
                        </select>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary-modern btn-modern">
                            <i class="fas fa-plus me-2"></i>Nuevo Análisis
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Lista de análisis -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card-modern">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="https://via.placeholder.com/120x80/4f46e5/ffffff?text=IMG_001" class="img-fluid rounded" alt="Imagen">
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-1">AN_001 - IMG_001.jpg</h6>
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>john.doe<br>
                                    <i class="fas fa-calendar me-1"></i>15/12/2024 10:30
                                </small>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="mb-2">
                                    <span class="badge bg-success fs-6">AUTÉNTICA</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 94%"></div>
                                </div>
                                <small class="text-muted">94% confianza</small>
                            </div>
                            <div class="col-md-3">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <small class="text-muted d-block">EXIF</small>
                                        <i class="fas fa-check text-success"></i>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Metadatos</small>
                                        <i class="fas fa-check text-success"></i>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Píxeles</small>
                                        <i class="fas fa-check text-success"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Ver detalle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Mapa de calor">
                                    <i class="fas fa-fire"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" title="Generar reporte">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mb-4">
                <div class="card-modern">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="https://via.placeholder.com/120x80/dc2626/ffffff?text=IMG_002" class="img-fluid rounded" alt="Imagen">
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-1">AN_002 - IMG_002.png</h6>
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>maria.silva<br>
                                    <i class="fas fa-calendar me-1"></i>15/12/2024 14:15
                                </small>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="mb-2">
                                    <span class="badge bg-danger fs-6">MANIPULADA</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-danger" style="width: 87%"></div>
                                </div>
                                <small class="text-muted">87% confianza</small>
                            </div>
                            <div class="col-md-3">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <small class="text-muted d-block">EXIF</small>
                                        <i class="fas fa-times text-danger"></i>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Metadatos</small>
                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Píxeles</small>
                                        <i class="fas fa-times text-danger"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Ver detalle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Mapa de calor">
                                    <i class="fas fa-fire"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" title="Generar reporte">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mb-4">
                <div class="card-modern">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="https://via.placeholder.com/120x80/d97706/ffffff?text=IMG_003" class="img-fluid rounded" alt="Imagen">
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-1">AN_003 - IMG_003.jpg</h6>
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>carlos.lopez<br>
                                    <i class="fas fa-calendar me-1"></i>14/12/2024 16:45
                                </small>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="mb-2">
                                    <span class="badge bg-warning fs-6">SOSPECHOSA</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: 65%"></div>
                                </div>
                                <small class="text-muted">65% confianza</small>
                            </div>
                            <div class="col-md-3">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <small class="text-muted d-block">EXIF</small>
                                        <i class="fas fa-check text-success"></i>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Metadatos</small>
                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Píxeles</small>
                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Ver detalle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Mapa de calor">
                                    <i class="fas fa-fire"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" title="Generar reporte">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mb-4">
                <div class="card-modern">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="https://via.placeholder.com/120x80/6b7280/ffffff?text=IMG_004" class="img-fluid rounded" alt="Imagen">
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-1">AN_004 - IMG_004.webp</h6>
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>ana.martinez<br>
                                    <i class="fas fa-calendar me-1"></i>13/12/2024 11:20
                                </small>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="mb-2">
                                    <span class="badge bg-info fs-6">PROCESANDO</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: 45%"></div>
                                </div>
                                <small class="text-muted">45% completado</small>
                            </div>
                            <div class="col-md-3">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <small class="text-muted d-block">EXIF</small>
                                        <i class="fas fa-spinner fa-spin text-info"></i>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Metadatos</small>
                                        <i class="fas fa-clock text-secondary"></i>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Píxeles</small>
                                        <i class="fas fa-clock text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <button class="btn btn-sm btn-outline-secondary me-1" disabled title="En proceso">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning" title="Cancelar">
                                    <i class="fas fa-stop"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Paginación -->
        <div class="d-flex justify-content-center">
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