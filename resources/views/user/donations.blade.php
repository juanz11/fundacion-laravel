@extends('layouts.app')

@section('title', 'Mis Donaciones')

@section('styles')
<style>
    .donations-section {
        min-height: 70vh;
        padding: 3rem 2rem;
        background: #f5f7fa;
    }

    .donations-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .page-header {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .page-header h1 {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .page-header p {
        color: var(--text-light);
    }

    .back-btn {
        background: var(--primary-color);
        color: white;
        padding: 0.7rem 1.5rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .back-btn:hover {
        background: #0860b8;
    }

    .donations-summary {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .summary-card {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border-left: 4px solid var(--primary-color);
    }

    .summary-card h3 {
        color: var(--text-light);
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }

    .summary-card .value {
        color: var(--text-dark);
        font-size: 2rem;
        font-weight: 700;
    }

    .donations-table-card {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .donations-table-card h2 {
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-icon {
        width: 100px;
        height: 100px;
        background: #f5f7fa;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .empty-icon i {
        font-size: 3rem;
        color: var(--text-light);
    }

    .empty-state h3 {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
    }

    .empty-state p {
        color: var(--text-light);
        margin-bottom: 1.5rem;
    }

    .donate-btn {
        background: var(--secondary-color);
        color: white;
        padding: 0.8rem 2rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: background 0.3s;
    }

    .donate-btn:hover {
        background: #1fb855;
    }

    .donations-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .donations-table th {
        background: #f5f7fa;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: var(--text-dark);
        border-bottom: 2px solid #e0e0e0;
    }

    .donations-table td {
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
        color: var(--text-dark);
    }

    .donations-table tr:hover {
        background: #f9f9f9;
    }

    .status-badge {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .status-badge.completed {
        background: #e8f5e9;
        color: #2e7d32;
    }

    .status-badge.pending {
        background: #fff3e0;
        color: #f57c00;
    }

    .status-badge.rejected {
        background: #ffebee;
        color: #c62828;
    }

    .amount {
        font-weight: 700;
        color: var(--primary-color);
    }

    .register-donation-btn {
        background: var(--secondary-color);
        color: white;
        padding: 0.8rem 2rem;
        border-radius: 5px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: background 0.3s;
        font-size: 1rem;
    }

    .register-donation-btn:hover {
        background: #1fb855;
    }

    /* Modal Styles */
    .modal {
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

    .modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .modal-header h2 {
        color: var(--text-dark);
        margin: 0;
    }

    .close-modal {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: var(--text-light);
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close-modal:hover {
        color: var(--text-dark);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
        font-weight: 600;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        font-family: inherit;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
    }

    .btn-submit {
        background: var(--primary-color);
        color: white;
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-submit:hover {
        background: #0860b8;
    }

    .btn-cancel {
        background: #e0e0e0;
        color: var(--text-dark);
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-cancel:hover {
        background: #d0d0d0;
    }

    .alert {
        padding: 1rem;
        border-radius: 5px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background: #e8f5e9;
        color: #2e7d32;
        border-left: 4px solid #2e7d32;
    }

    .alert-error {
        background: #ffebee;
        color: #c62828;
        border-left: 4px solid #c62828;
    }

    @media (max-width: 768px) {
        .donations-table {
            font-size: 0.9rem;
        }

        .donations-table th,
        .donations-table td {
            padding: 0.7rem 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="donations-section">
    <div class="donations-container">
        <div class="page-header">
            <div>
                <h1>Lista de Donaciones</h1>
                <p>Historial de tus contribuciones a la fundación</p>
            </div>
            <a href="{{ route('user.dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Volver al Panel
            </a>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <ul style="margin: 0.5rem 0 0 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Summary Cards -->
        <div class="donations-summary">
            <div class="summary-card">
                <h3>Total Donado</h3>
                <div class="value">${{ number_format($stats['total_donated'], 2) }}</div>
            </div>
            <div class="summary-card">
                <h3>Número de Donaciones</h3>
                <div class="value">{{ $stats['total_count'] }}</div>
            </div>
            <div class="summary-card">
                <h3>Última Donación</h3>
                <div class="value" style="font-size: 1.2rem;">
                    @if($stats['last_donation'])
                        {{ $stats['last_donation']->created_at->format('d/m/Y') }}
                    @else
                        N/A
                    @endif
                </div>
            </div>
        </div>

        <!-- Donations Table -->
        <div class="donations-table-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h2 style="margin: 0;">
                    <i class="fas fa-list"></i>
                    Historial de Donaciones
                </h2>
                <button class="register-donation-btn" onclick="openModal()">
                    <i class="fas fa-plus-circle"></i>
                    Registrar Mi Donación
                </button>
            </div>

            @if($donations->isEmpty())
                <!-- Empty State -->
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Aún no has registrado donaciones</h3>
                    <p>Tu apoyo es fundamental para nuestra misión. Cada contribución nos ayuda a seguir brindando apoyo emocional a quienes lo necesitan.</p>
                    <button class="donate-btn" onclick="openModal()">
                        <i class="fas fa-plus-circle"></i>
                        Registrar Mi Donación
                    </button>
                </div>
            @else
                <!-- Table -->
                <table class="donations-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Método</th>
                            <th>Estado</th>
                            <th>Referencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $donation)
                            <tr>
                                <td>{{ $donation->created_at->format('d/m/Y') }}</td>
                                <td class="amount">${{ number_format($donation->amount, 2) }}</td>
                                <td>{{ $donation->payment_method ?? 'N/A' }}</td>
                                <td>
                                    @if($donation->status === 'approved')
                                        <span class="status-badge completed">Aprobada</span>
                                    @elseif($donation->status === 'pending')
                                        <span class="status-badge pending">Pendiente</span>
                                    @else
                                        <span class="status-badge rejected">Rechazada</span>
                                    @endif
                                </td>
                                <td>{{ $donation->reference_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Modal de Registro de Donación -->
    <div id="donationModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-hand-holding-heart"></i> Registrar Donación</h2>
                <button class="close-modal" onclick="closeModal()">&times;</button>
            </div>

            <form method="POST" action="{{ route('user.donations.store') }}">
                @csrf
                
                <div class="form-group">
                    <label for="reference_number">Número de Referencia del Pago *</label>
                    <input type="text" id="reference_number" name="reference_number" required 
                           placeholder="Ej: 123456789" value="{{ old('reference_number') }}">
                </div>

                <div class="form-group">
                    <label for="donor_name">Nombre Completo del Donante *</label>
                    <input type="text" id="donor_name" name="donor_name" required 
                           placeholder="Ej: Juan Pérez" value="{{ old('donor_name') }}">
                </div>

                <div class="form-group">
                    <label for="donor_id_number">Cédula o DNI *</label>
                    <input type="text" id="donor_id_number" name="donor_id_number" required 
                           placeholder="Ej: V-12345678 o 12345678" value="{{ old('donor_id_number') }}">
                </div>

                <div class="form-group">
                    <label for="amount">Monto de la Donación ($) *</label>
                    <input type="number" id="amount" name="amount" step="0.01" min="0.01" required 
                           placeholder="Ej: 50.00" value="{{ old('amount') }}">
                </div>

                <div class="form-group">
                    <label for="payment_method">Método de Pago</label>
                    <select id="payment_method" name="payment_method">
                        <option value="">Seleccione un método</option>
                        <option value="Transferencia Bancaria" {{ old('payment_method') == 'Transferencia Bancaria' ? 'selected' : '' }}>Transferencia Bancaria</option>
                        <option value="Pago Móvil" {{ old('payment_method') == 'Pago Móvil' ? 'selected' : '' }}>Pago Móvil</option>
                        <option value="Zelle" {{ old('payment_method') == 'Zelle' ? 'selected' : '' }}>Zelle</option>
                        <option value="PayPal" {{ old('payment_method') == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                        <option value="Efectivo" {{ old('payment_method') == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                        <option value="Otro" {{ old('payment_method') == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="notes">Notas Adicionales (Opcional)</label>
                    <textarea id="notes" name="notes" placeholder="Agregue cualquier información adicional sobre su donación...">{{ old('notes') }}</textarea>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Cancelar</button>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-check"></i> Registrar Donación
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function openModal() {
        document.getElementById('donationModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('donationModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('donationModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>
@endsection
