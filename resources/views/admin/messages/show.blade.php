@extends('layouts.admin')

@section('title', 'Detalle del Mensaje')
@section('page-title', 'Detalle del Mensaje')

@section('styles')
<style>
    .message-detail {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .message-header {
        border-bottom: 2px solid var(--bg-light);
        padding-bottom: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .user-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .user-details h3 {
        margin-bottom: 0.25rem;
    }

    .user-details p {
        color: var(--text-light);
        margin: 0;
    }

    .message-meta {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .meta-item {
        background: var(--bg-light);
        padding: 1rem;
        border-radius: 8px;
    }

    .meta-item label {
        display: block;
        font-size: 0.85rem;
        color: var(--text-light);
        margin-bottom: 0.25rem;
    }

    .meta-item strong {
        font-size: 1.1rem;
        color: var(--text-dark);
    }

    .message-content {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 8px;
        border-left: 4px solid var(--primary-color);
        margin-bottom: 1.5rem;
    }

    .message-content h4 {
        margin-bottom: 1rem;
        color: var(--text-dark);
    }

    .message-text {
        line-height: 1.8;
        color: var(--text-dark);
        white-space: pre-wrap;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .status-form {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }
</style>
@endsection

@section('content')
<div class="message-detail">
    <div class="message-header">
        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr($message->user->name, 0, 1)) }}
            </div>
            <div class="user-details">
                <h3>{{ $message->user->name }}</h3>
                <p><i class="fas fa-envelope"></i> {{ $message->user->email }}</p>
                @if($message->phone)
                    <p><i class="fas fa-phone"></i> {{ $message->phone }}</p>
                @endif
            </div>
        </div>

        <div class="message-meta">
            <div class="meta-item">
                <label>Estado</label>
                <strong>
                    <span class="badge badge-{{ $message->status }}">
                        @if($message->status === 'nuevo')
                            <i class="fas fa-envelope"></i> Nuevo
                        @elseif($message->status === 'leido')
                            <i class="fas fa-envelope-open"></i> Leído
                        @else
                            <i class="fas fa-check-double"></i> Respondido
                        @endif
                    </span>
                </strong>
            </div>

            <div class="meta-item">
                <label>Fecha de Envío</label>
                <strong>{{ $message->created_at->format('d/m/Y H:i') }}</strong>
            </div>

            @if($message->read_at)
            <div class="meta-item">
                <label>Leído el</label>
                <strong>{{ $message->read_at->format('d/m/Y H:i') }}</strong>
            </div>
            @endif

            <div class="meta-item">
                <label>Rol del Usuario</label>
                <strong>
                    <span class="badge badge-{{ $message->user->role === 'admin' ? 'admin' : 'user' }}">
                        {{ $message->user->role === 'admin' ? 'Admin' : 'Usuario' }}
                    </span>
                </strong>
            </div>
        </div>
    </div>

    <div class="message-content">
        <h4><i class="fas fa-tag"></i> Asunto: {{ $message->subject }}</h4>
        <div class="message-text">{{ $message->message }}</div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Volver a la Lista
        </a>

        <a href="mailto:{{ $message->user->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary">
            <i class="fas fa-reply"></i> Responder por Email
        </a>

        @if($message->phone)
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}?text=Hola%20{{ urlencode($message->user->name) }},%20te%20contacto%20respecto%20a%20tu%20mensaje" class="btn btn-primary" target="_blank">
            <i class="fab fa-whatsapp"></i> Responder por WhatsApp
        </a>
        @endif

        <form method="POST" action="{{ route('admin.messages.update-status', $message) }}" class="status-form">
            @csrf
            @method('PATCH')
            <select name="status" class="form-control" onchange="this.form.submit()">
                <option value="nuevo" {{ $message->status === 'nuevo' ? 'selected' : '' }}>Nuevo</option>
                <option value="leido" {{ $message->status === 'leido' ? 'selected' : '' }}>Leído</option>
                <option value="respondido" {{ $message->status === 'respondido' ? 'selected' : '' }}>Respondido</option>
            </select>
        </form>

        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" style="margin-left: auto;" onsubmit="return confirm('¿Estás seguro de eliminar este mensaje?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Eliminar Mensaje
            </button>
        </form>
    </div>
</div>
@endsection
