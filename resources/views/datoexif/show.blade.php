@extends('layouts.adminlte')

@section('title', 'Detalle Datos EXIF')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalle EXIF</h3>
        <a href="{{ route('datos_exif.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>

    <div class="card-body">
        <div class="row">

            <!-- Imagen asociada -->
            <div class="col-md-6">
                @if($datos_exif->imagen && $datos_exif->imagen->ruta_almacenamiento)
                    <img src="{{ asset('storage/' . $datos_exif->imagen->ruta_almacenamiento) }}" alt="Imagen EXIF" class="img-fluid mb-3">
                @else
                    <p class="text-muted">No hay imagen asociada.</p>
                @endif
            </div>

            <!-- Detalles EXIF -->
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Código EXIF</th>
                        <td>{{ $datos_exif->cod_exif }}</td>
                    </tr>
                    <tr>
                        <th>Fabricante Cámara</th>
                        <td>{{ $datos_exif->fabricante_camara ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Modelo Cámara</th>
                        <td>{{ $datos_exif->modelo_camara ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Software</th>
                        <td>{{ $datos_exif->software ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Captura</th>
                        <td>{{ $datos_exif->fecha_captura ? $datos_exif->fecha_captura->format('d/m/Y H:i') : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Datos Crudos (JSON)</th>
                        <td>
                            <pre style="white-space: pre-wrap; word-wrap: break-word; max-width: 100%;">
                            {{ json_encode($datos_exif->datos_crudos, JSON_PRETTY_PRINT) }}
                            </pre>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
