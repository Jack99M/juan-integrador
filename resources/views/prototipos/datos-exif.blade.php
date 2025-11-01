@extends('prototipos.layout')

@section('title', 'Datos EXIF')
@section('subtitle', 'Metadatos técnicos y información de captura de imágenes')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="sidebar-nav">
            <h5 class="mb-3"><i class="fas fa-camera text-primary me-2"></i>Datos EXIF</h5>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern active">
                    <i class="fas fa-list me-2"></i>Todos los EXIF
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-plus me-2"></i>Extraer EXIF
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-chart-line me-2"></i>Análisis
                </a>
            </div>
        </div>
        
        <div class="card-modern">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Estadísticas</h6>
                <div class="d-flex justify-content-between mb-2">
                    <span>Total EXIF</span>
                    <span class="badge bg-primary">142</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Con GPS</span>
                    <span class="badge bg-success">89</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Modificados</span>
                    <span class="badge bg-warning">23</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Sin EXIF</span>
                    <span class="badge bg-danger">14</span>
                </div>
            </div>
        </div>
        
        <!-- Marcas de cámara -->
        <div class="card-modern mt-3">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Marcas Detectadas</h6>
                <div class="d-flex justify-content-between mb-2">
                    <span>Canon</span>
                    <span class="badge bg-secondary">45</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Sony</span>
                    <span class="badge bg-secondary">32</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Nikon</span>
                    <span class="badge bg-secondary">28</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Apple</span>
                    <span class="badge bg-secondary">25</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Otros</span>
                    <span class="badge bg-secondary">12</span>
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
                            <input type="text" class="form-control" placeholder="Buscar por imagen o cámara...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option>Todas las marcas</option>
                            <option>Canon</option>
                            <option>Sony</option>
                            <option>Nikon</option>
                            <option>Apple</option>
                        </select>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary-modern btn-modern">
                            <i class="fas fa-plus me-2"></i>Extraer EXIF
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Lista de datos EXIF -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card-modern">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="mb-0">EX_001 - IMG_001.jpg</h6>
                                <small class="text-muted">Canon EOS R5 • 15/12/2024 10:30</small>
                            </div>
                            <div class="col-md-4 text-end">
                                <span class="badge bg-success me-2"><i class="fas fa-map-marker-alt"></i> GPS</span>
                                <span class="badge bg-info"><i class="fas fa-check"></i> Íntegro</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://via.placeholder.com/150x100/4f46e5/ffffff?text=IMG_001" class="img-fluid rounded mb-3" alt="Imagen">
                                <div class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1" title="Ver imagen">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Descargar EXIF">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Información de Cámara</h6>
                                        <table class="table table-sm">
                                            <tr><td><strong>Fabricante:</strong></td><td>Canon</td></tr>
                                            <tr><td><strong>Modelo:</strong></td><td>EOS R5</td></tr>
                                            <tr><td><strong>Software:</strong></td><td>Adobe Lightroom 6.0</td></tr>
                                            <tr><td><strong>Fecha:</strong></td><td>2024:12:15 10:30:45</td></tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Configuración de Captura</h6>
                                        <table class="table table-sm">
                                            <tr><td><strong>ISO:</strong></td><td>400</td></tr>
                                            <tr><td><strong>Apertura:</strong></td><td>f/2.8</td></tr>
                                            <tr><td><strong>Velocidad:</strong></td><td>1/250s</td></tr>
                                            <tr><td><strong>Focal:</strong></td><td>85mm</td></tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Ubicación GPS</h6>
                                        <p class="small mb-0">
                                            <i class="fas fa-map-marker-alt text-success me-1"></i>
                                            Lat: -12.0464, Lon: -77.0428<br>
                                            <small class="text-muted">Lima, Perú</small>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Estado de Integridad</h6>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-shield-alt text-success me-2"></i>
                                            <span class="text-success">EXIF íntegro - Sin modificaciones</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mb-4">
                <div class="card-modern">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="mb-0">EX_002 - IMG_002.png</h6>
                                <small class="text-muted">iPhone 14 Pro • 15/12/2024 14:15</small>
                            </div>
                            <div class="col-md-4 text-end">
                                <span class="badge bg-danger me-2"><i class="fas fa-times"></i> Sin GPS</span>
                                <span class="badge bg-warning"><i class="fas fa-exclamation-triangle"></i> Modificado</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://via.placeholder.com/150x100/059669/ffffff?text=IMG_002" class="img-fluid rounded mb-3" alt="Imagen">
                                <div class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1" title="Ver imagen">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Descargar EXIF">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Información de Dispositivo</h6>
                                        <table class="table table-sm">
                                            <tr><td><strong>Fabricante:</strong></td><td>Apple</td></tr>
                                            <tr><td><strong>Modelo:</strong></td><td>iPhone 14 Pro</td></tr>
                                            <tr><td><strong>Software:</strong></td><td>iOS 16.1.2</td></tr>
                                            <tr><td><strong>Fecha:</strong></td><td>2024:12:15 14:15:22</td></tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Configuración de Captura</h6>
                                        <table class="table table-sm">
                                            <tr><td><strong>ISO:</strong></td><td>64</td></tr>
                                            <tr><td><strong>Apertura:</strong></td><td>f/1.78</td></tr>
                                            <tr><td><strong>Velocidad:</strong></td><td>1/120s</td></tr>
                                            <tr><td><strong>Focal:</strong></td><td>6.86mm</td></tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Ubicación GPS</h6>
                                        <p class="small mb-0">
                                            <i class="fas fa-times text-danger me-1"></i>
                                            Datos GPS eliminados<br>
                                            <small class="text-muted">Información de ubicación no disponible</small>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Estado de Integridad</h6>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                                            <span class="text-warning">EXIF modificado - Metadatos alterados</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mb-4">
                <div class="card-modern">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="mb-0">EX_003 - IMG_003.jpg</h6>
                                <small class="text-muted">Sony A7R IV • 14/12/2024 16:45</small>
                            </div>
                            <div class="col-md-4 text-end">
                                <span class="badge bg-success me-2"><i class="fas fa-map-marker-alt"></i> GPS</span>
                                <span class="badge bg-info"><i class="fas fa-check"></i> Íntegro</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://via.placeholder.com/150x100/dc2626/ffffff?text=IMG_003" class="img-fluid rounded mb-3" alt="Imagen">
                                <div class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1" title="Ver imagen">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Descargar EXIF">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Información de Cámara</h6>
                                        <table class="table table-sm">
                                            <tr><td><strong>Fabricante:</strong></td><td>Sony</td></tr>
                                            <tr><td><strong>Modelo:</strong></td><td>ILCE-7RM4</td></tr>
                                            <tr><td><strong>Software:</strong></td><td>ILCE-7RM4 v3.10</td></tr>
                                            <tr><td><strong>Fecha:</strong></td><td>2024:12:14 16:45:12</td></tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Configuración de Captura</h6>
                                        <table class="table table-sm">
                                            <tr><td><strong>ISO:</strong></td><td>800</td></tr>
                                            <tr><td><strong>Apertura:</strong></td><td>f/4.0</td></tr>
                                            <tr><td><strong>Velocidad:</strong></td><td>1/60s</td></tr>
                                            <tr><td><strong>Focal:</strong></td><td>24mm</td></tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Ubicación GPS</h6>
                                        <p class="small mb-0">
                                            <i class="fas fa-map-marker-alt text-success me-1"></i>
                                            Lat: -11.9129, Lon: -77.0285<br>
                                            <small class="text-muted">Miraflores, Lima, Perú</small>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Estado de Integridad</h6>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-shield-alt text-success me-2"></i>
                                            <span class="text-success">EXIF íntegro - Sin modificaciones</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Resumen técnico -->
        <div class="card-modern mt-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Resumen Técnico</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-2">
                        <h4 class="text-primary mb-1">142</h4>
                        <small class="text-muted">Total EXIF</small>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-success mb-1">89</h4>
                        <small class="text-muted">Con GPS</small>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-info mb-1">119</h4>
                        <small class="text-muted">Íntegros</small>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-warning mb-1">23</h4>
                        <small class="text-muted">Modificados</small>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-secondary mb-1">45</h4>
                        <small class="text-muted">Canon</small>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-dark mb-1">32</h4>
                        <small class="text-muted">Sony</small>
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