@extends('layouts.app')

@section('title', 'Programas')

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

    .programs-section {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .program-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        margin-bottom: 3rem;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .program-card:hover {
        transform: translateY(-5px);
    }

    .program-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
    }

    .program-header h2 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .program-content {
        padding: 2rem;
    }

    .program-content h3 {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }

    .program-content ul {
        list-style: none;
        padding: 0;
    }

    .program-content ul li {
        padding: 0.5rem 0;
        padding-left: 2rem;
        position: relative;
    }

    .program-content ul li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: var(--secondary-color);
        font-weight: bold;
        font-size: 1.2rem;
    }

    .program-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .cta-section {
        background: #f9f9f9;
        padding: 4rem 2rem;
        text-align: center;
        margin-top: 4rem;
    }

    .cta-section h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .cta-section p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .program-header h2 {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <h1>Nuestros Programas</h1>
    <p>Conoce los programas que ofrecemos para apoyarte</p>
</section>

<!-- Programs Section -->
<section class="programs-section">
    <!-- Programa 1: Prevención -->
    <div class="program-card" id="prevencion">
        <div class="program-header">
            <div class="program-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h2>Programas y Planes de Prevención</h2>
            <p>Trabajamos proactivamente para prevenir crisis emocionales</p>
        </div>
        <div class="program-content">
            <h3>Objetivos del Programa</h3>
            <p>Nuestros programas de prevención están diseñados para identificar factores de riesgo y fortalecer los factores protectores en la comunidad.</p>
            
            <h3>Actividades Principales</h3>
            <ul>
                <li>Talleres educativos sobre salud mental</li>
                <li>Charlas en instituciones educativas</li>
                <li>Campañas de concientización comunitaria</li>
                <li>Grupos de apoyo preventivo</li>
                <li>Capacitación a líderes comunitarios</li>
                <li>Programas de detección temprana</li>
            </ul>

            <h3>Beneficios</h3>
            <ul>
                <li>Reducción de factores de riesgo</li>
                <li>Fortalecimiento de la resiliencia comunitaria</li>
                <li>Mayor conciencia sobre salud mental</li>
                <li>Creación de redes de apoyo</li>
            </ul>
        </div>
    </div>

    <!-- Programa 2: Intervención Inmediata -->
    <div class="program-card" id="intervencion">
        <div class="program-header">
            <div class="program-icon">
                <i class="fas fa-ambulance"></i>
            </div>
            <h2>Programas y Planes de Intervención Inmediata</h2>
            <p>Respuesta rápida y efectiva en momentos de crisis</p>
        </div>
        <div class="program-content">
            <h3>Objetivos del Programa</h3>
            <p>Brindar atención inmediata y profesional a personas en crisis emocional, garantizando su seguridad y bienestar.</p>
            
            <h3>Servicios Disponibles</h3>
            <ul>
                <li>Línea de crisis 24/7</li>
                <li>Primeros auxilios psicológicos</li>
                <li>Intervención en crisis</li>
                <li>Evaluación de riesgo</li>
                <li>Derivación a servicios especializados</li>
                <li>Seguimiento post-crisis</li>
            </ul>

            <h3>Cómo Acceder</h3>
            <ul>
                <li>Llamada telefónica: 0414-4008240 / 0414-4265181</li>
                <li>WhatsApp: Contacto directo</li>
                <li>Correo electrónico: fundabl25@fundaciondavidbrandt.org</li>
                <li>Visita presencial: Previa cita</li>
            </ul>
        </div>
    </div>

    <!-- Programa 3: Postvención -->
    <div class="program-card" id="postvencion">
        <div class="program-header">
            <div class="program-icon">
                <i class="fas fa-hands-helping"></i>
            </div>
            <h2>Programas y Planes de Postvención</h2>
            <p>Apoyo continuo después de una crisis</p>
        </div>
        <div class="program-content">
            <h3>Objetivos del Programa</h3>
            <p>Acompañar a las personas y comunidades en el proceso de recuperación después de una crisis o pérdida.</p>
            
            <h3>Servicios de Postvención</h3>
            <ul>
                <li>Grupos de apoyo para sobrevivientes</li>
                <li>Terapia individual y familiar</li>
                <li>Acompañamiento en el proceso de duelo</li>
                <li>Talleres de sanación emocional</li>
                <li>Apoyo a largo plazo</li>
                <li>Reintegración comunitaria</li>
            </ul>

            <h3>Proceso de Recuperación</h3>
            <ul>
                <li>Evaluación inicial de necesidades</li>
                <li>Plan de apoyo personalizado</li>
                <li>Sesiones de seguimiento regular</li>
                <li>Conexión con recursos comunitarios</li>
                <li>Monitoreo del progreso</li>
            </ul>
        </div>
    </div>

    <!-- Programa Especial: Una Llamada, Una Vida -->
    <div class="program-card">
        <div class="program-header">
            <div class="program-icon">
                <i class="fas fa-phone-volume"></i>
            </div>
            <h2>Una Llamada, Una Vida</h2>
            <p>Programa de atención telefónica inmediata</p>
        </div>
        <div class="program-content">
            <h3>Sobre el Programa</h3>
            <p>«Una Llamada, Una Vida» es nuestro programa insignia de primeros auxilios psicológicos telefónicos, disponible para cualquier persona que necesite apoyo emocional inmediato.</p>
            
            <h3>Características</h3>
            <ul>
                <li>Disponibilidad 24/7</li>
                <li>Atención profesional y confidencial</li>
                <li>Sin costo para el usuario</li>
                <li>Respuesta inmediata</li>
                <li>Escucha activa y empática</li>
                <li>Orientación y derivación cuando sea necesario</li>
            </ul>

            <h3>¿Cuándo Llamar?</h3>
            <ul>
                <li>Cuando sientas que no puedes más</li>
                <li>Si tienes pensamientos de hacerte daño</li>
                <li>Cuando necesites hablar con alguien</li>
                <li>Si estás pasando por una crisis emocional</li>
                <li>Cuando necesites orientación</li>
            </ul>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <h2>¿Necesitas Ayuda?</h2>
    <p>No estás solo. Estamos aquí para apoyarte en cada paso del camino. Contáctanos ahora.</p>
    <a href="https://wa.me/584144008240?text=Hola%20necesito%20mas%20informacion" class="btn btn-primary">Contactar Ahora</a>
</section>
@endsection
