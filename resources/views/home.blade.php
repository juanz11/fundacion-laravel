@extends('layouts.app')

@section('title', 'Inicio')

@section('styles')
<style>
    .hero-home {
        background: linear-gradient(135deg, rgba(28, 76, 150, 0.75) 0%, rgba(28, 76, 150, 0.75) 100%),
                    url('{{ asset('images/banner-hero.png') }}') center/cover;
        color: white;
        padding: 10rem 2rem;
        text-align: center;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 500px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .hero-home h1 {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        font-weight: 700;
    }

    .hero-home p {
        font-size: 1.3rem;
        margin-bottom: 2rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 768px) {
        .hero-home {
            padding: 6rem 1.5rem;
            min-height: 400px;
        }

        .hero-home h1 {
            font-size: 2rem;
        }

        .hero-home p {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 480px) {
        .hero-home {
            padding: 4rem 1rem;
            min-height: 350px;
        }

        .hero-home h1 {
            font-size: 1.5rem;
        }

        .hero-home p {
            font-size: 1rem;
        }
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
        background: #1C4C96;
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

    /* Event Section Styles */
    .event-section {
        padding: 5rem 2rem;
        background: linear-gradient(135deg, #1C4C96 0%, #2563eb 100%);
        position: relative;
        overflow: hidden;
    }

    .event-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
    }

    .event-image {
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        width: 100%;
        height: auto;
    }

    .event-content {
        color: white;
    }

    .event-content h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .event-content p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .event-btn {
        background: #FDD835;
        color: #1C4C96;
        padding: 1rem 2.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.2rem;
        display: inline-block;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(253, 216, 53, 0.4);
    }

    .event-btn:hover {
        background: #FBC02D;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(253, 216, 53, 0.6);
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7);
        overflow-y: auto;
    }

    .modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .modal-content {
        background: white;
        padding: 2.5rem;
        border-radius: 15px;
        max-width: 600px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 10px 50px rgba(0,0,0,0.3);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .modal-header h2 {
        color: #1C4C96;
        margin: 0;
        font-size: 1.8rem;
    }

    .close-modal {
        background: none;
        border: none;
        font-size: 2rem;
        cursor: pointer;
        color: #999;
        padding: 0;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.3s;
    }

    .close-modal:hover {
        color: #333;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #333;
        font-weight: 600;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.8rem;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        font-family: inherit;
        transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #1C4C96;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
    }

    .btn-submit {
        background: #1C4C96;
        color: white;
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        font-size: 1rem;
    }

    .btn-submit:hover {
        background: #0860b8;
    }

    .btn-cancel {
        background: #e0e0e0;
        color: #333;
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        font-size: 1rem;
    }

    .btn-cancel:hover {
        background: #d0d0d0;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background: #e8f5e9;
        color: #2e7d32;
        border-left: 4px solid #2e7d32;
    }

    .alert-error {
        background: #ffebee;
        color: #c62828;
        border-left: 4px solid #c62828;
    }

    @media (max-width: 968px) {
        .event-container {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .event-content h2 {
            font-size: 2rem;
        }

        .event-content p {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .event-section {
            padding: 3rem 1.5rem;
        }

        .modal-content {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-home">
    <h1>Fundación David Brandt</h1>
    <p>Brindando apoyo emocional y asistencia en crisis a quienes más lo necesitan</p>
    <a href="https://wa.me/584144008240?text=Hola%20necesito%20mas%20informacion" class="btn btn-primary">Necesito más información</a>
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

<!-- Event Section: Caminata 5K -->
<section class="event-section">
    <div class="event-container">
        <div>
            <img src="{{ asset('images/caminata5k-01.png') }}" alt="Caminata 5K - Una Llamada, Una Vida" class="event-image">
        </div>
        <div class="event-content">
            <h2>¡Únete a Nuestra Caminata 5K!</h2>
            <p><strong>1era Caminata "Una Llamada, Una Vida"</strong></p>
            <p>Tu vida importa: ¡Caminamos contigo!</p>
            <p><strong>📅 Fecha:</strong> Domingo 30/11<br>
               <strong>🕖 Hora:</strong> 7:00 AM<br>
               <strong>📍 Salida:</strong> Centro Profesional Prebo<br>
               <strong>🏁 Llegada:</strong> Cancha de la Trigaleña</p>
            <button class="event-btn" onclick="openEventModal()">
                <i class="fas fa-running"></i> ¡Inscríbete Ahora!
            </button>
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
            <p><strong>Emergencias:</strong> 0414-4265181</p>
            <p><strong>Información:</strong> 0414-4008240</p>
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

<!-- Modal de Registro para Caminata 5K -->
<div id="eventModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2><i class="fas fa-running"></i> Registro Caminata 5K</h2>
            <button class="close-modal" onclick="closeEventModal()">&times;</button>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <ul style="margin: 0.5rem 0 0 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="registrationFormHome" method="POST" action="{{ route('event.register') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="full_name">Nombre y Apellido *</label>
                <input type="text" id="full_name" name="full_name" required 
                       placeholder="Ej: Juan Pérez" value="{{ old('full_name') }}">
            </div>

            <div class="form-group">
                <label for="id_number">Cédula *</label>
                <input type="text" id="id_number" name="id_number" required 
                       placeholder="Ej: V-12345678" value="{{ old('id_number') }}">
            </div>

            <div class="form-group">
                <label for="phone">Teléfono *</label>
                <input type="tel" id="phone" name="phone" required 
                       placeholder="Ej: 0414-1234567" value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico <span style="color: #000;">(Opcional)</span></label>
                <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="social_media">Red Social (Instagram/Facebook) <span style="color: #000;">(Opcional)</span></label>
                <input type="text" id="social_media" name="social_media" 
                       placeholder="@usuario" value="{{ old('social_media') }}">
            </div>

            <div class="form-group">
                <label for="quantity">Cantidad de Inscripciones *</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="100" required>
                <small style="color: #666; font-size: 0.85rem; display: block; margin-top: 0.5rem;">
                    Precio por persona: $20 USD
                </small>
            </div>

            <div class="form-group">
                <label for="total_amount_display">Total a Pagar *</label>
                <input type="text" id="total_amount_display" value="$20.00 USD" readonly style="background-color: #f0f0f0; font-weight: bold; font-size: 1.1rem;">
                <input type="hidden" id="total_amount" name="total_amount" value="20.00">
            </div>

            <!-- Contenedor para personas adicionales -->
            <div id="additional-people-container-home"></div>

            <div class="form-group">
                <label for="payment_method">Método de Pago</label>
                <select id="payment_method" name="payment_method">
                    <option value="">Seleccione un método</option>
                    <option value="transferencia" {{ old('payment_method') == 'transferencia' ? 'selected' : '' }}>Transferencia Bancaria</option>
                    <option value="pago_movil" {{ old('payment_method') == 'pago_movil' ? 'selected' : '' }}>Pago Móvil</option>
                    <option value="efectivo" {{ old('payment_method') == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                    <option value="otro" {{ old('payment_method') == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <div class="form-group" id="reference-group">
                <label for="payment_reference" id="reference-label">Número de Referencia de Pago *</label>
                <input type="text" id="payment_reference" name="payment_reference" required 
                       placeholder="Ingrese el número de referencia" value="{{ old('payment_reference') }}">
                <small style="color: #666; font-size: 0.85rem; display: none;" id="reference-hint">No requerido para Efectivo u Otro</small>
            </div>

            <div class="form-group" id="proof-group">
                <label for="payment_proof" id="proof-label">Comprobante de Pago *</label>
                <input type="file" id="payment_proof" name="payment_proof" required accept="image/*,.pdf">
                <small style="color: #666; font-size: 0.85rem; display: block; margin-top: 0.5rem;">
                    Formatos permitidos: JPG, PNG, PDF (máx. 5MB)
                </small>
                <small style="color: #666; font-size: 0.85rem; display: none;" id="proof-hint">No requerido para Efectivo u Otro</small>
            </div>

            <div style="background: #fff3cd; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <p style="margin: 0; color: #856404; font-size: 0.9rem;">
                    <strong>Nota:</strong> Utiliza los mismos métodos de pago disponibles en la sección "Donar" de nuestra página web.
                </p>
            </div>

            <div class="form-actions">
                <button type="button" class="btn-cancel" onclick="closeEventModal()">Cancelar</button>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-check"></i> Confirmar Registro
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let isSubmittingHome = false; // Variable para controlar el envío

    function openEventModal() {
        document.getElementById('eventModal').classList.add('active');
        document.body.style.overflow = 'hidden';
        isSubmittingHome = false; // Resetear al abrir el modal
    }

    function closeEventModal() {
        document.getElementById('eventModal').classList.remove('active');
        document.body.style.overflow = 'auto';
        isSubmittingHome = false; // Resetear al cerrar el modal
    }

    // Close modal when clicking outside
    document.getElementById('eventModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEventModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeEventModal();
        }
    });

    // Calcular total automáticamente y generar campos para personas adicionales
    const PRICE_PER_PERSON = 20;
    document.getElementById('quantity').addEventListener('input', function() {
        const quantity = parseInt(this.value) || 1;
        const total = (quantity * PRICE_PER_PERSON).toFixed(2);
        document.getElementById('total_amount_display').value = '$' + total + ' USD';
        document.getElementById('total_amount').value = total;
        
        // Generar campos para personas adicionales
        const container = document.getElementById('additional-people-container-home');
        container.innerHTML = '';
        
        if (quantity > 1) {
            for (let i = 2; i <= quantity; i++) {
                const personDiv = document.createElement('div');
                personDiv.style.cssText = 'border: 2px solid #1C4C96; padding: 1.5rem; margin: 1.5rem 0; border-radius: 10px; background-color: #f0f5ff;';
                personDiv.innerHTML = `
                    <h3 style="color: #1C4C96; margin-bottom: 1rem; font-size: 1.2rem;">Persona ${i}</h3>
                    
                    <div class="form-group">
                        <label for="person_${i}_name">Nombre y Apellido *</label>
                        <input type="text" id="person_${i}_name" name="additional_people[${i-2}][name]" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="person_${i}_id">Cédula *</label>
                        <input type="text" id="person_${i}_id" name="additional_people[${i-2}][id_number]" required placeholder="Ej: V-12345678">
                    </div>
                    
                    <div class="form-group">
                        <label for="person_${i}_phone">Teléfono *</label>
                        <input type="tel" id="person_${i}_phone" name="additional_people[${i-2}][phone]" required placeholder="Ej: 0414-1234567">
                    </div>
                `;
                container.appendChild(personDiv);
            }
        }
    });

    // Manejar cambio en método de pago
    document.getElementById('payment_method').addEventListener('change', function() {
        const paymentMethod = this.value;
        const referenceInput = document.getElementById('payment_reference');
        const referenceLabel = document.getElementById('reference-label');
        const referenceHint = document.getElementById('reference-hint');
        const proofInput = document.getElementById('payment_proof');
        const proofLabel = document.getElementById('proof-label');
        const proofHint = document.getElementById('proof-hint');
        
        // Si es efectivo u otro, hacer los campos opcionales
        if (paymentMethod === 'efectivo' || paymentMethod === 'otro') {
            // Referencia opcional
            referenceInput.removeAttribute('required');
            referenceLabel.textContent = 'Número de Referencia de Pago';
            referenceHint.style.display = 'block';
            referenceInput.placeholder = 'Opcional';
            
            // Comprobante opcional
            proofInput.removeAttribute('required');
            proofLabel.textContent = 'Comprobante de Pago';
            proofHint.style.display = 'block';
        } else {
            // Referencia obligatoria
            referenceInput.setAttribute('required', 'required');
            referenceLabel.textContent = 'Número de Referencia de Pago *';
            referenceHint.style.display = 'none';
            referenceInput.placeholder = 'Ingrese el número de referencia';
            
            // Comprobante obligatorio
            proofInput.setAttribute('required', 'required');
            proofLabel.textContent = 'Comprobante de Pago *';
            proofHint.style.display = 'none';
        }
    });

    // Manejar envío del formulario
    document.getElementById('registrationFormHome').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Prevenir múltiples envíos
        if (isSubmittingHome) {
            console.log('Ya hay un envío en proceso...');
            return;
        }
        
        isSubmittingHome = true;
        const formData = new FormData(this);
        const submitBtn = this.querySelector('.btn-submit');
        
        // Capturar datos del formulario antes de enviar
        const registrationData = {
            nombre: formData.get('full_name'),
            cedula: formData.get('id_number'),
            telefono: formData.get('phone'),
            email: formData.get('email') || 'No especificado',
            redSocial: formData.get('social_media') || 'No especificado',
            cantidad: formData.get('quantity'),
            total: formData.get('total_amount'),
            metodoPago: formData.get('payment_method') || 'No especificado',
            referencia: formData.get('payment_reference') || 'No especificado'
        };
        
        // Deshabilitar botón mientras se procesa
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.6';
        submitBtn.style.cursor = 'not-allowed';
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';
        
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            // Verificar si la respuesta es exitosa
            if (!response.ok) {
                return response.json().then(err => {
                    throw new Error(err.message || 'Error en el servidor');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('¡Registro exitoso! Tu inscripción está pendiente de aprobación. Te redirigiremos a WhatsApp para confirmar tu registro.');
                closeEventModal();
                this.reset();
                
                // Crear mensaje de WhatsApp con toda la información del registro
                const mensaje = `Hola, acabo de completar mi inscripción para la Caminata 5K.

*Datos de mi registro:*
📝 Nombre: ${registrationData.nombre}
🆔 Cédula: ${registrationData.cedula}
📱 Teléfono: ${registrationData.telefono}
📧 Email: ${registrationData.email}
📲 Red Social: ${registrationData.redSocial}
👥 Cantidad de Inscripciones: ${registrationData.cantidad}
💵 Total Pagado: $${registrationData.total} USD
💳 Método de Pago: ${registrationData.metodoPago}
🔢 Referencia: ${registrationData.referencia}

Necesito confirmar mi registro. ¡Gracias!`;
                
                // Abrir WhatsApp automáticamente después del registro exitoso
                setTimeout(() => {
                    const whatsappURL = `https://api.whatsapp.com/send/?phone=584144008240&text=${encodeURIComponent(mensaje)}&type=phone_number&app_absent=0`;
                    window.open(whatsappURL, '_blank');
                }, 1000);
            } else {
                alert('Error: ' + (data.message || 'No se pudo completar el registro'));
                isSubmittingHome = false; // Permitir reintentar
            }
        })
        .catch(error => {
            console.error('Error completo:', error);
            alert('Error: ' + error.message);
            isSubmittingHome = false; // Permitir reintentar
        })
        .finally(() => {
            // Rehabilitar botón solo si no fue exitoso
            if (isSubmittingHome) {
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
                submitBtn.style.cursor = 'pointer';
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Confirmar Registro';
            }
        });
    });

    // Auto-open modal if there are errors
    @if($errors->any())
        openEventModal();
    @endif

    // Auto-open modal if there's a success message
    @if(session('success'))
        openEventModal();
    @endif
</script>
@endsection
