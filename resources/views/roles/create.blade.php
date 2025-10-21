@extends('layouts.adminlte')

@section('title', 'Roles')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Nuevo Rol</h3>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>
    <div class="card-body">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Código Rol</label>
                <input type="text" name="cod_rol" class="form-control" value="{{ old('cod_rol') }}">
                @error('cod_rol') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
