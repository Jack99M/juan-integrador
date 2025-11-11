@extends('layouts.adminlte')

@section('title', 'Listado de Imágenes')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-images"></i> Lista de Imágenes</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Nueva Imagen
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
                        <th style="width: 12%;"><i class="fas fa-code"></i> Código</th>
                        <th style="width: 15%;"><i class="fas fa-user"></i> Usuario</th>
                        <th style="width: 20%;"><i class="fas fa-file-image"></i> Nombre Original</th>
                        <th style="width: 12%;"><i class="fas fa-info-circle"></i> Estado</th>
                        <th style="width: 15%;"><i class="fas fa-calendar-plus"></i> Fecha Subida</th>
                        <th style="width: 8%;"><i class="fas fa-eye"></i> Archivo</th>
                        <th style="width: 8%;"><i class="fas fa-circle"></i> Estado</th>
                        <th style="width: 10%;"><i class="fas fa-cogs"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imagenes as $imagen)
                        <tr class="{{ $imagen->activo ? '' : 'table-secondary' }}">
                            <td><code>{{ $imagen->cod_imagen }}</code></td>
                            <td>{{ $imagen->usuario->nombre ?? 'Sin usuario' }}</td>
                            <td>{{ $imagen->nombre_original }}</td>
                            <td>
                                <span class="badge badge-info">{{ ucfirst($imagen->estado) }}</span>
                            </td>
                            <td>
                                <small class="text-muted">
                                    <i class="fas fa-calendar"></i> {{ $imagen->created_at->format('d/m/Y') }}<br>
                                    <i class="fas fa-clock"></i> {{ $imagen->created_at->format('H:i') }}
                                </small>
                            </td>
                            <td>
                                @if($imagen->ruta_almacenamiento)
                                    <a href="{{ asset('storage/' . $imagen->ruta_almacenamiento) }}" target="_blank" class="btn btn-info btn-xs">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @else
                                    <span class="text-muted">Sin archivo</span>
                                @endif
                            </td>
                            <td>
                                @if($imagen->activo)
                                    <span class="badge badge-success"><i class="fas fa-check"></i> Activo</span>
                                @else
                                    <span class="badge badge-secondary"><i class="fas fa-times"></i> Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning btn-sm" title="Editar" 
                                            onclick="editImagen({{ $imagen->id }}, '{{ $imagen->cod_imagen }}', {{ $imagen->usuario_id }}, '{{ $imagen->nombre_original }}', '{{ $imagen->estado }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    @if($imagen->activo)
                                        <button type="button" class="btn btn-danger btn-sm" title="Desactivar" 
                                                onclick="confirmDeactivate({{ $imagen->id }}, '{{ $imagen->nombre_original }}', 'imagenes')">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    @else
                                        <form action="{{ route('imagenes.reactivar', $imagen->id) }}" method="POST" class="d-inline">
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
                <h4 class="modal-title"><i class="fas fa-plus"></i> Nueva Imagen</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Código Imagen</label>
                                <input type="text" name="cod_imagen" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Usuario</label>
                                <select name="usuario_id" class="form-control" required>
                                    <option value="">Seleccionar usuario</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Archivo de Imagen</label>
                                <input type="file" name="imagen_archivo" class="form-control-file" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="subida">Subida</option>
                                    <option value="en_cola">En Cola</option>
                                    <option value="procesando">Procesando</option>
                                    <option value="terminado">Terminado</option>
                                    <option value="error">Error</option>
                                </select>
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
                <h4 class="modal-title"><i class="fas fa-edit"></i> Editar Imagen</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Código Imagen</label>
                                <input type="text" id="edit_cod_imagen" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Usuario</label>
                                <select name="usuario_id" id="edit_usuario_id" class="form-control" required>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre Original</label>
                                <input type="text" name="nombre_original" id="edit_nombre_original" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" id="edit_estado" class="form-control" required>
                                    <option value="subida">Subida</option>
                                    <option value="en_cola">En Cola</option>
                                    <option value="procesando">Procesando</option>
                                    <option value="terminado">Terminado</option>
                                    <option value="error">Error</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nuevo Archivo (opcional)</label>
                        <input type="file" name="imagen_archivo" class="form-control-file" accept="image/*">
                        <small class="text-muted">Dejar vacío para mantener el archivo actual</small>
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
function editImagen(id, codigo, usuarioId, nombreOriginal, estado) {
    document.getElementById('editForm').action = '/imagenes/' + id;
    document.getElementById('edit_cod_imagen').value = codigo;
    document.getElementById('edit_usuario_id').value = usuarioId;
    document.getElementById('edit_nombre_original').value = nombreOriginal;
    document.getElementById('edit_estado').value = estado;
    $('#editModal').modal('show');
}

function confirmDeactivate(id, name, module) {
    document.getElementById('deactivateForm').action = '/' + module + '/' + id;
    document.getElementById('deactivateItemName').textContent = name;
    $('#deactivateModal').modal('show');
}
</script>
@endsection
