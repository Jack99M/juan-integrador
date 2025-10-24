@extends('layouts.adminlte')

@section('title', 'Editar Rol')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-edit"></i> Editar Rol</h3>
        <div class="card-tools">
            <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('roles.update', $rol) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="cod_rol"><i class="fas fa-code"></i> Código Rol</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="text" id="cod_rol" name="cod_rol" class="form-control" 
                           value="{{ $rol->cod_rol }}" readonly>
                </div>
                <small class="form-text text-muted">El código del rol no se puede modificar</small>
            </div>

            <div class="form-group">
                <label for="nombre"><i class="fas fa-tag"></i> Nombre</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-tag"></i></span>
                    </div>
                    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                           value="{{ old('nombre', $rol->nombre) }}" placeholder="Ingrese el nombre del rol">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="descripcion"><i class="fas fa-info-circle"></i> Descripción</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                    </div>
                    <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" 
                              rows="3" placeholder="Ingrese la descripción del rol">{{ old('descripcion', $rol->descripcion) }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Actualizar
                </button>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
