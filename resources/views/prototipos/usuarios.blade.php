@extends('prototipos.layout')

@section('title', 'Gestión de Usuarios')
@section('subtitle', 'Administra usuarios del sistema de verificación de imágenes')

@section('content')
<div class="row">
    <!-- Sidebar de navegación -->
    <div class="col-md-3">
        <div class="sidebar-nav">
            <h5 class="mb-3"><i class="fas fa-users text-primary me-2"></i>Usuarios</h5>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern active">
                    <i class="fas fa-list me-2"></i>Lista de Usuarios
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-plus me-2"></i>Nuevo Usuario
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-user-shield me-2"></i>Roles y Permisos
                </a>
            </div>
        </div>
        
        <!-- Estadísticas rápidas -->
        <div class="card-modern">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Estadísticas</h6>
                <div class="d-flex justify-content-between mb-2">
                    <span>Usuarios Activos</span>
                    <span class="badge bg-success">24</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Usuarios Inactivos</span>
                    <span class="badge bg-danger">3</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Total</span>
                    <span class="badge bg-primary">27</span>
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
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar usuarios...">
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-primary-modern btn-modern me-2">
                            <i class="fas fa-plus me-2"></i>Nuevo Usuario
                        </button>
                        <button class="btn btn-outline-secondary btn-modern">
                            <i class="fas fa-download me-2"></i>Exportar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tabla de usuarios -->
        <div class="card-modern">
            <div class="table-responsive">
                <table class="table table-modern mb-0">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Información</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Último Acceso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-primary text-white me-3" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        JD
                                    </div>
                                    <div>
                                        <strong>john.doe</strong>
                                        <br><small class="text-muted">john.doe@empresa.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>John Doe</strong>
                                <br><small class="text-muted">Departamento de Seguridad</small>
                            </td>
                            <td><span class="badge bg-info">Administrador</span></td>
                            <td><span class="status-badge status-active">Activo</span></td>
                            <td>
                                <small>Hace 2 horas</small>
                                <br><small class="text-muted">15/12/2024 14:30</small>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Desactivar">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-success text-white me-3" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        MS
                                    </div>
                                    <div>
                                        <strong>maria.silva</strong>
                                        <br><small class="text-muted">maria.silva@empresa.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>María Silva</strong>
                                <br><small class="text-muted">Analista Forense</small>
                            </td>
                            <td><span class="badge bg-warning">Analista</span></td>
                            <td><span class="status-badge status-active">Activo</span></td>
                            <td>
                                <small>Hace 1 día</small>
                                <br><small class="text-muted">14/12/2024 09:15</small>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Desactivar">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-secondary text-white me-3" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        CL
                                    </div>
                                    <div>
                                        <strong>carlos.lopez</strong>
                                        <br><small class="text-muted">carlos.lopez@empresa.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>Carlos López</strong>
                                <br><small class="text-muted">Investigador</small>
                            </td>
                            <td><span class="badge bg-secondary">Usuario</span></td>
                            <td><span class="status-badge status-inactive">Inactivo</span></td>
                            <td>
                                <small>Hace 1 semana</small>
                                <br><small class="text-muted">08/12/2024 16:45</small>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" title="Reactivar">
                                    <i class="fas fa-check"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Mostrando 3 de 27 usuarios</small>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
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
    </div>
</div>
@endsection