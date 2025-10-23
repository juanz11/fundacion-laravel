@extends('layouts.app')

@section('title', 'Donar')

@section('styles')
<style>
    .donation-hero {
        background: linear-gradient(135deg, #4B0082, #800080);
        color: white;
        padding: 6rem 2rem 4rem;
        text-align: center;
    }

    .donation-hero h1 {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        font-weight: 700;
    }

    .donation-hero p {
        font-size: 1.3rem;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .logo-container {
        text-align: center;
        margin-bottom: 2rem;
    }

    .donation-logo {
        max-width: 200px;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        transition: transform 0.3s ease;
        filter: brightness(0) invert(1);
    }

    .donation-logo:hover {
        transform: scale(1.05);
    }

    .bank-accounts-section {
        padding: 4rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .bank-accounts-section h2 {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        color: var(--text-dark);
    }

    .accounts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .account-card {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .account-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .account-type {
        font-weight: bold;
        color: #4B0082;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #4B0082;
    }

    .account-number {
        font-family: 'Courier New', monospace;
        font-size: 1.1rem;
        background: #f9f9f9;
        padding: 0.8rem;
        border-radius: 6px;
        margin: 0.5rem 0;
        word-break: break-all;
        color: #333;
    }

    .bank-name {
        font-style: italic;
        color: #666;
        font-size: 0.95rem;
        margin: 0.5rem 0;
    }

    .account-rif {
        font-weight: 600;
        color: #4B0082;
        margin-top: 1rem;
        font-size: 0.95rem;
    }

    .account-detail {
        margin: 0.8rem 0;
    }

    .account-detail-label {
        font-weight: 600;
        color: #555;
        font-size: 0.9rem;
        margin-bottom: 0.3rem;
    }

    .qr-section {
        background: #f9f9f9;
        padding: 3rem 2rem;
        text-align: center;
    }

    .qr-section h3 {
        font-size: 1.8rem;
        color: var(--text-dark);
        margin-bottom: 2rem;
    }

    .qr-code-container {
        max-width: 400px;
        margin: 0 auto;
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .qr-code-container img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .donation-actions {
        background: linear-gradient(135deg, #4B0082, #800080);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
    }

    .donation-actions h2 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    .donation-actions p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .donation-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .donation-button {
        display: inline-block;
        padding: 1rem 2.5rem;
        background-color: white;
        color: #4B0082;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        min-width: 220px;
        font-size: 1.1rem;
    }

    .donation-button:hover {
        background-color: #f0f0f0;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        color: #4B0082;
    }

    .contact-info-section {
        padding: 4rem 2rem;
        background: white;
    }

    .contact-info-section h2 {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        color: var(--text-dark);
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .contact-card {
        background: #f9f9f9;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        text-align: center;
    }

    .contact-card h3 {
        color: #4B0082;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .contact-card p {
        color: var(--text-light);
        line-height: 1.8;
        margin: 0.5rem 0;
    }

    .contact-card strong {
        color: var(--text-dark);
    }

    .social-links {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 1.5rem;
    }

    .social-link {
        color: #4B0082;
        text-decoration: none;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        background: #e0e0e0;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .social-link:hover {
        background: #d0d0d0;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .donation-hero {
            padding: 4rem 1.5rem 3rem;
        }

        .donation-hero h1 {
            font-size: 2rem;
        }

        .donation-hero p {
            font-size: 1.1rem;
        }

        .accounts-grid {
            grid-template-columns: 1fr;
        }

        .donation-buttons {
            flex-direction: column;
            align-items: center;
        }

        .donation-button {
            width: 100%;
            max-width: 300px;
        }

        .contact-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .donation-hero h1 {
            font-size: 1.5rem;
        }

        .donation-hero p {
            font-size: 1rem;
        }

        .account-card {
            padding: 1.5rem;
        }

        .account-type {
            font-size: 1.1rem;
        }

        .account-number {
            font-size: 0.95rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="donation-hero">
    <div class="logo-container">
        <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.webp?resize=768%2C768&ssl=1" 
             alt="Fundación David Brandt" 
             class="donation-logo" 
             loading="lazy">
    </div>
    <h1>¡Sé Parte del Cambio!</h1>
    <p>Tu apoyo puede marcar la diferencia en la vida de muchas personas. Únete a nuestra misión de prevención y apoyo emocional. Cada contribución, sea tiempo o recursos, nos ayuda a llegar a más personas que necesitan nuestra ayuda.</p>
</section>

<!-- Bank Accounts Section -->
<section class="bank-accounts-section">
    <h2>Datos Bancarios para Donaciones</h2>
    
    <div class="accounts-grid">
        <!-- BNC Cuenta Corriente -->
        <div class="account-card">
            <div class="account-type">Cuenta Corriente en Bs.</div>
            <div class="account-number">0191-0218-17-2100025842</div>
            <div class="bank-name">Banco Nacional de Crédito (BNC) - Torre Movistar</div>
            <div class="account-rif">RIF: J-50709884-2</div>
        </div>
        
        <!-- BNC Cuenta en Divisas -->
        <div class="account-card">
            <div class="account-type">Cuenta en Divisas</div>
            <div class="account-number">0191-0218-15-2300026260</div>
            <div class="bank-name">Banco Nacional de Crédito (BNC)</div>
            <div class="account-rif">RIF: J-50709884-2</div>
        </div>
        
        <!-- Banco Mercantil -->
        <div class="account-card">
            <div class="account-type">Banco Mercantil</div>
            <div class="bank-name">FUNDACION DAVID BRANDT LASABALLETT</div>
            <div class="account-rif">RIF: J-507098842</div>
            
            <div class="account-detail">
                <div class="account-detail-label">Cuenta Corriente Bs:</div>
                <div class="account-number">0105 0120 21 1120303036</div>
            </div>
            
            <div class="account-detail">
                <div class="account-detail-label">Cuenta USD Efectivo:</div>
                <div class="account-number">0105 0120 22 5120159486</div>
            </div>
            
            <div class="account-detail">
                <div class="account-detail-label">Cuenta EUR Efectivo:</div>
                <div class="account-number">0105 0120 23 5120159494</div>
            </div>
        </div>
    </div>
</section>

<!-- QR Code Section -->
<section class="qr-section">
    <h3>Escanea desde tu app de banco para donativo</h3>
    <div class="qr-code-container">
        <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/Captura-de-pantalla-2025-08-26-101203.webp?w=800&ssl=1" 
             alt="Código QR para pago rápido" 
             loading="lazy">
    </div>
</section>

<!-- Donation Actions Section -->
<section class="donation-actions">
    <h2>¿Necesitas más información?</h2>
    <p>¿Tienes dudas sobre cómo realizar tu donación o deseas ser voluntario?<br>Estamos aquí para ayudarte.</p>
    
    <div class="donation-buttons">
        <a href="https://wa.me/584144008240?text=Hola%20me%20gustaria%20hacer%20una%20donacion" 
           class="donation-button" 
           target="_blank" 
           rel="noopener noreferrer">
            Hacer una Donación
        </a>
        <a href="https://wa.me/584144008240?text=Hola%20me%20gustaria%20ser%20voluntario" 
           class="donation-button"
           target="_blank" 
           rel="noopener noreferrer">
            Ser Voluntario
        </a>
    </div>
</section>

<!-- Contact Information Section -->
<section class="contact-info-section">
    <h2>Información de Contacto</h2>
    <div class="contact-grid">
        <div class="contact-card">
            <h3>Dirección</h3>
            <p>Av. Andrés Eloy Blanco,<br>
            Edificio Centro Profesional Prebo,<br>
            Piso 2, Of. 2-04, Urb. Prebo,<br>
            Valencia, Carabobo<br>
            Venezuela</p>
        </div>
        
        <div class="contact-card">
            <h3>Horario de Atención</h3>
            <p><strong>Línea de ayuda:</strong><br>
            24 horas / 5 días</p>
            <p><strong>Oficina:</strong><br>
            Lunes a Viernes<br>
            8:00 AM - 5:00 PM</p>
        </div>
        
        <div class="contact-card">
            <h3>Contacto</h3>
            <p><strong>Teléfono:</strong><br>
            (+58) 0414-4008240<br>
            (+58) 0414-4265181</p>
            <p><strong>Email:</strong><br>
            Fundabl25@fundaciondavidbrandt.org<br>
            fundavidbrandtlasaballett@gmail.com</p>
            <p><strong>RIF:</strong> J-50709884-2</p>
            <div class="social-links">
                <a href="https://www.instagram.com/fundaciondavidbrandt/" 
                   class="social-link"
                   target="_blank" 
                   rel="noopener noreferrer">
                    @fundaciondavidbrandt
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
