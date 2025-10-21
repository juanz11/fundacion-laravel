@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')
@section('page-title', 'Gestión de Usuarios')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Lista de Usuarios</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.update-role', $user) }}" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <select name="role" onchange="this.form.submit()" {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="usuario" {{ $user->role === 'usuario' ? 'selected' : '' }}>Usuario</option>
                            </select>
                        </form>
                    </td>
                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($user->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.users.delete', $user) }}" style="display: inline;" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                        @else
                        <span class="badge badge-admin">Tu cuenta</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No hay usuarios registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 1.5rem;">
        {{ $users->links() }}
    </div>
</div>
@endsection
