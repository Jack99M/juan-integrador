@extends('layouts.adminlte')

@section('title', 'Editar Rol')

@section('content')
<div class="card">
    <div class="card-header"><h3>Editar Rol</h3></div>
    <div class="card-body">
        <form action="{{ route('roles.update', $rol->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Código Rol</label>
                <input type="text" name="cod_rol" class="form-control" value="{{ $rol->cod_rol }}" readonly>
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $rol->nombre) }}">
                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control">{{ old('descripcion', $rol->descripcion) }}</textarea>
                @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
