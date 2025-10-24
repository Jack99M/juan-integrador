@extends('layouts.adminlte')

@section('title', 'Listado de Datos EXIF')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-camera"></i> Datos EXIF</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Nuevo EXIF
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
                        <th style="width: 15%;"><i class="fas fa-image"></i> Imagen</th>
                        <th style="width: 20%;"><i class="fas fa-industry"></i> Fabricante</th>
                        <th style="width: 20%;"><i class="fas fa-camera"></i> Modelo</th>
                        <th style="width: 15%;"><i class="fas fa-code"></i> Software</th>
                        <th style="width: 10%;"><i class="fas fa-calendar"></i> Fecha</th>
                        <th style="width: 5%;"><i class="fas fa-cogs"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($exifs as $dato)
                        <tr>
                            <td><code>{{ $dato->cod_exif }}</code></td>
                            <td>{{ $dato->imagen->cod_imagen ?? '-' }}</td>
                            <td>{{ $dato->fabricante_camara }}</td>
                            <td>{{ $dato->modelo_camara }}</td>
                            <td>{{ $dato->software }}</td>
                            <td>{{ $dato->fecha_captura ? $dato->fecha_captura->format('d/m/Y H:i') : '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning btn-sm" title="Editar" 
                                            onclick="editExif({{ $dato->id }}, '{{ $dato->cod_exif }}', {{ $dato->imagen_id }}, '{{ $dato->fabricante_camara }}', '{{ $dato->modelo_camara }}', '{{ $dato->software }}', '{{ $dato->fecha_captura ? $dato->fecha_captura->format('Y-m-d') : '' }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('datos_exif.show', $dato) }}" class="btn btn-info btn-sm" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i> No hay registros EXIF
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
                <h4 class="modal-title"><i class="fas fa-plus"></i> Nuevo EXIF</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('datos_exif.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Código EXIF</label>
                                <input type="text" name="cod_exif" class="form-control" required>
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
                                <label>Fabricante Cámara</label>
                                <input type="text" name="fabricante_camara" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Modelo Cámara</label>
                                <input type="text" name="modelo_camara" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Software</label>
                                <input type="text" name="software" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha Captura</label>
                                <input type="date" name="fecha_captura" class="form-control">
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
                <h4 class="modal-title"><i class="fas fa-edit"></i> Editar EXIF</h4>
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
                                <label>Código EXIF</label>
                                <input type="text" name="cod_exif" id="edit_cod_exif" class="form-control" required>
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
                                <label>Fabricante Cámara</label>
                                <input type="text" name="fabricante_camara" id="edit_fabricante_camara" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Modelo Cámara</label>
                                <input type="text" name="modelo_camara" id="edit_modelo_camara" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Software</label>
                                <input type="text" name="software" id="edit_software" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha Captura</label>
                                <input type="date" name="fecha_captura" id="edit_fecha_captura" class="form-control">
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
function editExif(id, codigo, imagenId, fabricante, modelo, software, fecha) {
    document.getElementById('editForm').action = '/datos_exif/' + id;
    document.getElementById('edit_cod_exif').value = codigo;
    document.getElementById('edit_imagen_id').value = imagenId;
    document.getElementById('edit_fabricante_camara').value = fabricante || '';
    document.getElementById('edit_modelo_camara').value = modelo || '';
    document.getElementById('edit_software').value = software || '';
    document.getElementById('edit_fecha_captura').value = fecha || '';
    $('#editModal').modal('show');
}
</script>
@endsection
