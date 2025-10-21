@extends('layouts.adminlte')

@section('title', 'Listado de Imágenes')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Imágenes</h3>
        <a href="{{ route('imagenes.create') }}" class="btn btn-primary btn-sm float-right">Nueva Imagen</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código Imagenes</th>
                    <th>Usuario</th>
                    <th>Nombre Original</th>
                    <th>Estado</th>
                    <th>Archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imagenes as $imagen)
                    <tr>
                        <td>{{ $imagen->cod_imagen }}</td>
                        <td>{{ $imagen->usuario->nombre ?? 'Sin usuario' }}</td>
                        <td>{{ $imagen->nombre_original }}</td>
                        <td>{{ ucfirst($imagen->estado) }}</td>
                        <td>
                            @if($imagen->ruta_almacenamiento)
                                <a href="{{ asset('storage/' . $imagen->ruta_almacenamiento) }}" target="_blank">Ver</a>
                            @else
                                Sin archivo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('imagenes.edit', $imagen->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            @if($imagen->activo)
                                <form action="{{ route('imagenes.destroy', $imagen->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                                </form>
                            @else
                                <form action="{{ route('imagenes.reactivar', $imagen->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Reactivar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
