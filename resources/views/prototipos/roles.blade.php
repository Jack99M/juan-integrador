@extends('prototipos.layout')

@section('title', 'Gestión de Roles')
@section('subtitle', 'Administra roles y permisos del sistema')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="sidebar-nav">
            <h5 class="mb-3"><i class="fas fa-user-shield text-primary me-2"></i>Roles</h5>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern active">
                    <i class="fas fa-list me-2"></i>Lista de Roles
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-plus me-2"></i>Nuevo Rol
                </a>
            </div>
            <div class="nav-item-modern">
                <a href="#" class="nav-link-modern">
                    <i class="fas fa-key me-2"></i>Permisos
                </a>
            </div>
        </div>
        
        <div class="card-modern">
            <div class="card-body">
                <h6 class="card-title text-muted mb-3">Resumen</h6>
                <div class="d-flex justify-content-between mb-2">
                    <span>Roles Activos</span>
                    <span class="badge bg-success">5</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Roles Inactivos</span>
                    <span class="badge bg-danger">1</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Total Usuarios</span>
                    <span class="badge bg-info">27</span>
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
                            <input type="text" class="form-control" placeholder="Buscar roles...">
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-primary-modern btn-modern">
                            <i class="fas fa-plus me-2"></i>Nuevo Rol
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Grid de roles -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card-modern h-100">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-crown me-2"></i>Administrador</h5>
                            <span class="status-badge bg-light text-dark">Activo</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Control total del sistema, gestión de usuarios y configuraciones.</p>
                        <div class="mb-3">
                            <small class="text-muted">Usuarios asignados:</small>
                            <div class="d-flex align-items-center mt-1">
                                <div class="avatar-circle bg-primary text-white me-2" style="width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px;">JD</div>
                                <div class="avatar-circle bg-success text-white me-2" style="width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px;">AM</div>
                                <span class="badge bg-secondary">+2 más</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">4 usuarios</small>
                            <div>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="Ver permisos">
                                    <i class="fas fa-key"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card-modern h-100">
                    <div class="card-header bg-warning text-dark">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-search me-2"></i>Analista</h5>
                            <span class="status-badge bg-light text-dark">Activo</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Análisis de imágenes, generación de reportes y verificación forense.</p>
                        <div class="mb-3">
                            <small class="text-muted">Usuarios asignados:</small>
                            <div class="d-flex align-items-center mt-1">
                                <div class="avatar-circle bg-warning text-dark me-2" style="width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px;">MS</div>
                                <div class="avatar-circle bg-info text-white me-2" style="width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px;">LR</div>
                                <span class="badge bg-secondary">+8 más</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">10 usuarios</small>
                            <div>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="Ver permisos">
                                    <i class="fas fa-key"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card-modern h-100">
                    <div class="card-header bg-info text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-user me-2"></i>Usuario</h5>
                            <span class="status-badge bg-light text-dark">Activo</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Acceso básico para subir imágenes y consultar resultados.</p>
                        <div class="mb-3">
                            <small class="text-muted">Usuarios asignados:</small>
                            <div class="d-flex align-items-center mt-1">
                                <div class="avatar-circle bg-secondary text-white me-2" style="width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px;">CL</div>
                                <div class="avatar-circle bg-dark text-white me-2" style="width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px;">PG</div>
                                <span class="badge bg-secondary">+11 más</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">13 usuarios</small>
                            <div>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="Ver permisos">
                                    <i class="fas fa-key"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card-modern h-100 opacity-75">
                    <div class="card-header bg-secondary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Observador</h5>
                            <span class="status-badge status-inactive">Inactivo</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Solo lectura de reportes y análisis existentes.</p>
                        <div class="mb-3">
                            <small class="text-muted">Usuarios asignados:</small>
                            <div class="d-flex align-items-center mt-1">
                                <span class="text-muted">Sin usuarios asignados</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">0 usuarios</small>
                            <div>
                                <button class="btn btn-sm btn-outline-success me-1" title="Reactivar">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="Ver permisos">
                                    <i class="fas fa-key"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tabla de permisos -->
        <div class="card-modern mt-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-key me-2"></i>Matriz de Permisos</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-modern mb-0">
                    <thead>
                        <tr>
                            <th>Módulo</th>
                            <th>Administrador</th>
                            <th>Analista</th>
                            <th>Usuario</th>
                            <th>Observador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Usuarios</strong></td>
                            <td><i class="fas fa-check text-success"></i> Total</td>
                            <td><i class="fas fa-times text-danger"></i> Sin acceso</td>
                            <td><i class="fas fa-times text-danger"></i> Sin acceso</td>
                            <td><i class="fas fa-times text-danger"></i> Sin acceso</td>
                        </tr>
                        <tr>
                            <td><strong>Imágenes</strong></td>
                            <td><i class="fas fa-check text-success"></i> Total</td>
                            <td><i class="fas fa-check text-success"></i> Total</td>
                            <td><i class="fas fa-eye text-info"></i> Solo lectura</td>
                            <td><i class="fas fa-eye text-info"></i> Solo lectura</td>
                        </tr>
                        <tr>
                            <td><strong>Análisis</strong></td>
                            <td><i class="fas fa-check text-success"></i> Total</td>
                            <td><i class="fas fa-check text-success"></i> Total</td>
                            <td><i class="fas fa-plus text-warning"></i> Crear/Ver</td>
                            <td><i class="fas fa-eye text-info"></i> Solo lectura</td>
                        </tr>
                        <tr>
                            <td><strong>Reportes</strong></td>
                            <td><i class="fas fa-check text-success"></i> Total</td>
                            <td><i class="fas fa-check text-success"></i> Total</td>
                            <td><i class="fas fa-eye text-info"></i> Solo lectura</td>
                            <td><i class="fas fa-eye text-info"></i> Solo lectura</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection