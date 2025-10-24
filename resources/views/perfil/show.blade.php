@extends('layouts.adminlte')

@section('title', 'Mi Perfil')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> Mi Perfil</h3>
                <div class="card-tools">
                    <a href="{{ route('perfil.edit') }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fas fa-check"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="profile-user-img-wrapper">
                            <i class="fas fa-user-circle fa-5x text-primary"></i>
                        </div>
                        <h3 class="profile-username text-center mt-3">{{ $usuario->nombre }} {{ $usuario->apellido_paterno }}</h3>
                        <p class="text-muted text-center">{{ $usuario->rol->nombre ?? 'Sin rol asignado' }}</p>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong><i class="fas fa-code"></i> Código:</strong></td>
                                    <td>{{ $usuario->cod_usuario }}</td>
                                </tr>
                                <tr>
                                    <td><strong><i class="fas fa-user"></i> Nombre Completo:</strong></td>
                                    <td>{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}</td>
                                </tr>
                                <tr>
                                    <td><strong><i class="fas fa-envelope"></i> Email:</strong></td>
                                    <td>{{ $usuario->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong><i class="fas fa-user-shield"></i> Rol:</strong></td>
                                    <td>
                                        <span class="badge badge-primary">{{ $usuario->rol->nombre ?? 'Sin rol' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong><i class="fas fa-building"></i> Organización:</strong></td>
                                    <td>{{ $usuario->organizacion ?? 'No especificada' }}</td>
                                </tr>
                                <tr>
                                    <td><strong><i class="fas fa-calendar"></i> Fecha de Registro:</strong></td>
                                    <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td><strong><i class="fas fa-circle"></i> Estado:</strong></td>
                                    <td>
                                        @if($usuario->activo)
                                            <span class="badge badge-success"><i class="fas fa-check"></i> Activo</span>
                                        @else
                                            <span class="badge badge-secondary"><i class="fas fa-times"></i> Inactivo</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection