@extends('layouts.adminlte')

@section('title', 'Editar Reporte')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Reporte</h3>
        <a href="{{ route('reportes.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>
    <div class="card-body">
        <form action="{{ route('reportes.update', $reporte) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Código Reporte</label>
                <input type="text" name="cod_reporte" class="form-control" value="{{ old('cod_reporte', $reporte->cod_reporte) }}">
                @error('cod_reporte') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Imagen Asociada</label>
                <select name="imagen_id" class="form-control">
                    <option value="">-- Seleccionar Imagen --</option>
                    @foreach($imagenes as $imagen)
                        <option value="{{ $imagen->id }}" {{ $reporte->imagen_id == $imagen->id ? 'selected' : '' }}>
                            {{ $imagen->cod_imagen }}
                        </option>
                    @endforeach
                </select>
                @error('imagen_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Usuario Responsable</label>
                <select name="usuario_id" class="form-control">
                    <option value="">-- Seleccionar Usuario --</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $reporte->usuario_id == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('usuario_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Archivo PDF</label>
                <input type="file" name="ruta_pdf" class="form-control">
                @if($reporte->ruta_pdf)
                    <small>Archivo actual: <a href="{{ asset('storage/' . $reporte->ruta_pdf) }}" target="_blank">Ver PDF</a></small>
                @endif
                @error('ruta_pdf') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Reporte JSON</label>
                <textarea name="reporte_json" class="form-control" rows="4">{{ old('reporte_json', json_encode($reporte->reporte_json, JSON_PRETTY_PRINT)) }}</textarea>
                @error('reporte_json') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
