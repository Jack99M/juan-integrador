@extends('layouts.adminlte')

@section('title', 'Editar Datos EXIF')

@section('content')
<div class="card">
    <div class="card-header"><h3>Editar EXIF</h3></div>
    <div class="card-body">
        <form action="{{ route('datos_exif.update', $datos_exif) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Código EXIF</label>
                <input type="text" name="cod_exif" class="form-control" value="{{ old('cod_exif', $datos_exif->cod_exif) }}">
                @error('cod_exif') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Imagen Asociada</label>
                <select name="imagen_id" class="form-control">
                    <option value="">-- Seleccionar Imagen --</option>
                    @foreach($imagenes as $imagen)
                        <option value="{{ $imagen->id }}" {{ $datos_exif->imagen_id == $imagen->id ? 'selected' : '' }}>
                            {{ $imagen->cod_imagen }}
                        </option>
                    @endforeach
                </select>
                @error('imagen_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Fabricante Cámara</label>
                <input type="text" name="fabricante_camara" class="form-control" value="{{ old('fabricante_camara', $datos_exif->fabricante_camara) }}">
                @error('fabricante_camara') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Modelo Cámara</label>
                <input type="text" name="modelo_camara" class="form-control" value="{{ old('modelo_camara', $datos_exif->modelo_camara) }}">
                @error('modelo_camara') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Software</label>
                <input type="text" name="software" class="form-control" value="{{ old('software', $datos_exif->software) }}">
                @error('software') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Fecha de Captura</label>
                <input type="datetime-local" name="fecha_captura" class="form-control" 
                       value="{{ old('fecha_captura', $datos_exif->fecha_captura ? $datos_exif->fecha_captura->format('Y-m-d\TH:i') : '') }}">
                @error('fecha_captura') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Datos Crudos (JSON)</label>
                <textarea name="datos_crudos" class="form-control" rows="3">{{ old('datos_crudos', json_encode($datos_exif->datos_crudos, JSON_PRETTY_PRINT)) }}</textarea>
                @error('datos_crudos') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('datos_exif.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
