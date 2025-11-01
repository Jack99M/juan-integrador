@extends('prototipos.layout')

@section('title', 'Prototipos JOTA Verificador')
@section('subtitle', 'Navegación de prototipos visuales para los 6 CRUDs del sistema')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="alert alert-info">
            <h5><i class="fas fa-info-circle me-2"></i>Prototipos Visuales</h5>
            <p class="mb-0">Estos son prototipos estéticos no funcionales para visualizar el diseño de cada módulo CRUD del sistema JOTA Verificador.</p>
        </div>
    </div>
</div>

<div class="row">
    <!-- Usuarios -->
    <div class="col-md-6 mb-4">
        <div class="card-modern h-100">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i>Gestión de Usuarios</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Administración completa de usuarios del sistema, roles, permisos y estados de activación.</p>
                <div class="mb-3">
                    <h6 class="text-muted mb-2">Características:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Lista con avatares y información detallada</li>
                        <li><i class="fas fa-check text-success me-2"></i>Filtros y búsqueda avanzada</li>
                        <li><i class="fas fa-check text-success me-2"></i>Estadísticas en tiempo real</li>
                        <li><i class="fas fa-check text-success me-2"></i>Activación/desactivación de usuarios</li>
                    </ul>
                </div>
                <a href="{{ route('prototipos.usuarios') }}" class="btn btn-primary-modern btn-modern w-100">
                    <i class="fas fa-eye me-2"></i>Ver Prototipo
                </a>
            </div>
        </div>
    </div>
    
    <!-- Roles -->
    <div class="col-md-6 mb-4">
        <div class="card-modern h-100">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="fas fa-user-shield me-2"></i>Gestión de Roles</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Sistema de roles y permisos con matriz de accesos y asignación de usuarios por rol.</p>
                <div class="mb-3">
                    <h6 class="text-muted mb-2">Características:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Vista de tarjetas por rol</li>
                        <li><i class="fas fa-check text-success me-2"></i>Matriz de permisos visual</li>
                        <li><i class="fas fa-check text-success me-2"></i>Usuarios asignados por rol</li>
                        <li><i class="fas fa-check text-success me-2"></i>Estadísticas de distribución</li>
                    </ul>
                </div>
                <a href="{{ route('prototipos.roles') }}" class="btn btn-primary-modern btn-modern w-100">
                    <i class="fas fa-eye me-2"></i>Ver Prototipo
                </a>
            </div>
        </div>
    </div>
    
    <!-- Imágenes -->
    <div class="col-md-6 mb-4">
        <div class="card-modern h-100">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-images me-2"></i>Gestión de Imágenes</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Galería visual de imágenes con estados de procesamiento y herramientas de análisis.</p>
                <div class="mb-3">
                    <h6 class="text-muted mb-2">Características:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Vista de galería moderna</li>
                        <li><i class="fas fa-check text-success me-2"></i>Estados visuales de procesamiento</li>
                        <li><i class="fas fa-check text-success me-2"></i>Filtros por tipo y estado</li>
                        <li><i class="fas fa-check text-success me-2"></i>Información técnica de cada imagen</li>
                    </ul>
                </div>
                <a href="{{ route('prototipos.imagenes') }}" class="btn btn-primary-modern btn-modern w-100">
                    <i class="fas fa-eye me-2"></i>Ver Prototipo
                </a>
            </div>
        </div>
    </div>
    
    <!-- Análisis -->
    <div class="col-md-6 mb-4">
        <div class="card-modern h-100">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-search-plus me-2"></i>Análisis Forense</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Resultados de análisis forense con niveles de confianza y verificaciones técnicas.</p>
                <div class="mb-3">
                    <h6 class="text-muted mb-2">Características:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Resultados con porcentajes de confianza</li>
                        <li><i class="fas fa-check text-success me-2"></i>Indicadores de verificación técnica</li>
                        <li><i class="fas fa-check text-success me-2"></i>Gráficos de distribución</li>
                        <li><i class="fas fa-check text-success me-2"></i>Estados de procesamiento en tiempo real</li>
                    </ul>
                </div>
                <a href="{{ route('prototipos.analisis') }}" class="btn btn-primary-modern btn-modern w-100">
                    <i class="fas fa-eye me-2"></i>Ver Prototipo
                </a>
            </div>
        </div>
    </div>
    
    <!-- Reportes -->
    <div class="col-md-6 mb-4">
        <div class="card-modern h-100">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Gestión de Reportes</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Sistema de reportes técnicos y ejecutivos con generación automática de documentos.</p>
                <div class="mb-3">
                    <h6 class="text-muted mb-2">Características:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Vista de tarjetas por reporte</li>
                        <li><i class="fas fa-check text-success me-2"></i>Diferentes tipos de reporte</li>
                        <li><i class="fas fa-check text-success me-2"></i>Estados y prioridades</li>
                        <li><i class="fas fa-check text-success me-2"></i>Estadísticas de generación</li>
                    </ul>
                </div>
                <a href="{{ route('prototipos.reportes') }}" class="btn btn-primary-modern btn-modern w-100">
                    <i class="fas fa-eye me-2"></i>Ver Prototipo
                </a>
            </div>
        </div>
    </div>
    
    <!-- Datos EXIF -->
    <div class="col-md-6 mb-4">
        <div class="card-modern h-100">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0"><i class="fas fa-camera me-2"></i>Datos EXIF</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Análisis detallado de metadatos EXIF con información técnica y de integridad.</p>
                <div class="mb-3">
                    <h6 class="text-muted mb-2">Características:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Información técnica detallada</li>
                        <li><i class="fas fa-check text-success me-2"></i>Verificación de integridad</li>
                        <li><i class="fas fa-check text-success me-2"></i>Datos GPS y ubicación</li>
                        <li><i class="fas fa-check text-success me-2"></i>Estadísticas por marca de cámara</li>
                    </ul>
                </div>
                <a href="{{ route('prototipos.datos-exif') }}" class="btn btn-primary-modern btn-modern w-100">
                    <i class="fas fa-eye me-2"></i>Ver Prototipo
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Información técnica -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card-modern">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-code me-2"></i>Información Técnica</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Tecnologías Utilizadas</h6>
                        <ul class="list-unstyled">
                            <li><i class="fab fa-bootstrap text-primary me-2"></i>Bootstrap 5.3.0</li>
                            <li><i class="fas fa-icons text-info me-2"></i>Font Awesome 6.4.0</li>
                            <li><i class="fas fa-palette text-success me-2"></i>CSS3 Custom Properties</li>
                            <li><i class="fas fa-mobile-alt text-warning me-2"></i>Diseño Responsivo</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Características del Diseño</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-paint-brush text-primary me-2"></i>Gradientes modernos</li>
                            <li><i class="fas fa-layer-group text-info me-2"></i>Efectos de profundidad</li>
                            <li><i class="fas fa-magic text-success me-2"></i>Animaciones suaves</li>
                            <li><i class="fas fa-eye text-warning me-2"></i>Interfaz intuitiva</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection