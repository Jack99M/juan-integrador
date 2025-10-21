@extends('layouts.adminlte')

@section('title', 'Crear Análisis')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Nuevo Análisis</h3>
        <a href="{{ route('analisis.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>
    <div class="card-body">
        <form action="{{ route('analisis.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Código Análisis</label>
                <input type="text" name="cod_analisis" class="form-control" value="{{ old('cod_analisis') }}">
                @error('cod_analisis') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Imagen</label>
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
                <label>Usuario (Opcional)</label>
                <select name="usuario_id" class="form-control">
                    <option value="">-- Seleccionar Usuario --</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->nombre ?? $usuario->email }}
                        </option>
                    @endforeach
                </select>
                @error('usuario_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Resultado</label>
                <select name="resultado" class="form-control">
                    @foreach(['desconocido','limpia','sospechosa','manipulada'] as $res)
                        <option value="{{ $res }}" {{ old('resultado') == $res ? 'selected' : '' }}>{{ ucfirst($res) }}</option>
                    @endforeach
                </select>
                @error('resultado') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Probabilidad (%)</label>
                <input type="number" step="0.01" min="0" max="100" name="probabilidad" class="form-control" value="{{ old('probabilidad') }}">
                @error('probabilidad') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    @foreach(['en_cola','procesando','terminado','fallo'] as $estado)
                        <option value="{{ $estado }}" {{ old('estado') == $estado ? 'selected' : '' }}>{{ ucfirst($estado) }}</option>
                    @endforeach
                </select>
                @error('estado') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Detalles (JSON)</label>
                <textarea name="detalles" class="form-control" rows="4">{{ old('detalles') }}</textarea>
                @error('detalles') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('analisis.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
