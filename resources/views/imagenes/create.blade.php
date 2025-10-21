@extends('layouts.adminlte')

@section('title', 'Crear Imagen')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Nueva Imagen</h3>
        <a href="{{ route('imagenes.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>
    <div class="card-body">
        <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Código Imagen</label>
                <input type="text" name="cod_imagen" class="form-control" value="{{ old('cod_imagen') }}">
                @error('cod_imagen') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Usuario</label>
                <select name="usuario_id" class="form-control">
                    <option value="">-- Seleccionar Usuario --</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->nombre }} {{ $usuario->apellido_paterno }}
                        </option>
                    @endforeach
                </select>
                @error('usuario_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Archivo de Imagen</label>
                <input type="file" name="imagen_archivo" class="form-control">
                @error('imagen_archivo') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="subida" {{ old('estado') == 'subida' ? 'selected' : '' }}>Subida</option>
                    <option value="en_cola" {{ old('estado') == 'en_cola' ? 'selected' : '' }}>En Cola</option>
                    <option value="procesando" {{ old('estado') == 'procesando' ? 'selected' : '' }}>Procesando</option>
                    <option value="terminado" {{ old('estado') == 'terminado' ? 'selected' : '' }}>Terminado</option>
                    <option value="error" {{ old('estado') == 'error' ? 'selected' : '' }}>Error</option>
                </select>
                @error('estado') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('imagenes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
