@extends('layouts.adminlte')

@section('title', 'Backups')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-database"></i> Gestión de Backups</h3>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif

                <div class="mb-4">
                    <form action="{{ route('backups.create') }}" method="POST" id="backupForm">
                        @csrf
                        <button type="button" class="btn btn-success" onclick="confirmBackup()">
                            <i class="fas fa-download"></i> Crear Backup Manual
                        </button>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de Creación</th>
                                <th>Tamaño</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($backups as $backup)
                                <tr>
                                    <td>{{ $backup['nombre'] }}</td>
                                    <td>{{ $backup['fecha'] }}</td>
                                    <td>{{ $backup['tamaño'] }}</td>
                                    <td>
                                        <a href="{{ route('backups.download', $backup['nombre']) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-download"></i> Descargar
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No hay backups disponibles</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirmar Backup -->
<div class="modal fade" id="backupModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--success-gradient); color: white;">
                <h4 class="modal-title"><i class="fas fa-database"></i> Confirmar Backup</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-download fa-3x text-success mb-3"></i>
                <h5>¿Está seguro de crear un nuevo backup?</h5>
                <p class="text-muted mb-0">Se creará una copia completa de la base de datos</p>
                <small class="text-info">Si existen más de 3 backups, se eliminará el más antiguo</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="button" class="btn btn-success" onclick="document.getElementById('backupForm').submit()">
                    <i class="fas fa-download"></i> Crear Backup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function confirmBackup() {
    $('#backupModal').modal('show');
}
</script>
@endsection
