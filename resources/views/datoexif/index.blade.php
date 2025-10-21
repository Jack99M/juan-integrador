@extends('layouts.adminlte')

@section('title', 'Listado de Datos EXIF')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Datos EXIF</h3>
        <a href="{{ route('datos_exif.create') }}" class="btn btn-primary btn-sm float-right">Nuevo EXIF</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código EXIF</th>
                    <th>Imagen</th>
                    <th>Fabricante</th>
                    <th>Modelo</th>
                    <th>Software</th>
                    <th>Fecha Captura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exifs as $dato)
                    <tr>
                        <td>{{ $dato->cod_exif }}</td>
                        <td>{{ $dato->imagen->cod_imagen ?? '-' }}</td>
                        <td>{{ $dato->fabricante_camara }}</td>
                        <td>{{ $dato->modelo_camara }}</td>
                        <td>{{ $dato->software }}</td>
                        <td>{{ $dato->fecha_captura ? $dato->fecha_captura->format('d/m/Y H:i') : '-' }}</td>
                        <td>
                            <a href="{{ route('datos_exif.edit', $dato) }}" class="btn btn-warning btn-sm">Editar</a>
                            <a href="{{ route('datos_exif.show', $dato) }}" class="btn btn-info btn-sm">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay registros EXIF</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
