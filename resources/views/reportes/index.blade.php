@extends('layouts.adminlte')

@section('title', 'Reportes')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Reportes</h3>
        <a href="{{ route('reportes.create') }}" class="btn btn-primary btn-sm float-right">Nuevo Reporte</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código Reporte</th>
                    <th>Imagen</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportes as $reporte)
                    <tr>
                        <td>{{ $reporte->cod_reporte }}</td>
                        <td>{{ $reporte->imagen->cod_imagen ?? '-' }}</td>
                        <td>{{ $reporte->usuario->nombre ?? '-' }}</td>
                        <td>
                            <a href="{{ route('reportes.edit', $reporte) }}" class="btn btn-warning btn-sm">Editar</a>

                            @if($reporte->activo)
                                <form action="{{ route('reportes.destroy', $reporte) }}" method="POST" style="display:inline-block; margin-left: 3px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                                </form>
                            @else
                                <form action="{{ route('reportes.reactivar', $reporte->id) }}" method="POST" style="display:inline-block; margin-left: 3px;">
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
