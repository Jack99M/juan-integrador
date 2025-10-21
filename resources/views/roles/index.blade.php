@extends('layouts.adminlte')

@section('title', 'Listado de Roles')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Roles</h3>
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Nuevo Rol</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 15%;">Código Roles</th>
                        <th style="width: 25%;">Nombre</th>
                        <th style="width: 45%;">Descripción</th>
                        <th style="width: 15%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $rol)
                        <tr>
                            <td>{{ $rol->cod_rol }}</td>
                            <td>{{ $rol->nombre }}</td>
                            <td>{{ $rol->descripcion }}</td>
                            <td>
                                <a href="{{ route('roles.edit', ['role' => $rol->id]) }}" class="btn btn-warning btn-sm me-1">Editar</a>

                                @if($rol->activo)
                                    <form action="{{ route('roles.destroy', $rol) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                                    </form>
                                @else
                                    <form action="{{ route('roles.reactivar', $rol->id) }}" method="POST" class="d-inline">
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
