@extends('layouts.app')

@section('title', 'Inicio')

@section('styles')
<style>
    .hero-home {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%),
                    url('https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=1200') center/cover;
        color: white;
        padding: 6rem 2rem;
        text-align: center;
    }

    .hero-home h1 {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        font-weight: 700;
    }

    .hero-home p {
        font-size: 1.3rem;
        max-width: 800px;
        margin: 0 auto 2rem;
    }

    .services-section {
        padding: 5rem 2rem;
        background: #f9f9f9;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        color: var(--text-dark);
    }

    .video-section {
        padding: 4rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .video-container video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .testimonials {
        padding: 5rem 2rem;
        background: white;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .testimonial-card {
        background: #f9f9f9;
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
    }

    .testimonial-card img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 1rem;
    }

    .testimonial-card p {
        font-style: italic;
        color: var(--text-light);
        margin-bottom: 1rem;
    }

    .commitment-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 5rem 2rem;
        text-align: center;
    }

    .commitment-section h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .commitment-section p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto 2rem;
    }

    .btn-group {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 1rem 2rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
    }

    .btn-primary {
        background: white;
        color: var(--primary-color);
    }

    .btn-primary:hover {
        background: #f0f0f0;
    }

    .btn-secondary {
        background: var(--secondary-color);
        color: white;
    }

    .btn-secondary:hover {
        background: #1fb855;
    }

    .phone-section {
        padding: 4rem 2rem;
        max-width: 800px;
        margin: 0 auto;
    }

    .phone-container {
        display: flex;
        border-radius: 40px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    .phone-screen {
        flex: 1;
        background: #f9f9f9;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .phone-screen img {
        max-width: 100%;
        border-radius: 15px;
    }

    .phone-text {
        flex: 1;
        padding: 2rem;
        background: #e0e0e0;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .phone-text h3 {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-size: 1.8rem;
    }

    .contact-section {
        padding: 5rem 2rem;
        background: #f9f9f9;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 2rem auto 0;
    }

    .contact-card {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .contact-card .icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .contact-card h3 {
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }

    .map-section {
        padding: 4rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .map-container {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .map-container iframe {
        width: 100%;
        height: 450px;
        border: 0;
    }

    @media (max-width: 768px) {
        .hero-home h1 {
            font-size: 2rem;
        }

        .phone-container {
            flex-direction: column;
        }

        .btn-group {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-home">
    <h1>Fundación David Brandt</h1>
    <p>Brindando apoyo emocional y asistencia en crisis a quienes más lo necesitan</p>
    <a href="https://wa.me/584144008240?text=Hola%20necesito%20mas%20informacion" class="btn btn-primary">Necesito Ayuda</a>
</section>

<!-- Services Section -->
<section class="services-section">
    <h2 class="section-title">Nuestros Servicios</h2>
    <div class="services-grid">
        <div class="service-card">
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h3>Soporte Emocional</h3>
            <p>Te ofrecemos un espacio seguro donde puedes compartir tus sentimientos sin juicios y recibir el apoyo que necesitas. Nuestro objetivo es acompañarte en cada paso de tu camino hacia el bienestar emocional.</p>
        </div>

        <div class="service-card">
            <div class="icon">
                <i class="fas fa-street-view"></i>
            </div>
            <h3>Asistencia en Crisis</h3>
            <p>Nuestro equipo está listo para ayudarte a navegar a través de momentos de crisis, ofreciendo asistencia inmediata y orientación. No tienes que enfrentar esto solo; estamos aquí para apoyarte.</p>
        </div>

        <div class="service-card">
            <div class="icon">
                <i class="fas fa-heart"></i>
            </div>
            <h3>Compromiso Comunitario</h3>
            <p>Conectamos a las personas con recursos y redes de apoyo, fomentando una comunidad más fuerte orientada hacia la sanación. Juntos, podemos crear un entorno de apoyo y comprensión.</p>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ url('/programas') }}" class="btn btn-primary">Leer más</a>
    </div>
</section>

<!-- Video Section -->
<section class="video-section">
    <div class="video-container">
        <video controls preload="metadata">
            <source src="https://fundaciondavidbrandt.org/wp-content/uploads/2025/07/Video-Fundaciomn-horizontal.mp4" type="video/mp4">
            Tu navegador no soporta el elemento de video.
        </video>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials">
    <h2 class="section-title">Conectando con las personas</h2>
    <div class="testimonials-grid">
        <div class="testimonial-card">
            <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.webp?fit=2560%2C2560&ssl=1" alt="Testimonio">
            <p>"El apoyo que recibí aquí fue fundamental para superar mis crisis. Me sentí acompañado y comprendido en todo momento."</p>
        </div>

        <div class="testimonial-card">
            <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.webp?fit=2560%2C2560&ssl=1" alt="Testimonio">
            <p>"La fundación me brindó el apoyo que necesitaba en un momento muy oscuro de mi vida. Su escucha compasiva y comprensión me ayudaron a encontrar la luz nuevamente."</p>
        </div>

        <div class="testimonial-card">
            <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.webp?fit=2560%2C2560&ssl=1" alt="Testimonio">
            <p>"La ayuda que encontré en esta fundación fue un verdadero cambio de vida. Me enseñaron a ver las cosas desde otra perspectiva y a seguir adelante."</p>
        </div>
    </div>
</section>

<!-- Commitment Section -->
<section class="commitment-section">
    <h2>Compromiso Comunitario</h2>
    <p>Conectamos a las personas con recursos y redes de apoyo, fomentando una comunidad más fuerte orientada hacia la sanación. Juntos, podemos crear un entorno de apoyo y comprensión.</p>
    <div class="btn-group">
        <a href="https://wa.me/584144008240?text=Hola%20necesito%20mas%20informacion" class="btn btn-primary">Contáctanos</a>
        <a href="https://wa.me/584144008240?text=Hola%20necesito%20mas%20informacion" class="btn btn-secondary">¡Haz tu donación hoy!</a>
    </div>
</section>

<!-- Phone Section -->
<section class="phone-section">
    <div class="phone-container">
        <div class="phone-screen">
            <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/db252b5c-6c2f-48cf-9dfd-e95f6ea498b9.webp?w=800&ssl=1" alt="Una Llamada, Una Vida">
        </div>
        <div class="phone-text">
            <h3>Una Llamada, Una Vida</h3>
            <p>¡Una llamada puede hacer la diferencia!</p>
            <p>Nuestro programa «Una Llamada, Una Vida» ofrece primeros auxilios psicológicos, una herramienta fundamental para brindar apoyo emocional inmediato a quienes lo necesitan.</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <h2 class="section-title">Tu espacio de seguridad</h2>
    <h3 class="text-center mb-4">Contáctanos</h3>
    <p class="text-center mb-4">Estas son las diferentes plataformas de contacto para obtener más información:</p>
    
    <div class="contact-grid">
        <div class="contact-card">
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h3>Correos</h3>
            <p>fundabl25@fundaciondavidbrandt.org</p>
            <p>fundavidbrandtlasaballett@gmail.com</p>
        </div>

        <div class="contact-card">
            <div class="icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3>Visítanos</h3>
            <p><strong>Dirección:</strong> Av. Andrés Eloy Blanco, Edificio Centro Profesional Prebo, Piso 2, Of. 2-04, Urb. Prebo, Valencia, Carabobo Zona Postal 2001 - Venezuela</p>
        </div>

        <div class="contact-card">
            <div class="icon">
                <i class="fas fa-phone-alt"></i>
            </div>
            <h3>Llámanos</h3>
            <p><strong>0414-4008240</strong></p>
            <p><strong>0414-4265181</strong></p>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="map-container">
        <iframe 
            src="https://maps.google.com/maps?q=Piso%202%20Of.%202%2C%20Centro%20Profesional%20Prebo%2C%20105%2C%2014%20Av.%20Andr%C3%A9s%20Eloy%20Blanco%2C%20Valencia%202001%2C%20Carabobo&t=m&z=11&output=embed&iwloc=near" 
            title="Ubicación Fundación David Brandt"
            loading="lazy">
        </iframe>
    </div>
</section>
@endsection
