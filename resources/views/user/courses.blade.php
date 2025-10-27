@extends('layouts.app')

@section('title', 'Mis Cursos')

@section('styles')
<style>
    .courses-section {
        min-height: 70vh;
        padding: 3rem 2rem;
        background: #f5f7fa;
    }

    .courses-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .page-header {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-header h1 {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .page-header p {
        color: var(--text-light);
    }

    .back-btn {
        background: var(--primary-color);
        color: white;
        padding: 0.7rem 1.5rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .back-btn:hover {
        background: #0860b8;
    }

    .coming-soon-card {
        background: white;
        padding: 4rem 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        text-align: center;
    }

    .coming-soon-icon {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
    }

    .coming-soon-icon i {
        font-size: 3.5rem;
        color: white;
    }

    .coming-soon-card h2 {
        color: var(--text-dark);
        margin-bottom: 1rem;
        font-size: 2rem;
    }

    .coming-soon-card p {
        color: var(--text-light);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto 2rem;
        line-height: 1.8;
    }

    .feature-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
        text-align: left;
    }

    .feature-item {
        background: #f9f9f9;
        padding: 1.5rem;
        border-radius: 8px;
        border-left: 4px solid var(--primary-color);
    }

    .feature-item i {
        color: var(--primary-color);
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .feature-item h3 {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .feature-item p {
        color: var(--text-light);
        font-size: 0.95rem;
        margin: 0;
    }

    .badge {
        display: inline-block;
        background: #fff3e0;
        color: #f57c00;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<div class="courses-section">
    <div class="courses-container">
        <div class="page-header">
            <div>
                <h1>Mis Cursos</h1>
                <p>Accede a tus cursos y materiales de aprendizaje</p>
            </div>
            <a href="{{ route('user.dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Volver al Panel
            </a>
        </div>

        <div class="coming-soon-card">
            <div class="coming-soon-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            
            <span class="badge">Próximamente</span>
            <h2>Sección de Cursos en Desarrollo</h2>
            <p>
                Estamos trabajando en una plataforma completa de cursos para brindarte la mejor experiencia de aprendizaje. 
                Pronto podrás acceder a contenido educativo de calidad sobre prevención, intervención y apoyo emocional.
            </p>

            <div class="feature-list">
                <div class="feature-item">
                    <i class="fas fa-video"></i>
                    <h3>Cursos en Video</h3>
                    <p>Contenido multimedia de alta calidad</p>
                </div>

                <div class="feature-item">
                    <i class="fas fa-certificate"></i>
                    <h3>Certificaciones</h3>
                    <p>Obtén certificados al completar los cursos</p>
                </div>

                <div class="feature-item">
                    <i class="fas fa-book-reader"></i>
                    <h3>Material Descargable</h3>
                    <p>Recursos y guías para tu aprendizaje</p>
                </div>

                <div class="feature-item">
                    <i class="fas fa-chart-line"></i>
                    <h3>Seguimiento de Progreso</h3>
                    <p>Monitorea tu avance en cada curso</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
