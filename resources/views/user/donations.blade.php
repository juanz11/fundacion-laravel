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

    .amount {
        font-weight: 700;
        color: var(--primary-color);
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

        <!-- Summary Cards -->
        <div class="donations-summary">
            <div class="summary-card">
                <h3>Total Donado</h3>
                <div class="value">$0.00</div>
            </div>
            <div class="summary-card">
                <h3>Número de Donaciones</h3>
                <div class="value">0</div>
            </div>
            <div class="summary-card">
                <h3>Última Donación</h3>
                <div class="value" style="font-size: 1.2rem;">N/A</div>
            </div>
        </div>

        <!-- Donations Table -->
        <div class="donations-table-card">
            <h2>
                <i class="fas fa-list"></i>
                Historial de Donaciones
            </h2>

            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Aún no has realizado donaciones</h3>
                <p>Tu apoyo es fundamental para nuestra misión. Cada contribución nos ayuda a seguir brindando apoyo emocional a quienes lo necesitan.</p>
                <a href="{{ url('/donar') }}" class="donate-btn">
                    <i class="fas fa-hand-holding-heart"></i>
                    Realizar una Donación
                </a>
            </div>

            <!-- Table (will be shown when there are donations) -->
            <!-- Uncomment this section when donation functionality is implemented
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
                    <tr>
                        <td>01/01/2024</td>
                        <td class="amount">$50.00</td>
                        <td>Transferencia</td>
                        <td><span class="status-badge completed">Completada</span></td>
                        <td>#DON-001</td>
                    </tr>
                </tbody>
            </table>
            -->
        </div>
    </div>
</div>
@endsection
