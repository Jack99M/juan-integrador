@extends('layouts.adminlte')

@section('title', 'Listado de Usuarios')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-users"></i> Lista de Usuarios</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                    <i class="fas fa-plus"></i> Nuevo Usuario
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
                            <th style="width: 30%;"><i class="fas fa-user"></i> Nombre Completo</th>
                            <th style="width: 25%;"><i class="fas fa-envelope"></i> Email</th>
                            <th style="width: 15%;"><i class="fas fa-user-shield"></i> Rol</th>
                            <th style="width: 10%;"><i class="fas fa-circle"></i> Estado</th>
                            <th style="width: 5%;"><i class="fas fa-cogs"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr class="{{ $usuario->activo ? '' : 'table-secondary' }}">
                                <td><code>{{ $usuario->cod_usuario }}</code></td>
                                <td>{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->rol->nombre ?? '-' }}</td>
                                <td>
                                    @if($usuario->activo)
                                        <span class="badge badge-success"><i class="fas fa-check"></i> Activo</span>
                                    @else
                                        <span class="badge badge-secondary"><i class="fas fa-times"></i> Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-warning btn-sm" title="Editar" 
                                                onclick="editUsuario({{ $usuario->id }}, '{{ $usuario->cod_usuario }}', '{{ $usuario->nombre }}', '{{ $usuario->apellido_paterno }}', '{{ $usuario->apellido_materno }}', '{{ $usuario->email }}', '{{ $usuario->organizacion }}', {{ $usuario->rol_id ?? 'null' }})">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        @if($usuario->activo)
                                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Desactivar" onclick="return confirm('¿Está seguro de desactivar este usuario?')">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('usuarios.reactivar', $usuario->id) }}" method="POST" class="d-inline">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--primary-gradient); color: white;">
                <h4 class="modal-title"><i class="fas fa-plus"></i> Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Código Usuario</label>
                                <input type="text" name="cod_usuario" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rol</label>
                                <select name="rol_id" class="form-control">
                                    <option value="">Seleccionar rol</option>
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" name="apellido_materno" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Organización</label>
                                <input type="text" name="organizacion" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--warning-gradient); color: white;">
                <h4 class="modal-title"><i class="fas fa-edit"></i> Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Código Usuario</label>
                                <input type="text" id="edit_cod_usuario" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rol</label>
                                <select name="rol_id" id="edit_rol_id" class="form-control">
                                    <option value="">Seleccionar rol</option>
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" id="edit_nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" id="edit_apellido_paterno" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" name="apellido_materno" id="edit_apellido_materno" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="edit_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Organización</label>
                                <input type="text" name="organizacion" id="edit_organizacion" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nueva Contraseña (opcional)</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
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

<script>
function editUsuario(id, codigo, nombre, apellidoP, apellidoM, email, organizacion, rolId) {
    document.getElementById('editForm').action = '/usuarios/' + id;
    document.getElementById('edit_cod_usuario').value = codigo;
    document.getElementById('edit_nombre').value = nombre;
    document.getElementById('edit_apellido_paterno').value = apellidoP;
    document.getElementById('edit_apellido_materno').value = apellidoM || '';
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_organizacion').value = organizacion || '';
    document.getElementById('edit_rol_id').value = rolId || '';
    $('#editModal').modal('show');
}
</script>
@endsection
