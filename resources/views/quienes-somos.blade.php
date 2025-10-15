@extends('layouts.app')

@section('title', 'Quiénes Somos')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, rgba(28, 76, 150, 0.75) 0%, rgba(28, 76, 150, 0.75) 100%),
                    url('{{ asset('images/banner-hero.png') }}') center/cover;
        color: white;
        padding: 6rem 2rem;
        text-align: center;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 350px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .page-header h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 4rem 1.5rem;
            min-height: 300px;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .page-header p {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .page-header {
            padding: 3rem 1rem;
            min-height: 250px;
        }

        .page-header h1 {
            font-size: 1.5rem;
        }
    }

    .content-section {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 4rem;
        align-items: center;
    }

    .about-image img {
        width: 100%;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .about-text h2 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        color: var(--primary-color);
    }

    .about-text p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-light);
        margin-bottom: 1rem;
    }

    .values-section {
        background: #f9f9f9;
        padding: 4rem 2rem;
        margin: 4rem 0;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 2rem auto 0;
    }

    .value-card {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .value-card .icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .value-card h3 {
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }

    .team-section {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .team-member {
        text-align: center;
    }

    .team-member img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 1rem;
        object-fit: cover;
    }

    .team-member h3 {
        margin-bottom: 0.5rem;
    }

    .team-member p {
        color: var(--text-light);
    }

    @media (max-width: 768px) {
        .about-grid {
            grid-template-columns: 1fr;
        }

        .page-header h1 {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <h1>Quiénes Somos</h1>
    <p>Conoce más sobre nuestra misión y visión</p>
</section>

<!-- About Section -->
<section class="content-section">
    <div class="about-grid">
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800" alt="Nuestra Fundación">
        </div>
        <div class="about-text">
            <h2>Nuestra Historia</h2>
            <p>La Fundación David Brandt nace del compromiso de brindar apoyo emocional y asistencia en crisis a personas que atraviesan momentos difíciles en sus vidas.</p>
            <p>Creemos firmemente que nadie debe enfrentar sus crisis solo, y por eso trabajamos incansablemente para crear espacios seguros donde las personas puedan expresar sus sentimientos y recibir el apoyo que necesitan.</p>
        </div>
    </div>

    <div class="about-grid">
        <div class="about-text">
            <h2>Nuestra Misión</h2>
            <p>Proporcionar apoyo emocional inmediato y efectivo a personas en crisis, promoviendo la salud mental y el bienestar emocional en nuestra comunidad.</p>
            <p>Trabajamos para crear una red de apoyo sólida que permita a las personas superar sus dificultades y encontrar nuevamente el camino hacia la esperanza y la sanación.</p>
        </div>
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=800" alt="Nuestra Misión">
        </div>
    </div>

    <div class="about-grid">
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=800" alt="Nuestra Visión">
        </div>
        <div class="about-text">
            <h2>Nuestra Visión</h2>
            <p>Ser la organización líder en Venezuela en la prevención del suicidio y el apoyo emocional, reconocida por nuestra excelencia en la atención y nuestro compromiso con la comunidad.</p>
            <p>Aspiramos a crear una sociedad donde la salud mental sea una prioridad y donde todas las personas tengan acceso a los recursos y el apoyo que necesitan para vivir vidas plenas y significativas.</p>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <h2 class="section-title">Nuestros Valores</h2>
    <div class="values-grid">
        <div class="value-card">
            <div class="icon">
                <i class="fas fa-heart"></i>
            </div>
            <h3>Empatía</h3>
            <p>Nos ponemos en el lugar del otro para comprender sus sentimientos y necesidades.</p>
        </div>

        <div class="value-card">
            <div class="icon">
                <i class="fas fa-hands-helping"></i>
            </div>
            <h3>Compromiso</h3>
            <p>Estamos dedicados a brindar el mejor apoyo posible a quienes lo necesitan.</p>
        </div>

        <div class="value-card">
            <div class="icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h3>Confidencialidad</h3>
            <p>Respetamos la privacidad y confidencialidad de todas las personas que atendemos.</p>
        </div>

        <div class="value-card">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <h3>Comunidad</h3>
            <p>Creemos en el poder de la comunidad para sanar y apoyar a sus miembros.</p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <h2 class="section-title">Nuestro Equipo</h2>
    <div class="team-grid">
        <div class="team-member">
            <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.webp?fit=2560%2C2560&ssl=1" alt="Equipo">
            <h3>Equipo Profesional</h3>
            <p>Psicólogos y Consejeros</p>
        </div>

        <div class="team-member">
            <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.webp?fit=2560%2C2560&ssl=1" alt="Equipo">
            <h3>Voluntarios</h3>
            <p>Apoyo Comunitario</p>
        </div>

        <div class="team-member">
            <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.webp?fit=2560%2C2560&ssl=1" alt="Equipo">
            <h3>Coordinadores</h3>
            <p>Gestión de Programas</p>
        </div>
    </div>
</section>
@endsection
