@extends('layouts.adminlte')

@section('title', 'Logs de Auditoría')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-history"></i> Logs de Auditoría</h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3">
                <label>Filtrar por Acción:</label>
                <select id="filtroAccion" class="form-control">
                    <option value="">Todas</option>
                    <option value="login">Login</option>
                    <option value="logout">Logout</option>
                    <option value="crear">Crear</option>
                    <option value="editar">Editar</option>
                    <option value="eliminar">Eliminar</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Filtrar por Módulo:</label>
                <select id="filtroModulo" class="form-control">
                    <option value="">Todos</option>
                    <option value="usuarios">Usuarios</option>
                    <option value="roles">Roles</option>
                    <option value="imagenes">Imágenes</option>
                    <option value="analisis">Análisis</option>
                    <option value="datos_exif">Datos EXIF</option>
                    <option value="reportes">Reportes</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Filtrar por Fecha:</label>
                <input type="text" id="filtroFechaLog" class="form-control" placeholder="Seleccionar rango">
            </div>
        </div>

        <div class="table-responsive">
            <table id="logsTable" class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 15%;"><i class="fas fa-user"></i> Usuario</th>
                        <th style="width: 15%;"><i class="fas fa-bolt"></i> Acción</th>
                        <th style="width: 15%;"><i class="fas fa-cube"></i> Módulo</th>
                        <th style="width: 35%;"><i class="fas fa-info-circle"></i> Descripción</th>
                        <th style="width: 20%;"><i class="fas fa-calendar"></i> Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->usuario->nombre ?? 'Sistema' }}</td>
                            <td>
                                @if($log->accion == 'login')
                                    <span class="badge badge-success">{{ ucfirst($log->accion) }}</span>
                                @elseif($log->accion == 'logout')
                                    <span class="badge badge-secondary">{{ ucfirst($log->accion) }}</span>
                                @elseif($log->accion == 'crear')
                                    <span class="badge badge-primary">{{ ucfirst($log->accion) }}</span>
                                @elseif($log->accion == 'editar')
                                    <span class="badge badge-warning">{{ ucfirst($log->accion) }}</span>
                                @elseif($log->accion == 'eliminar')
                                    <span class="badge badge-danger">{{ ucfirst($log->accion) }}</span>
                                @else
                                    <span class="badge badge-info">{{ ucfirst($log->accion) }}</span>
                                @endif
                            </td>
                            <td><code>{{ $log->modulo }}</code></td>
                            <td>{{ $log->descripcion }}</td>
                            <td><small>{{ $log->created_at->format('d/m/Y H:i:s') }}</small></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    var table = $('#logsTable').DataTable({
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
        pageLength: 25,
        order: [[4, 'desc']]
    });

    $('#filtroAccion').on('change', function() {
        table.column(1).search(this.value).draw();
    });

    $('#filtroModulo').on('change', function() {
        table.column(2).search(this.value).draw();
    });

    $('#filtroFechaLog').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Limpiar',
            applyLabel: 'Aplicar',
            format: 'DD/MM/YYYY'
        }
    });

    $('#filtroFechaLog').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = picker.startDate;
                var max = picker.endDate;
                var dateStr = data[4];
                var dateParts = dateStr.split(' ')[0].split('/');
                var date = moment(dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0], 'YYYY-MM-DD');
                if ((min === "" && max === "") || (date >= min && date <= max)) {
                    return true;
                }
                return false;
            }
        );
        table.draw();
    });

    $('#filtroFechaLog').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        $.fn.dataTable.ext.search.pop();
        table.draw();
    });
});
</script>
@endsection
