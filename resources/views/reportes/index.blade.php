@extends('layouts.adminlte')

@section('title', 'Reportes')

@section('content')
<!-- Sección de Reportes Estadísticos -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-bar"></i> Reportes Estadísticos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> <strong>Reportes Estadísticos:</strong> Genera reportes en PDF con datos agregados del sistema
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('reportes.estadisticos.estado-analisis') }}" class="btn btn-primary btn-block" target="_blank">
                            <i class="fas fa-tasks"></i><br>Estado Análisis
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('reportes.estadisticos.formato') }}" class="btn btn-success btn-block" target="_blank">
                            <i class="fas fa-image"></i><br>Por Formato
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('reportes.estadisticos.estado-subida') }}" class="btn btn-info btn-block" target="_blank">
                            <i class="fas fa-upload"></i><br>Estado Subida
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('reportes.estadisticos.ultimo-mes') }}" class="btn btn-warning btn-block" target="_blank">
                            <i class="fas fa-calendar-alt"></i><br>Último Mes
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('reportes.estadisticos.ultimo-anio') }}" class="btn btn-danger btn-block" target="_blank">
                            <i class="fas fa-calendar"></i><br>Último Año
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalPeriodoReportes">
                            <i class="fas fa-calendar-week"></i><br>Por Periodo
                        </button>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('reportes.estadisticos.general') }}" class="btn btn-dark btn-block" target="_blank">
                            <i class="fas fa-chart-pie"></i><br>Reporte General
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
            <table id="reportesTable" class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 20%;"><i class="fas fa-code"></i> Código Reporte</th>
                        <th style="width: 20%;"><i class="fas fa-image"></i> Imagen</th>
                        <th style="width: 20%;"><i class="fas fa-user"></i> Usuario</th>
                        <th style="width: 10%;"><i class="fas fa-file-pdf"></i> PDF</th>
                        <th style="width: 15%;"><i class="fas fa-circle"></i> Estado</th>
                        <th style="width: 15%;"><i class="fas fa-cogs"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportes as $reporte)
                        <tr class="{{ $reporte->activo ? '' : 'table-secondary' }}">
                            <td><code>{{ $reporte->cod_reporte }}</code></td>
                            <td>{{ $reporte->imagen->cod_imagen ?? '-' }}</td>
                            <td>{{ $reporte->usuario->nombre ?? '-' }}</td>
                            <td>
                                <a href="{{ route('reportes.pdf', $reporte->id) }}" class="btn btn-danger btn-xs" title="Generar PDF con Mapa de Calor" target="_blank">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            </td>
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
                                        <button type="button" class="btn btn-danger btn-sm" title="Desactivar" 
                                                onclick="confirmDeactivate({{ $reporte->id }}, '{{ $reporte->cod_reporte }}', 'reportes')">
                                            <i class="fas fa-ban"></i>
                                        </button>
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
                        <input type="text" name="cod_reporte" class="form-control" value="{{ $siguienteCodigo }}" readonly>
                        <small class="text-muted">Código generado automáticamente</small>
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
                        <input type="file" name="ruta_pdf" class="form-control" accept=".pdf">
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
                        <input type="file" name="ruta_pdf" class="form-control" accept=".pdf">
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

<!-- Modal para Periodo Personalizado en Reportes -->
<div class="modal fade" id="modalPeriodoReportes" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('reportes.estadisticos.periodo') }}" method="GET" target="_blank">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="fas fa-calendar-week"></i> Seleccionar Periodo</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><i class="fas fa-calendar-day"></i> Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-calendar-day"></i> Fecha Fin</label>
                        <input type="date" name="fecha_fin" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-file-pdf"></i> Generar Reporte
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

function confirmDeactivate(id, name, module) {
    document.getElementById('deactivateForm').action = '/' + module + '/' + id;
    document.getElementById('deactivateItemName').textContent = name;
    $('#deactivateModal').modal('show');
}
</script>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#reportesTable').DataTable({
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"<"col-sm-12 col-md-6"B>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        buttons: [
            { extend: 'copy', text: 'Copiar', className: 'btn btn-secondary btn-sm' },
            { extend: 'csv', text: 'CSV', className: 'btn btn-success btn-sm' },
            { extend: 'excel', text: 'Excel', className: 'btn btn-success btn-sm' },
            { extend: 'pdf', text: 'PDF', className: 'btn btn-danger btn-sm' },
            { extend: 'print', text: 'Imprimir', className: 'btn btn-info btn-sm' }
        ],
        language: {
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            },
            zeroRecords: "No se encontraron registros",
            emptyTable: "No hay datos disponibles"
        },
        pageLength: 10,
        order: [[0, 'asc']]
    });
    
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('create') === '1') {
        $('#createModal').modal('show');
    }
});
</script>
@endsection
