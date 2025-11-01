@extends('prototipos.layout')

@section('title', 'Gestión de Imágenes')
@section('subtitle', 'Administra y analiza imágenes del sistema forense')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="sidebar-nav">
            <h5 class="mb-3"><i class="fas fa-images text-primary me-2"></i>Imágenes</h5>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern active">
                    <i class="fas fa-th-large me-2"></i>Galería
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-upload me-2"></i>Subir Imagen
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-filter me-2"></i>Filtros
                </a>
            </div>
        </div>
        
        <div class="card-modern">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Estadísticas</h6>
                <div class="d-flex justify-content-between mb-2">
                    <span>Total Imágenes</span>
                    <span class="badge bg-primary">156</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Procesadas</span>
                    <span class="badge bg-success">142</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>En Proceso</span>
                    <span class="badge bg-warning">8</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Con Errores</span>
                    <span class="badge bg-danger">6</span>
                </div>
            </div>
        </div>
        
        <!-- Filtros -->
        <div class="card-modern mt-3">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Filtros</h6>
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select class="form-select form-select-sm">
                        <option>Todos</option>
                        <option>Subida</option>
                        <option>Procesando</option>
                        <option>Completada</option>
                        <option>Error</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select form-select-sm">
                        <option>Todos</option>
                        <option>JPEG</option>
                        <option>PNG</option>
                        <option>WEBP</option>
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
                            <input type="text" class="form-control" placeholder="Buscar imágenes...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-secondary active" title="Vista de galería">
                                <i class="fas fa-th"></i>
                            </button>
                            <button class="btn btn-outline-secondary" title="Vista de lista">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary-modern btn-modern">
                            <i class="fas fa-upload me-2"></i>Subir Imagen
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Galería de imágenes -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card-modern">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/300x200/4f46e5/ffffff?text=IMG_001.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="status-badge status-active">Completada</span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-2">
                            <span class="badge bg-dark bg-opacity-75">2.4 MB</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">IMG_001.jpg</h6>
                        <p class="card-text text-muted small">
                            <i class="fas fa-user me-1"></i>john.doe<br>
                            <i class="fas fa-calendar me-1"></i>15/12/2024 10:30<br>
                            <i class="fas fa-camera me-1"></i>Canon EOS R5
                        </p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-success" title="Analizar">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-info" title="Descargar">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card-modern">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/300x200/059669/ffffff?text=IMG_002.png" class="card-img-top" alt="Imagen 2">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="status-badge status-pending">Procesando</span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-2">
                            <span class="badge bg-dark bg-opacity-75">1.8 MB</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">IMG_002.png</h6>
                        <p class="card-text text-muted small">
                            <i class="fas fa-user me-1"></i>maria.silva<br>
                            <i class="fas fa-calendar me-1"></i>15/12/2024 14:15<br>
                            <i class="fas fa-mobile me-1"></i>iPhone 14 Pro
                        </p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-warning" title="En proceso" disabled>
                                <i class="fas fa-spinner fa-spin"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-info" title="Descargar">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card-modern">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/300x200/dc2626/ffffff?text=IMG_003.jpg" class="card-img-top" alt="Imagen 3">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="status-badge status-inactive">Error</span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-2">
                            <span class="badge bg-dark bg-opacity-75">3.1 MB</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">IMG_003.jpg</h6>
                        <p class="card-text text-muted small">
                            <i class="fas fa-user me-1"></i>carlos.lopez<br>
                            <i class="fas fa-calendar me-1"></i>14/12/2024 16:45<br>
                            <i class="fas fa-camera me-1"></i>Sony A7R IV
                        </p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-warning" title="Reintentar">
                                <i class="fas fa-redo"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-info" title="Descargar">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card-modern">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/300x200/7c3aed/ffffff?text=IMG_004.webp" class="card-img-top" alt="Imagen 4">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="status-badge status-active">Completada</span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-2">
                            <span class="badge bg-dark bg-opacity-75">1.2 MB</span>
                        </div>
                        <div class="position-absolute top-0 start-0 m-2">
                            <span class="badge bg-warning"><i class="fas fa-exclamation-triangle"></i> Sospechosa</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">IMG_004.webp</h6>
                        <p class="card-text text-muted small">
                            <i class="fas fa-user me-1"></i>ana.martinez<br>
                            <i class="fas fa-calendar me-1"></i>13/12/2024 11:20<br>
                            <i class="fas fa-camera me-1"></i>Nikon D850
                        </p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-success" title="Ver análisis">
                                <i class="fas fa-chart-line"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-info" title="Descargar">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
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