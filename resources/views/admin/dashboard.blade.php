@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\User::count() }}</h3>
            <p>Total Usuarios</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-user-shield"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\User::where('role', 'admin')->count() }}</h3>
            <p>Administradores</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">
            <i class="fas fa-user"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\User::where('role', 'usuario')->count() }}</h3>
            <p>Usuarios Comunes</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon red">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\User::whereDate('created_at', today())->count() }}</h3>
            <p>Nuevos Hoy</p>
        </div>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-photo-video"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\Media::count() }}</h3>
            <p>Archivos de Medios</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-image"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\Media::where('type', 'image')->count() }}</h3>
            <p>Imágenes</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\Media::where('type', 'document')->count() }}</h3>
            <p>Documentos</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon red">
            <i class="fas fa-hdd"></i>
        </div>
        <div class="stat-info">
            <h3>{{ number_format(\App\Models\Media::sum('size') / 1024 / 1024, 2) }} MB</h3>
            <p>Espacio Usado</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Bienvenido al Panel Administrativo</h2>
    </div>
    <p>Desde aquí puedes gestionar todos los aspectos de la Fundación David Brandt.</p>
    <p>Utiliza el menú lateral para navegar entre las diferentes secciones.</p>
</div>

<div class="card">
    <div class="card-header">
        <h2>Últimos Usuarios Registrados</h2>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @forelse(\App\Models\User::latest()->take(5)->get() as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge badge-{{ $user->role === 'admin' ? 'admin' : 'user' }}">
                            {{ $user->role === 'admin' ? 'Admin' : 'Usuario' }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center;">No hay usuarios registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
