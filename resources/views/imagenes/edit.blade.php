@extends('layouts.adminlte')

@section('title', 'Editar Imagen')

@section('content')
<div class="card">
    <div class="card-header"><h3>Editar Imagen</h3></div>
    <div class="card-body">
        <form action="{{ route('imagenes.update', $imagen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Código Imagen</label>
                <input type="text" name="cod_imagen" class="form-control" value="{{ $imagen->cod_imagen }}" readonly>
            </div>

            <div class="form-group">
                <label>Usuario</label>
                <select name="usuario_id" class="form-control">
                    <option value="">-- Seleccionar Usuario --</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $imagen->usuario_id == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->nombre }} {{ $usuario->apellido_paterno }}
                        </option>
                    @endforeach
                </select>
                @error('usuario_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Archivo de Imagen (opcional para reemplazar)</label>
                <input type="file" name="imagen_archivo" class="form-control">
                @if($imagen->ruta_almacenamiento)
                    <small>Archivo actual: <a href="{{ asset('storage/' . $imagen->ruta_almacenamiento) }}" target="_blank">Ver</a></small>
                @endif
                @error('imagen_archivo') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Nombre Original</label>
                <input type="text" name="nombre_original" class="form-control" value="{{ old('nombre_original', $imagen->nombre_original) }}">
                @error('nombre_original') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="subida" {{ $imagen->estado == 'subida' ? 'selected' : '' }}>Subida</option>
                    <option value="en_cola" {{ $imagen->estado == 'en_cola' ? 'selected' : '' }}>En Cola</option>
                    <option value="procesando" {{ $imagen->estado == 'procesando' ? 'selected' : '' }}>Procesando</option>
                    <option value="terminado" {{ $imagen->estado == 'terminado' ? 'selected' : '' }}>Terminado</option>
                    <option value="error" {{ $imagen->estado == 'error' ? 'selected' : '' }}>Error</option>
                </select>
                @error('estado') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('imagenes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
