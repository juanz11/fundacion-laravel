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
        padding: 2.5rem 2rem;
        border-radius: 18px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        border-top: 6px solid var(--primary-color);
    }

    .form-card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.8rem;
    }

    .form-logo {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .form-card-title {
        margin: 0;
        font-size: 1.6rem;
        color: var(--primary-color);
    }

    .form-card-subtitle {
        margin: 0.2rem 0 0;
        color: var(--text-light);
        font-size: 0.95rem;
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
        <div class="form-card-header">
            <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.webp?fit=2560%2C2560&ssl=1" alt="Logo Fundación David Brandt" class="form-logo">
            <div>
                <h2 class="form-card-title">Formulario para Profesionales</h2>
                <p class="form-card-subtitle">Registra tus datos para colaborar con nuestros programas de atención y apoyo.</p>
            </div>
        </div>

        <div style="background: #fff3cd; border: 1px solid #ffeeba; color: #856404; border-radius: 8px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; font-size: 0.95rem;">
            La Fundación David Brandt se encuentra en la búsqueda de Psicólogos Clínicos voluntarios que estén dispuestos a apoyarnos a través de nuestro programa "Una Llamada, Una Vida", en la atención de personas que atraviesan una crisis de salud mental, brindando los Primeros Auxilios Psicológicos y orientación en crisis. Si estás interesado, por favor rellena el siguiente formulario y nuestro equipo se estará comunicando en la brevedad posible.
        </div>

        @if(session('success'))
            <div class="alert alert-success" style="margin-bottom: 1.5rem;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
            <script>
                alert(@json(session('success')));
            </script>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" style="margin-bottom: 1.5rem;">
                <ul style="margin: 0; padding-left: 1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('professional-survey.store') }}">
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
