@extends('layouts.admin')

@section('title', 'Gestión de Donaciones')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Gestión de Donaciones</h1>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
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
                                Aprobadas
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
                                Rechazadas
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
                                Total Recaudado
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($stats['total_amount'], 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Donations Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Donaciones</h6>
        </div>
        <div class="card-body">
            @if($donations->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                    <p class="text-muted">No hay donaciones registradas</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="donationsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Donante</th>
                                <th>Cédula/DNI</th>
                                <th>Monto</th>
                                <th>Método</th>
                                <th>Referencia</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $donation)
                                <tr>
                                    <td>{{ $donation->id }}</td>
                                    <td>
                                        <div>{{ $donation->user->name }}</div>
                                        <small class="text-muted">{{ $donation->user->email }}</small>
                                    </td>
                                    <td>{{ $donation->donor_name }}</td>
                                    <td>{{ $donation->donor_id_number }}</td>
                                    <td class="font-weight-bold text-primary">${{ number_format($donation->amount, 2) }}</td>
                                    <td>{{ $donation->payment_method ?? 'N/A' }}</td>
                                    <td>
                                        <code>{{ $donation->reference_number }}</code>
                                    </td>
                                    <td>
                                        @if($donation->status === 'approved')
                                            <span class="badge badge-success">Aprobada</span>
                                        @elseif($donation->status === 'pending')
                                            <span class="badge badge-warning">Pendiente</span>
                                        @else
                                            <span class="badge badge-danger">Rechazada</span>
                                        @endif
                                    </td>
                                    <td>{{ $donation->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if($donation->status === 'pending')
                                                <button type="button" class="btn btn-sm btn-success" 
                                                        onclick="updateStatus({{ $donation->id }}, 'approved')"
                                                        title="Aprobar">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                        onclick="updateStatus({{ $donation->id }}, 'rejected')"
                                                        title="Rechazar">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-info" 
                                                    onclick="viewDetails({{ $donation->id }})"
                                                    title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary" 
                                                    onclick="deleteDonation({{ $donation->id }})"
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
                    {{ $donations->links() }}
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
                <h5>Actualizar Estado de Donación</h5>
                <button type="button" class="close-btn" onclick="closeStatusModal()">&times;</button>
            </div>
            <form id="statusForm" method="POST">
                @csrf
                @method('PATCH')
                <div class="custom-modal-body">
                    <input type="hidden" id="statusAction" name="status">
                    <div class="form-group-modal">
                        <label for="admin_notes">Notas del Administrador (Opcional)</label>
                        <textarea id="admin_notes" name="admin_notes" rows="3" 
                                  placeholder="Agregue notas sobre esta decisión..."></textarea>
                    </div>
                    <p id="statusMessage"></p>
                </div>
                <div class="custom-modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeStatusModal()">Cancelar</button>
                    <button type="submit" class="btn-confirm" id="confirmBtn">Confirmar</button>
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
                <h5>Detalles de la Donación</h5>
                <button type="button" class="close-btn" onclick="closeDetailsModal()">&times;</button>
            </div>
            <div class="custom-modal-body" id="detailsContent">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>
</div>

<!-- Delete Form -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<style>
    .border-left-warning {
        border-left: 4px solid #f6c23e !important;
    }
    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }
    .border-left-danger {
        border-left: 4px solid #e74a3b !important;
    }
    .border-left-primary {
        border-left: 4px solid #4e73df !important;
    }
    .text-xs {
        font-size: 0.7rem;
    }
    
    /* Custom Modal Styles */
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        overflow-y: auto;
    }
    
    .custom-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .custom-modal-dialog {
        max-width: 600px;
        width: 90%;
        margin: 2rem auto;
    }
    
    .custom-modal-content {
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    
    .custom-modal-header {
        padding: 1.5rem;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .custom-modal-header h5 {
        margin: 0;
        font-size: 1.25rem;
        color: #333;
    }
    
    .close-btn {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #999;
        padding: 0;
        width: 30px;
        height: 30px;
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
    
    .form-group-modal {
        margin-bottom: 1rem;
    }
    
    .form-group-modal label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #333;
    }
    
    .form-group-modal textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-family: inherit;
    }
    
    .btn-cancel {
        background: #6c757d;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
    }
    
    .btn-cancel:hover {
        background: #5a6268;
    }
    
    .btn-confirm {
        background: #007bff;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
    }
    
    .btn-confirm:hover {
        background: #0056b3;
    }
    
    .btn-confirm.btn-success {
        background: #28a745;
    }
    
    .btn-confirm.btn-success:hover {
        background: #218838;
    }
    
    .btn-confirm.btn-danger {
        background: #dc3545;
    }
    
    .btn-confirm.btn-danger:hover {
        background: #c82333;
    }
    
    #statusMessage {
        margin-top: 1rem;
        padding: 0.75rem;
        border-radius: 4px;
        font-weight: 500;
    }
    
    #statusMessage.text-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    #statusMessage.text-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 4px;
    }
    
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

<script>
    function updateStatus(donationId, status) {
        const modal = document.getElementById('statusModal');
        const form = document.getElementById('statusForm');
        const statusAction = document.getElementById('statusAction');
        const statusMessage = document.getElementById('statusMessage');
        const confirmBtn = document.getElementById('confirmBtn');
        
        form.action = `/admin/donations/${donationId}/status`;
        statusAction.value = status;
        
        if (status === 'approved') {
            statusMessage.textContent = '¿Está seguro de que desea aprobar esta donación?';
            statusMessage.className = 'text-success';
            confirmBtn.className = 'btn-confirm btn-success';
            confirmBtn.textContent = 'Aprobar';
        } else {
            statusMessage.textContent = '¿Está seguro de que desea rechazar esta donación?';
            statusMessage.className = 'text-danger';
            confirmBtn.className = 'btn-confirm btn-danger';
            confirmBtn.textContent = 'Rechazar';
        }
        
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeStatusModal() {
        const modal = document.getElementById('statusModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function viewDetails(donationId) {
        // Find donation data from table
        const row = event.target.closest('tr');
        const cells = row.cells;
        
        const details = `
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <p><strong>ID:</strong> ${cells[0].textContent}</p>
                    <p><strong>Usuario:</strong> ${cells[1].textContent.trim()}</p>
                    <p><strong>Donante:</strong> ${cells[2].textContent}</p>
                    <p><strong>Cédula/DNI:</strong> ${cells[3].textContent}</p>
                </div>
                <div>
                    <p><strong>Monto:</strong> ${cells[4].textContent}</p>
                    <p><strong>Método:</strong> ${cells[5].textContent}</p>
                    <p><strong>Referencia:</strong> ${cells[6].textContent}</p>
                    <p><strong>Estado:</strong> ${cells[7].innerHTML}</p>
                    <p><strong>Fecha:</strong> ${cells[8].textContent}</p>
                </div>
            </div>
        `;
        
        document.getElementById('detailsContent').innerHTML = details;
        const modal = document.getElementById('detailsModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeDetailsModal() {
        const modal = document.getElementById('detailsModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function deleteDonation(donationId) {
        if (confirm('¿Está seguro de que desea eliminar esta donación? Esta acción no se puede deshacer.')) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/donations/${donationId}`;
            form.submit();
        }
    }
    
    // Close modals when clicking outside
    document.getElementById('statusModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeStatusModal();
        }
    });
    
    document.getElementById('detailsModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDetailsModal();
        }
    });
    
    // Close modals with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeStatusModal();
            closeDetailsModal();
        }
    });
</script>
@endsection
