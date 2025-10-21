@extends('layouts.adminlte')

@section('title', 'Editar Usuario')

@section('content')
<div class="card">
    <div class="card-header"><h3>Editar Usuario</h3></div>
    <div class="card-body">
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Código Usuario</label>
                <input type="text" name="cod_usuario" class="form-control" value="{{ $usuario->cod_usuario }}" readonly>
            </div>

            <div class="form-group">
                <label>Rol</label>
                <select name="rol_id" class="form-control">
                    <option value="">-- Seleccionar Rol --</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>
                            {{ $rol->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('rol_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}">
                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Apellido Paterno</label>
                <input type="text" name="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', $usuario->apellido_paterno) }}">
                @error('apellido_paterno') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Apellido Materno</label>
                <input type="text" name="apellido_materno" class="form-control" value="{{ old('apellido_materno', $usuario->apellido_materno) }}">
                @error('apellido_materno') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Contraseña (dejar vacío si no se cambia)</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" style="background-color: #e9ecef;" autocomplete="new-password">
            </div>

            <div class="form-group">
                <label>Organización</label>
                <input type="text" name="organizacion" class="form-control" value="{{ old('organizacion', $usuario->organizacion) }}">
                @error('organizacion') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');

    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.length > 0) {
            confirmInput.style.backgroundColor = '';
        } else {
            confirmInput.style.backgroundColor = '#e9ecef';
        }
    });
});
</script>
@endsection
