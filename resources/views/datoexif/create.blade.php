@extends('layouts.adminlte')

@section('title', 'Crear Datos EXIF')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Nuevo EXIF</h3>
        <a href="{{ route('datos_exif.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>
    <div class="card-body">
        <form action="{{ route('datos_exif.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Código EXIF</label>
                <input type="text" name="cod_exif" class="form-control" value="{{ old('cod_exif') }}">
                @error('cod_exif') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Imagen Asociada</label>
                <select name="imagen_id" class="form-control">
                    <option value="">-- Seleccionar Imagen --</option>
                    @foreach($imagenes as $imagen)
                        <option value="{{ $imagen->id }}" {{ old('imagen_id') == $imagen->id ? 'selected' : '' }}>
                            {{ $imagen->cod_imagen }}
                        </option>
                    @endforeach
                </select>
                @error('imagen_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Fabricante Cámara</label>
                <input type="text" name="fabricante_camara" class="form-control" value="{{ old('fabricante_camara') }}">
                @error('fabricante_camara') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Modelo Cámara</label>
                <input type="text" name="modelo_camara" class="form-control" value="{{ old('modelo_camara') }}">
                @error('modelo_camara') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Software</label>
                <input type="text" name="software" class="form-control" value="{{ old('software') }}">
                @error('software') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Fecha de Captura</label>
                <input type="datetime-local" name="fecha_captura" class="form-control" value="{{ old('fecha_captura') }}">
                @error('fecha_captura') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Datos Crudos (JSON)</label>
                <textarea name="datos_crudos" class="form-control" rows="3">{{ old('datos_crudos') }}</textarea>
                @error('datos_crudos') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('datos_exif.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
