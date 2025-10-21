@extends('layouts.app')

@section('title', 'Registro')

@section('styles')
<style>
    .auth-container {
        min-height: calc(100vh - 400px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .auth-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        padding: 3rem;
        max-width: 450px;
        width: 100%;
    }

    .auth-card h2 {
        text-align: center;
        margin-bottom: 2rem;
        color: var(--text-dark);
        font-size: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--text-dark);
    }

    .form-group input {
        width: 100%;
        padding: 0.8rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-group input:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .form-group .error {
        color: #e74c3c;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .btn-submit {
        width: 100%;
        padding: 1rem;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-submit:hover {
        background: #0860b8;
    }

    .auth-links {
        text-align: center;
        margin-top: 1.5rem;
    }

    .auth-links a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
    }

    .auth-links a:hover {
        text-decoration: underline;
    }

    .password-hint {
        font-size: 0.875rem;
        color: var(--text-light);
        margin-top: 0.25rem;
    }
</style>
@endsection

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <h2>Crear Cuenta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nombre Completo</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                <div class="password-hint">Mínimo 8 caracteres</div>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-submit">Registrarse</button>

            <div class="auth-links">
                <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
