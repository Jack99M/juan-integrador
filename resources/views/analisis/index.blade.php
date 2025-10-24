@extends('layouts.adminlte')

@section('title', 'Listado de Análisis')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-chart-line"></i> Análisis</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Nuevo Análisis
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
                        <th style="width: 12%;"><i class="fas fa-image"></i> Imagen</th>
                        <th style="width: 15%;"><i class="fas fa-user"></i> Usuario</th>
                        <th style="width: 15%;"><i class="fas fa-check-circle"></i> Resultado</th>
                        <th style="width: 10%;"><i class="fas fa-percentage"></i> Probabilidad</th>
                        <th style="width: 10%;"><i class="fas fa-info-circle"></i> Estado</th>
                        <th style="width: 8%;"><i class="fas fa-circle"></i> Activo</th>
                        <th style="width: 18%;"><i class="fas fa-cogs"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($analisis as $item)
                        <tr class="{{ $item->activo ? '' : 'table-secondary' }}">
                            <td><code>{{ $item->cod_analisis }}</code></td>
                            <td>{{ $item->imagen->cod_imagen ?? '-' }}</td>
                            <td>{{ $item->usuario->nombre ?? '-' }}</td>
                            <td>
                                @if($item->resultado == 'manipulada')
                                    <span class="badge badge-danger"><i class="fas fa-exclamation-triangle"></i> {{ ucfirst($item->resultado) }}</span>
                                @else
                                    <span class="badge badge-success"><i class="fas fa-check"></i> {{ ucfirst($item->resultado) }}</span>
                                @endif
                            </td>
                            <td>{{ $item->probabilidad ?? '-' }}%</td>
                            <td>
                                <span class="badge badge-info">{{ ucfirst($item->estado) }}</span>
                            </td>
                            <td>
                                @if($item->activo)
                                    <span class="badge badge-success"><i class="fas fa-check"></i> Activo</span>
                                @else
                                    <span class="badge badge-secondary"><i class="fas fa-times"></i> Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning btn-sm" title="Editar" 
                                            onclick="editAnalisis({{ $item->id }}, '{{ $item->cod_analisis }}', {{ $item->imagen_id }}, {{ $item->usuario_id ?? 'null' }}, '{{ $item->resultado }}', {{ $item->probabilidad ?? 'null' }}, '{{ $item->ruta_mapa_calor }}', '{{ $item->estado }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    @if($item->activo)
                                        <form action="{{ route('analisis.destroy', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Desactivar" onclick="return confirm('¿Está seguro de desactivar este análisis?')">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('analisis.reactivar', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm" title="Reactivar">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i> No hay registros de análisis
                            </td>
                        </tr>
                    @endforelse
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
                <h4 class="modal-title"><i class="fas fa-plus"></i> Nuevo Análisis</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('analisis.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Código Análisis</label>
                                <input type="text" name="cod_analisis" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen</label>
                                <select name="imagen_id" class="form-control" required>
                                    <option value="">Seleccionar imagen</option>
                                    @foreach($imagenes as $imagen)
                                        <option value="{{ $imagen->id }}">{{ $imagen->cod_imagen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Usuario</label>
                                <select name="usuario_id" class="form-control">
                                    <option value="">Seleccionar usuario</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Resultado</label>
                                <select name="resultado" class="form-control" required>
                                    <option value="autentica">Auténtica</option>
                                    <option value="manipulada">Manipulada</option>
                                    <option value="sospechosa">Sospechosa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Probabilidad (%)</label>
                                <input type="number" name="probabilidad" class="form-control" min="0" max="100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="procesando">Procesando</option>
                                    <option value="completado">Completado</option>
                                    <option value="error">Error</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ruta Mapa de Calor</label>
                        <input type="text" name="ruta_mapa_calor" class="form-control">
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
                <h4 class="modal-title"><i class="fas fa-edit"></i> Editar Análisis</h4>
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
                                <label>Código Análisis</label>
                                <input type="text" id="edit_cod_analisis" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen</label>
                                <select name="imagen_id" id="edit_imagen_id" class="form-control" required>
                                    @foreach($imagenes as $imagen)
                                        <option value="{{ $imagen->id }}">{{ $imagen->cod_imagen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Usuario</label>
                                <select name="usuario_id" id="edit_usuario_id" class="form-control">
                                    <option value="">Seleccionar usuario</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Resultado</label>
                                <select name="resultado" id="edit_resultado" class="form-control" required>
                                    <option value="autentica">Auténtica</option>
                                    <option value="manipulada">Manipulada</option>
                                    <option value="sospechosa">Sospechosa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Probabilidad (%)</label>
                                <input type="number" name="probabilidad" id="edit_probabilidad" class="form-control" min="0" max="100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" id="edit_estado" class="form-control" required>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="procesando">Procesando</option>
                                    <option value="completado">Completado</option>
                                    <option value="error">Error</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ruta Mapa de Calor</label>
                        <input type="text" name="ruta_mapa_calor" id="edit_ruta_mapa_calor" class="form-control">
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
function editAnalisis(id, codigo, imagenId, usuarioId, resultado, probabilidad, ruta, estado) {
    document.getElementById('editForm').action = '/analisis/' + id;
    document.getElementById('edit_cod_analisis').value = codigo;
    document.getElementById('edit_imagen_id').value = imagenId;
    document.getElementById('edit_usuario_id').value = usuarioId || '';
    document.getElementById('edit_resultado').value = resultado;
    document.getElementById('edit_probabilidad').value = probabilidad || '';
    document.getElementById('edit_ruta_mapa_calor').value = ruta || '';
    document.getElementById('edit_estado').value = estado;
    $('#editModal').modal('show');
}
</script>
@endsection
