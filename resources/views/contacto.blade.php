@extends('layouts.app')

@section('title', 'Contacto')

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

    .contact-container {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 4rem;
    }

    .contact-form {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .contact-form h2 {
        margin-bottom: 1.5rem;
        color: var(--primary-color);
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

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        font-family: inherit;
        transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .submit-btn {
        background: var(--primary-color);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        width: 100%;
    }

    .submit-btn:hover {
        background: #0860b8;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .info-card {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .info-card .icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .info-card h3 {
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }

    .info-card p {
        color: var(--text-light);
        line-height: 1.6;
    }

    .info-card a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .info-card a:hover {
        text-decoration: underline;
    }

    .emergency-banner {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 3rem;
    }

    .emergency-banner h2 {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .emergency-banner p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
    }

    .emergency-banner .phone {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .map-section {
        margin-top: 4rem;
    }

    .map-container {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .map-container iframe {
        width: 100%;
        height: 450px;
        border: 0;
    }

    .social-contact {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .social-contact a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background: var(--primary-color);
        color: white;
        border-radius: 50%;
        font-size: 1.5rem;
        transition: background 0.3s;
    }

    .social-contact a:hover {
        background: #0860b8;
    }

    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .emergency-banner .phone {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <h1>Contáctanos</h1>
    <p>Estamos aquí para ayudarte</p>
</section>

<!-- Contact Container -->
<div class="contact-container">
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #c3e6cb;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #f5c6cb;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif
    <!-- Emergency Banner -->
    <div class="emergency-banner">
        <h2>¿Necesitas Ayuda Inmediata?</h2>
        <p>Si estás en crisis, llámanos ahora. Estamos disponibles 24/7</p>
        <div class="phone">
            <i class="fas fa-phone-alt"></i> 0414-4265181 (Emergencias)
        </div>
        <a href="https://wa.me/584144265181?text=Hola%20necesito%20ayuda%20urgente" class="btn btn-primary">
            <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
        </a>
    </div>

    <!-- Contact Grid -->
    <div class="contact-grid">
        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Envíanos un Mensaje</h2>
            @guest
                <div style="background: #fff3cd; color: #856404; padding: 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #ffeeba; text-align: center;">
                    <i class="fas fa-info-circle" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                    <p style="margin-bottom: 1rem;"><strong>Debes iniciar sesión para enviar un mensaje</strong></p>
                    <a href="{{ route('login') }}" class="btn btn-primary" style="display: inline-block; padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; text-decoration: none; border-radius: 5px;">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" style="display: inline-block; padding: 0.75rem 1.5rem; background: #6c757d; color: white; text-decoration: none; border-radius: 5px; margin-left: 0.5rem;">
                        <i class="fas fa-user-plus"></i> Registrarse
                    </a>
                </div>
            @else
                <p style="margin-bottom: 1.5rem; color: var(--text-light);">
                    <i class="fas fa-user"></i> Enviando como: <strong>{{ auth()->user()->name }}</strong>
                </p>
            @endguest
            <form action="{{ route('messages.store') }}" method="POST" {{ !auth()->check() ? 'style=pointer-events:none;opacity:0.5;' : '' }}>
                @csrf

                <div class="form-group">
                    <label for="phone">Teléfono (opcional)</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Ej: 0414-1234567" {{ !auth()->check() ? 'disabled' : '' }}>
                    @error('phone')
                        <span style="color: #e74c3c; font-size: 0.875rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Asunto *</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Ej: Necesito información sobre los programas" required {{ !auth()->check() ? 'disabled' : '' }}>
                    @error('subject')
                        <span style="color: #e74c3c; font-size: 0.875rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Mensaje *</label>
                    <textarea id="message" name="message" required {{ !auth()->check() ? 'disabled' : '' }}>{{ old('message') }}</textarea>
                    @error('message')
                        <span style="color: #e74c3c; font-size: 0.875rem;">{{ $message }}</span>
                    @enderror
                </div>

                @auth
                    <button type="submit" class="submit-btn">Enviar Mensaje</button>
                @endauth
            </form>
            @auth
            @endauth
        </div>

        <!-- Contact Info -->
        <div class="contact-info">
            <div class="info-card">
                <div class="icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Teléfonos</h3>
                <p><strong>Emergencias 24/7:</strong></p>
                <p><a href="tel:+584144265181">0414-4265181</a></p>
                <p><strong>Información General:</strong></p>
                <p><a href="tel:+584144008240">0414-4008240</a></p>
            </div>

            <div class="info-card">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Correos Electrónicos</h3>
                <p><a href="mailto:fundabl25@fundaciondavidbrandt.org">fundabl25@fundaciondavidbrandt.org</a></p>
                <p><a href="mailto:fundavidbrandtlasaballett@gmail.com">fundavidbrandtlasaballett@gmail.com</a></p>
            </div>

            <div class="info-card">
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Ubicación</h3>
                <p><strong>Dirección:</strong></p>
                <p>Av. Andrés Eloy Blanco, Edificio Centro Profesional Prebo, Piso 2, Of. 2-04, Urb. Prebo, Valencia, Carabobo, Zona Postal 2001 - Venezuela</p>
            </div>

            <div class="info-card">
                <div class="icon">
                    <i class="fas fa-share-alt"></i>
                </div>
                <h3>Redes Sociales</h3>
                <p>Síguenos en nuestras redes sociales:</p>
                <div class="social-contact">
                    <a href="https://www.tiktok.com/@fundavidbrandt" target="_blank" title="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://x.com/fundavidbrandt" target="_blank" title="X (Twitter)">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/fundaciondavidbrandt" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/584144008240" target="_blank" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <h2 class="section-title">Encuéntranos</h2>
        <div class="map-container">
            <iframe 
                src="https://maps.google.com/maps?q=Piso%202%20Of.%202%2C%20Centro%20Profesional%20Prebo%2C%20105%2C%2014%20Av.%20Andr%C3%A9s%20Eloy%20Blanco%2C%20Valencia%202001%2C%20Carabobo&t=m&z=15&output=embed&iwloc=near" 
                title="Ubicación Fundación David Brandt"
                loading="lazy">
            </iframe>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
