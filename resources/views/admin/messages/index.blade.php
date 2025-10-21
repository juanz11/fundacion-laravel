@extends('layouts.admin')

@section('title', 'Mensajes de Contacto')
@section('page-title', 'Mensajes de Contacto')

@section('styles')
<style>
    .filters {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 0.5rem 1rem;
        border: 2px solid #e0e0e0;
        background: white;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .filter-btn:hover,
    .filter-btn.active {
        border-color: var(--primary-color);
        background: var(--primary-color);
        color: white;
    }

    .search-box {
        flex: 1;
        min-width: 250px;
    }

    .search-box input {
        width: 100%;
        padding: 0.5rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 5px;
    }

    .message-row {
        cursor: pointer;
        transition: background 0.2s;
    }

    .message-row:hover {
        background: #f8f9fa !important;
    }

    .message-row.unread {
        background: #e3f2fd;
        font-weight: 600;
    }

    .message-preview {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: var(--text-light);
    }

    .badge-nuevo {
        background: #e74c3c;
        color: white;
    }

    .badge-leido {
        background: #3498db;
        color: white;
    }

    .badge-respondido {
        background: #27ae60;
        color: white;
    }
</style>
@endsection

@section('content')
<!-- Stats -->
<div class="stats-grid" style="margin-bottom: 2rem;">
    <div class="stat-card">
        <div class="stat-icon red">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\Message::new()->count() }}</h3>
            <p>Mensajes Nuevos</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-envelope-open"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\Message::read()->count() }}</h3>
            <p>Mensajes Leídos</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-check-double"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\Message::responded()->count() }}</h3>
            <p>Mensajes Respondidos</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">
            <i class="fas fa-inbox"></i>
        </div>
        <div class="stat-info">
            <h3>{{ \App\Models\Message::count() }}</h3>
            <p>Total de Mensajes</p>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="card">
    <form method="GET" action="{{ route('admin.messages.index') }}">
        <div class="filters">
            <button type="submit" name="status" value="all" class="filter-btn {{ request('status', 'all') === 'all' ? 'active' : '' }}">
                <i class="fas fa-inbox"></i> Todos
            </button>
            <button type="submit" name="status" value="nuevo" class="filter-btn {{ request('status') === 'nuevo' ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Nuevos
            </button>
            <button type="submit" name="status" value="leido" class="filter-btn {{ request('status') === 'leido' ? 'active' : '' }}">
                <i class="fas fa-envelope-open"></i> Leídos
            </button>
            <button type="submit" name="status" value="respondido" class="filter-btn {{ request('status') === 'respondido' ? 'active' : '' }}">
                <i class="fas fa-check-double"></i> Respondidos
            </button>
            
            <div class="search-box">
                <input type="text" name="search" placeholder="Buscar mensajes..." value="{{ request('search') }}">
            </div>
        </div>
    </form>
</div>

<!-- Messages Table -->
<div class="card">
    <div class="card-header">
        <h2>Lista de Mensajes ({{ $messages->total() }})</h2>
    </div>

    @if($messages->count() > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th>Asunto</th>
                        <th>Mensaje</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr class="message-row {{ $message->status === 'nuevo' ? 'unread' : '' }}" onclick="window.location='{{ route('admin.messages.show', $message) }}'">
                        <td>
                            <span class="badge badge-{{ $message->status }}">
                                @if($message->status === 'nuevo')
                                    <i class="fas fa-envelope"></i> Nuevo
                                @elseif($message->status === 'leido')
                                    <i class="fas fa-envelope-open"></i> Leído
                                @else
                                    <i class="fas fa-check-double"></i> Respondido
                                @endif
                            </span>
                        </td>
                        <td>
                            <strong>{{ $message->user->name }}</strong><br>
                            <small style="color: var(--text-light);">{{ $message->user->email }}</small>
                        </td>
                        <td><strong>{{ $message->subject }}</strong></td>
                        <td>
                            <div class="message-preview">{{ $message->message }}</div>
                        </td>
                        <td>{{ $message->phone ?? '-' }}</td>
                        <td>
                            {{ $message->created_at->format('d/m/Y') }}<br>
                            <small style="color: var(--text-light);">{{ $message->created_at->format('H:i') }}</small>
                        </td>
                        <td onclick="event.stopPropagation()">
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-primary btn-sm" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" style="display: inline;" onsubmit="return confirm('¿Eliminar este mensaje?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem;">
            {{ $messages->links() }}
        </div>
    @else
        <p style="text-align: center; padding: 3rem; color: var(--text-light);">
            <i class="fas fa-inbox" style="font-size: 3rem; display: block; margin-bottom: 1rem;"></i>
            No hay mensajes para mostrar.
        </p>
    @endif
</div>
@endsection
