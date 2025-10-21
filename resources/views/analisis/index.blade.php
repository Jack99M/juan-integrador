@extends('layouts.adminlte')

@section('title', 'Listado de Análisis')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Análisis</h3>
        <a href="{{ route('analisis.create') }}" class="btn btn-primary btn-sm float-right">Nuevo Análisis</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código Análisis</th>
                    <th>Imagen</th>
                    <th>Usuario</th>
                    <th>Resultado</th>
                    <th>Probabilidad (%)</th>
                    <th>Estado</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($analisis as $item)
                    <tr>
                        <td>{{ $item->cod_analisis }}</td>
                        <td>{{ $item->imagen->cod_imagen ?? '-' }}</td>
                        <td>{{ $item->usuario->nombre ?? '-' }}</td>
                        <td>{{ ucfirst($item->resultado) }}</td>
                        <td>{{ $item->probabilidad ?? '-' }}</td>
                        <td>{{ ucfirst($item->estado) }}</td>
                        <td>{{ $item->activo ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('analisis.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>

                            @if($item->activo)
                                <form action="{{ route('analisis.destroy', $item) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                                </form>
                            @else
                                <form action="{{ route('analisis.reactivar', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Reactivar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay registros de análisis</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
