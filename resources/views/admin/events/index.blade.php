@extends('layouts.admin')

@section('title', 'Gestión de Registros - Caminata 5K')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="fas fa-running"></i> Registros Caminata 5K
        </h1>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pendientes
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['pending'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Aprobados
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['approved'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Rechazados
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['rejected'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Registros
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registrations Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Registros</h6>
        </div>
        <div class="card-body">
            @if($registrations->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                    <p class="text-muted">No hay registros para el evento</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="registrationsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Cédula</th>
                                <th>Teléfono</th>
                                <th>Red Social</th>
                                <th>Método Pago</th>
                                <th>Referencia</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                                <tr>
                                    <td>{{ $registration->id }}</td>
                                    <td>{{ $registration->full_name }}</td>
                                    <td>{{ $registration->id_number }}</td>
                                    <td>{{ $registration->phone }}</td>
                                    <td>{{ $registration->social_media }}</td>
                                    <td>{{ $registration->payment_method ?? 'N/A' }}</td>
                                    <td>
                                        <code>{{ $registration->payment_reference }}</code>
                                    </td>
                                    <td>
                                        @if($registration->status === 'approved')
                                            <span class="badge badge-success">Aprobado</span>
                                        @elseif($registration->status === 'pending')
                                            <span class="badge badge-warning">Pendiente</span>
                                        @else
                                            <span class="badge badge-danger">Rechazado</span>
                                        @endif
                                    </td>
                                    <td>{{ $registration->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if($registration->status === 'pending')
                                                <button type="button" class="btn btn-sm btn-success" 
                                                        onclick="updateStatus({{ $registration->id }}, 'approved')"
                                                        title="Aprobar">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                        onclick="updateStatus({{ $registration->id }}, 'rejected')"
                                                        title="Rechazar">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-info" 
                                                    onclick="viewDetails({{ $registration->id }})"
                                                    title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary" 
                                                    onclick="deleteRegistration({{ $registration->id }})"
                                                    title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $registrations->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal for Status Update -->
<div id="statusModal" class="custom-modal">
    <div class="custom-modal-dialog">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h5>Actualizar Estado de Registro</h5>
                <button type="button" class="close-btn" onclick="closeStatusModal()">&times;</button>
            </div>
            <form id="statusForm" method="POST">
                @csrf
                @method('PATCH')
                <div class="custom-modal-body">
                    <input type="hidden" id="statusAction" name="status">
                    <div class="form-group">
                        <label for="admin_notes">Notas del Administrador (Opcional)</label>
                        <textarea class="form-control" id="admin_notes" name="admin_notes" rows="3" 
                                  placeholder="Agregue notas sobre esta decisión..."></textarea>
                    </div>
                </div>
                <div class="custom-modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeStatusModal()">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Details -->
<div id="detailsModal" class="custom-modal">
    <div class="custom-modal-dialog">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h5>Detalles del Registro</h5>
                <button type="button" class="close-btn" onclick="closeDetailsModal()">&times;</button>
            </div>
            <div class="custom-modal-body" id="detailsContent">
                <!-- Details will be loaded here -->
            </div>
            <div class="custom-modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeDetailsModal()">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="custom-modal">
    <div class="custom-modal-dialog">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h5>Confirmar Eliminación</h5>
                <button type="button" class="close-btn" onclick="closeDeleteModal()">&times;</button>
            </div>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="custom-modal-body">
                    <p>¿Está seguro que desea eliminar este registro? Esta acción no se puede deshacer.</p>
                </div>
                <div class="custom-modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
    }

    .custom-modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-modal-dialog {
        max-width: 600px;
        width: 90%;
    }

    .custom-modal-content {
        background: white;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .custom-modal-header {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .custom-modal-header h5 {
        margin: 0;
        font-weight: 600;
    }

    .close-btn {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #999;
    }

    .close-btn:hover {
        color: #333;
    }

    .custom-modal-body {
        padding: 1.5rem;
    }

    .custom-modal-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid #dee2e6;
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }

    .border-left-primary {
        border-left: 4px solid #4e73df !important;
    }

    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }

    .border-left-warning {
        border-left: 4px solid #f6c23e !important;
    }

    .border-left-danger {
        border-left: 4px solid #e74a3b !important;
    }
</style>

<script>
    function updateStatus(id, status) {
        const statusForm = document.getElementById('statusForm');
        statusForm.action = `/admin/events/${id}/status`;
        document.getElementById('statusAction').value = status;
        document.getElementById('statusModal').classList.add('show');
    }

    function closeStatusModal() {
        document.getElementById('statusModal').classList.remove('show');
        document.getElementById('statusForm').reset();
    }

    function viewDetails(id) {
        const registrations = @json($registrations->items());
        const registration = registrations.find(r => r.id === id);
        
        if (registration) {
            let statusBadge = '';
            if (registration.status === 'approved') {
                statusBadge = '<span class="badge badge-success">Aprobado</span>';
            } else if (registration.status === 'pending') {
                statusBadge = '<span class="badge badge-warning">Pendiente</span>';
            } else {
                statusBadge = '<span class="badge badge-danger">Rechazado</span>';
            }

            const detailsHTML = `
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>ID:</strong> ${registration.id}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Estado:</strong> ${statusBadge}
                    </div>
                    <div class="col-md-12 mb-3">
                        <strong>Nombre Completo:</strong><br>
                        ${registration.full_name}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Cédula:</strong><br>
                        ${registration.id_number}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Teléfono:</strong><br>
                        ${registration.phone}
                    </div>
                    <div class="col-md-12 mb-3">
                        <strong>Red Social:</strong><br>
                        ${registration.social_media}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Método de Pago:</strong><br>
                        ${registration.payment_method || 'N/A'}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Referencia de Pago:</strong><br>
                        <code>${registration.payment_reference}</code>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Fecha de Registro:</strong><br>
                        ${new Date(registration.created_at).toLocaleString('es-ES')}
                    </div>
                    ${registration.approved_at ? `
                    <div class="col-md-6 mb-3">
                        <strong>Fecha de Aprobación:</strong><br>
                        ${new Date(registration.approved_at).toLocaleString('es-ES')}
                    </div>
                    ` : ''}
                    ${registration.admin_notes ? `
                    <div class="col-md-12 mb-3">
                        <strong>Notas del Administrador:</strong><br>
                        <div class="alert alert-info mb-0">${registration.admin_notes}</div>
                    </div>
                    ` : ''}
                </div>
            `;
            
            document.getElementById('detailsContent').innerHTML = detailsHTML;
            document.getElementById('detailsModal').classList.add('show');
        }
    }

    function closeDetailsModal() {
        document.getElementById('detailsModal').classList.remove('show');
    }

    function deleteRegistration(id) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/admin/events/${id}`;
        document.getElementById('deleteModal').classList.add('show');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
    }

    // Close modals when clicking outside
    document.querySelectorAll('.custom-modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
            }
        });
    });
</script>
@endsection
