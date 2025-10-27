@extends('layouts.app')

@section('title', 'Mi Panel')

@section('styles')
<style>
    .user-dashboard {
        min-height: 70vh;
        padding: 3rem 2rem;
        background: #f5f7fa;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .dashboard-header {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
    }

    .dashboard-header h1 {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .dashboard-header p {
        color: var(--text-light);
        font-size: 1.1rem;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .dashboard-card {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: transform 0.3s, box-shadow 0.3s;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .card-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .card-icon i {
        font-size: 1.8rem;
        color: white;
    }

    .dashboard-card h3 {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
    }

    .dashboard-card p {
        color: var(--text-light);
        margin-bottom: 1rem;
    }

    .card-badge {
        display: inline-block;
        background: #e3f2fd;
        color: #1976d2;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .card-badge.coming-soon {
        background: #fff3e0;
        color: #f57c00;
    }

    .user-info {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }

    .user-info h2 {
        margin-bottom: 0.5rem;
    }

    .user-info p {
        opacity: 0.9;
    }
</style>
@endsection

@section('content')
<div class="user-dashboard">
    <div class="dashboard-container">
        <div class="user-info">
            <h2>¡Bienvenido, {{ auth()->user()->name }}!</h2>
            <p>Accede a tus cursos y revisa tus donaciones desde aquí</p>
        </div>

        <div class="dashboard-header">
            <h1>Mi Panel de Usuario</h1>
            <p>Gestiona tu información y accede a tus recursos</p>
        </div>

        <div class="dashboard-grid">
            <!-- Mis Cursos Card -->
            <a href="{{ route('user.courses') }}" class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Mis Cursos</h3>
                <p>Accede a tus cursos y materiales de aprendizaje</p>
                <span class="card-badge coming-soon">Próximamente</span>
            </a>

            <!-- Lista de Donaciones Card -->
            <a href="{{ route('user.donations') }}" class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Lista de Donaciones</h3>
                <p>Revisa el historial de tus donaciones a la fundación</p>
                <span class="card-badge">Disponible</span>
            </a>

            <!-- Perfil Card -->
            <div class="dashboard-card" style="opacity: 0.7; cursor: not-allowed;">
                <div class="card-icon">
                    <i class="fas fa-user"></i>
                </div>
                <h3>Mi Perfil</h3>
                <p>Actualiza tu información personal</p>
                <span class="card-badge coming-soon">Próximamente</span>
            </div>
        </div>
    </div>
</div>
@endsection
