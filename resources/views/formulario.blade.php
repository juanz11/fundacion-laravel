@extends('layouts.app')

@section('title', 'Formulario Profesionales')

@section('styles')
<style>
    .form-page-header {
        background: linear-gradient(135deg, rgba(28, 76, 150, 0.75) 0%, rgba(28, 76, 150, 0.75) 100%),
                    url('{{ asset('images/banner-hero.png') }}') center/cover;
        color: white;
        padding: 6rem 2rem;
        text-align: center;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-page-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .form-wrapper {
        max-width: 900px;
        margin: 4rem auto;
        padding: 0 1.5rem;
    }

    .form-card {
        background: #ffffff;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .form-card h2 {
        margin-bottom: 1.5rem;
        color: var(--primary-color);
        text-align: center;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1.5rem 2rem;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.4rem;
        font-weight: 500;
        color: var(--text-dark);
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1rem;
        font-family: inherit;
        transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .submit-btn {
        width: 100%;
        background: var(--primary-color);
        color: #fff;
        padding: 0.9rem 1.5rem;
        border-radius: 6px;
        border: none;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s;
        margin-top: 1rem;
    }

    .submit-btn:hover {
        background: #0860b8;
    }

    @media (max-width: 768px) {
        .form-page-header h1 {
            font-size: 2rem;
        }

        .form-card {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<section class="form-page-header">
    <h1>Formulario para Profesionales</h1>
    <p>Completa todos los campos para registrar tus datos</p>
</section>

<div class="form-wrapper">
    <div class="form-card">
        <h2>Datos del Profesional</h2>
        <form>
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="nombre_completo">Nombre completo *</label>
                    <input type="text" id="nombre_completo" name="nombre_completo" required>
                </div>

                <div class="form-group">
                    <label for="cedula">Cédula *</label>
                    <input type="text" id="cedula" name="cedula" required>
                </div>

                <div class="form-group">
                    <label for="edad">Edad *</label>
                    <input type="number" id="edad" name="edad" min="18" max="120" required>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección *</label>
                    <input type="text" id="direccion" name="direccion" required>
                </div>

                <div class="form-group">
                    <label for="numero_colegiatura">Número de colegiatura *</label>
                    <input type="text" id="numero_colegiatura" name="numero_colegiatura" required>
                </div>

                <div class="form-group">
                    <label for="lugar_consulta">Dónde pasa consulta *</label>
                    <input type="text" id="lugar_consulta" name="lugar_consulta" required>
                </div>

                <div class="form-group">
                    <label for="especialidad">Especialidad *</label>
                    <input type="text" id="especialidad" name="especialidad" required>
                </div>

                <div class="form-group">
                    <label for="genero">Género *</label>
                    <select id="genero" name="genero" required>
                        <option value="">Seleccione una opción</option>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="submit-btn">Enviar</button>
        </form>
    </div>
</div>
@endsection
