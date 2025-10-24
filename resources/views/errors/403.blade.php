@extends('layouts.adminlte')

@section('title', 'Acceso Denegado')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header text-center">
                <h3 class="card-title"><i class="fas fa-ban"></i> Acceso Denegado</h3>
            </div>
            <div class="card-body text-center">
                <i class="fas fa-exclamation-triangle fa-5x text-danger mb-4"></i>
                <h4>Error 403</h4>
                <p class="text-muted">{{ $exception->getMessage() ?: 'No tienes permisos para acceder a esta sección.' }}</p>
                <p>Tu rol actual: <strong>{{ Auth::user()->rol->nombre ?? 'Sin rol' }}</strong></p>
                
                <div class="mt-4">
                    <a href="{{ url('/') }}" class="btn btn-primary">
                        <i class="fas fa-home"></i> Volver al Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection