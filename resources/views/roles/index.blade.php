@extends('layouts.adminlte')

@section('title', 'Listado de Roles')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-users-cog"></i> Lista de Roles</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                    <i class="fas fa-plus"></i> Nuevo Rol
                </button>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i> {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 15%;"><i class="fas fa-code"></i> Código</th>
                            <th style="width: 25%;"><i class="fas fa-tag"></i> Nombre</th>
                            <th style="width: 40%;"><i class="fas fa-info-circle"></i> Descripción</th>
                            <th style="width: 10%;"><i class="fas fa-circle"></i> Estado</th>
                            <th style="width: 10%;"><i class="fas fa-cogs"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $rol)
                            <tr class="{{ $rol->activo ? '' : 'table-secondary' }}">
                                <td><code>{{ $rol->cod_rol }}</code></td>
                                <td>{{ $rol->nombre }}</td>
                                <td>{{ $rol->descripcion }}</td>
                                <td>
                                    @if($rol->activo)
                                        <span class="badge badge-success"><i class="fas fa-check"></i> Activo</span>
                                    @else
                                        <span class="badge badge-secondary"><i class="fas fa-times"></i> Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-warning btn-sm" title="Editar" 
                                                onclick="editRol({{ $rol->id }}, '{{ $rol->cod_rol }}', '{{ $rol->nombre }}', '{{ addslashes($rol->descripcion) }}')">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        @if($rol->activo)
                                            <button type="button" class="btn btn-danger btn-sm" title="Desactivar" 
                                                    onclick="confirmDeactivate({{ $rol->id }}, '{{ $rol->nombre }}', 'roles')">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        @else
                                            <form action="{{ route('roles.reactivar', $rol) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm" title="Reactivar">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Modal Crear -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--primary-gradient); color: white;">
                <h4 class="modal-title"><i class="fas fa-plus"></i> Nuevo Rol</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label><i class="fas fa-code"></i> Código Rol</label>
                        <input type="text" name="cod_rol" class="form-control" placeholder="Ingrese el código" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-tag"></i> Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-info-circle"></i> Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripción del rol"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--warning-gradient); color: white;">
                <h4 class="modal-title"><i class="fas fa-edit"></i> Editar Rol</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label><i class="fas fa-code"></i> Código Rol</label>
                        <input type="text" id="edit_cod_rol" class="form-control" readonly>
                        <small class="text-muted">El código no se puede modificar</small>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-tag"></i> Nombre</label>
                        <input type="text" name="nombre" id="edit_nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-info-circle"></i> Descripción</label>
                        <textarea name="descripcion" id="edit_descripcion" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Desactivar -->
<div class="modal fade" id="deactivateModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--danger-gradient); color: white;">
                <h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Confirmar Desactivación</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-ban fa-3x text-danger mb-3"></i>
                <h5>¿Está seguro de desactivar este registro?</h5>
                <p class="text-muted mb-0" id="deactivateItemName"></p>
                <small class="text-warning">Esta acción se puede revertir posteriormente</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <form id="deactivateForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-ban"></i> Desactivar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function editRol(id, codigo, nombre, descripcion) {
    document.getElementById('editForm').action = '/roles/' + id;
    document.getElementById('edit_cod_rol').value = codigo;
    document.getElementById('edit_nombre').value = nombre;
    document.getElementById('edit_descripcion').value = descripcion;
    $('#editModal').modal('show');
}

function confirmDeactivate(id, name, module) {
    document.getElementById('deactivateForm').action = '/' + module + '/' + id;
    document.getElementById('deactivateItemName').textContent = name;
    $('#deactivateModal').modal('show');
}
</script>
@endsection
