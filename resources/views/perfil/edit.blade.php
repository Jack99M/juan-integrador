@extends('layouts.adminlte')

@section('title', 'Editar Perfil')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i> Editar Mi Perfil</h3>
                <div class="card-tools">
                    <a href="{{ route('perfil.show') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('perfil.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre"><i class="fas fa-user"></i> Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                                           value="{{ old('nombre', $usuario->nombre) }}" placeholder="Ingrese su nombre">
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido_paterno"><i class="fas fa-user"></i> Apellido Paterno</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" 
                                           value="{{ old('apellido_paterno', $usuario->apellido_paterno) }}" placeholder="Apellido paterno">
                                    @error('apellido_paterno')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido_materno"><i class="fas fa-user"></i> Apellido Materno</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="apellido_materno" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" 
                                           value="{{ old('apellido_materno', $usuario->apellido_materno) }}" placeholder="Apellido materno (opcional)">
                                    @error('apellido_materno')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email', $usuario->email) }}" placeholder="Correo electrónico">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="organizacion"><i class="fas fa-building"></i> Organización</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" id="organizacion" name="organizacion" class="form-control @error('organizacion') is-invalid @enderror" 
                                   value="{{ old('organizacion', $usuario->organizacion) }}" placeholder="Organización (opcional)">
                            @error('organizacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <h5><i class="fas fa-lock"></i> Cambiar Contraseña (Opcional)</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i> Nueva Contraseña</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                           placeholder="Nueva contraseña (dejar vacío para mantener actual)">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation"><i class="fas fa-lock"></i> Confirmar Contraseña</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" 
                                           placeholder="Confirmar nueva contraseña">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Actualizar Perfil
                        </button>
                        <a href="{{ route('perfil.show') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection