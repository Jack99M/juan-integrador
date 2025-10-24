@extends('layouts.adminlte')

@section('title', 'Reportes')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-file-alt"></i> Lista de Reportes</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Nuevo Reporte
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
                        <th style="width: 25%;"><i class="fas fa-code"></i> Código Reporte</th>
                        <th style="width: 25%;"><i class="fas fa-image"></i> Imagen</th>
                        <th style="width: 25%;"><i class="fas fa-user"></i> Usuario</th>
                        <th style="width: 15%;"><i class="fas fa-circle"></i> Estado</th>
                        <th style="width: 10%;"><i class="fas fa-cogs"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportes as $reporte)
                        <tr class="{{ $reporte->activo ? '' : 'table-secondary' }}">
                            <td><code>{{ $reporte->cod_reporte }}</code></td>
                            <td>{{ $reporte->imagen->cod_imagen ?? '-' }}</td>
                            <td>{{ $reporte->usuario->nombre ?? '-' }}</td>
                            <td>
                                @if($reporte->activo)
                                    <span class="badge badge-success"><i class="fas fa-check"></i> Activo</span>
                                @else
                                    <span class="badge badge-secondary"><i class="fas fa-times"></i> Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning btn-sm" title="Editar" 
                                            onclick="editReporte({{ $reporte->id }}, '{{ $reporte->cod_reporte }}', {{ $reporte->imagen_id }}, {{ $reporte->usuario_id ?? 'null' }})">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    @if($reporte->activo)
                                        <form action="{{ route('reportes.destroy', $reporte) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Desactivar" onclick="return confirm('¿Está seguro de desactivar este reporte?')">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('reportes.reactivar', $reporte->id) }}" method="POST" class="d-inline">
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
                <h4 class="modal-title"><i class="fas fa-plus"></i> Nuevo Reporte</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('reportes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Código Reporte</label>
                        <input type="text" name="cod_reporte" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <select name="imagen_id" class="form-control" required>
                            <option value="">Seleccionar imagen</option>
                            @foreach($imagenes as $imagen)
                                <option value="{{ $imagen->id }}">{{ $imagen->cod_imagen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <select name="usuario_id" class="form-control">
                            <option value="">Seleccionar usuario</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Archivo PDF</label>
                        <input type="file" name="ruta_pdf" class="form-control-file" accept=".pdf">
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
                <h4 class="modal-title"><i class="fas fa-edit"></i> Editar Reporte</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Código Reporte</label>
                        <input type="text" name="cod_reporte" id="edit_cod_reporte" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <select name="imagen_id" id="edit_imagen_id" class="form-control" required>
                            @foreach($imagenes as $imagen)
                                <option value="{{ $imagen->id }}">{{ $imagen->cod_imagen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <select name="usuario_id" id="edit_usuario_id" class="form-control">
                            <option value="">Seleccionar usuario</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nuevo Archivo PDF (opcional)</label>
                        <input type="file" name="ruta_pdf" class="form-control-file" accept=".pdf">
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

<script>
function editReporte(id, codigo, imagenId, usuarioId) {
    document.getElementById('editForm').action = '/reportes/' + id;
    document.getElementById('edit_cod_reporte').value = codigo;
    document.getElementById('edit_imagen_id').value = imagenId;
    document.getElementById('edit_usuario_id').value = usuarioId || '';
    $('#editModal').modal('show');
}
</script>
@endsection
