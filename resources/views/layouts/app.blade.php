<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <title>@yield('title', 'Inicio') - Fundación David Brandt</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Styles -->
    <style>
        :root {
            --primary-color: #0a74da;
            --secondary-color: #25d366;
            --text-dark: #333;
            --text-light: #666;
            --bg-light: #f9f9f9;
            --bg-gray: #e0e0e0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Header Styles */
        .header {
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 80px;
            width: auto;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0;
            align-items: center;
            margin: 0;
        }

        .nav-menu > li {
            position: relative;
        }

        .nav-menu > li > a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 0.95rem;
            padding: 1.5rem 1.2rem;
            display: block;
            transition: color 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-menu > li > a:hover {
            color: var(--primary-color);
        }

        /* Submenu */
        .nav-menu .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 280px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            list-style: none;
            padding: 0;
            margin: 0;
            z-index: 1000;
        }

        .nav-menu li:hover .submenu {
            display: block;
        }

        .nav-menu .submenu li {
            border-bottom: 1px solid #f0f0f0;
        }

        .nav-menu .submenu li:last-child {
            border-bottom: none;
        }

        .nav-menu .submenu a {
            padding: 0.8rem 1.2rem;
            display: block;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.3s, color 0.3s;
        }

        .nav-menu .submenu a:hover {
            background: #f9f9f9;
            color: var(--primary-color);
        }

        .btn-contact {
            background: var(--primary-color);
            color: white !important;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
            margin-left: 1rem;
            font-size: 0.85rem;
        }

        .btn-contact:hover {
            background: #0860b8;
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-dark);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Services Section */
        .services {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-card .icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .service-card h3 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 3rem 2rem;
            margin-top: 4rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer h3 {
            margin-bottom: 1rem;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            color: var(--primary-color);
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            transition: background 0.3s;
        }

        .social-icons a:hover {
            background: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Utility Classes */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .text-center {
            text-align: center;
        }

        .mt-4 {
            margin-top: 2rem;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }
    </style>

    @yield('styles')
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.png?fit=2560%2C2560&ssl=1" alt="Fundación David Brandt">
                </a>
            </div>
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/quienes-somos') }}">Quiénes Somos</a></li>
                    <li>
                        <a href="{{ url('/programas') }}">Programas</a>
                        <ul class="submenu">
                            <li><a href="{{ url('/programas#prevencion') }}">Programas y Planes de Prevención</a></li>
                            <li><a href="{{ url('/programas#intervencion') }}">Programas y Planes de Intervención Inmediata</a></li>
                            <li><a href="{{ url('/programas#postvencion') }}">Programas y Planes de Postvención</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/contacto') }}">Contacto</a></li>
                    <li><a href="{{ url('/donar') }}">Donar</a></li>
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li><a href="{{ route('admin.dashboard') }}">Panel Admin</a></li>
                        @else
                            <li><a href="{{ route('user.dashboard') }}">Mi Panel</a></li>
                        @endif
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: var(--text-dark); font-weight: 500; font-size: 0.95rem; padding: 1.5rem 1.2rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    @endauth
                    <li><a href="https://wa.me/584144008240?text=Hola%20necesito%20mas%20informacion" class="btn-contact">Contáctanos</a></li>
                </ul>
                <button class="mobile-menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div>
                <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/07/ISOTIPO-scaled.png?fit=2560%2C2560&ssl=1" alt="Logo" style="width: 100px; margin-bottom: 1rem;">
                <p>Fundación David Brandt - Brindando apoyo emocional a quienes lo necesitan.</p>
            </div>
            
            <div>
                <h3>Contacto</h3>
                <p><i class="fas fa-envelope"></i> fundabl25@fundaciondavidbrandt.org</p>
                <p><i class="fas fa-phone"></i> 0414-4008240</p>
                <p><i class="fas fa-phone"></i> 0414-4265181</p>
            </div>
            
            <div>
                <h3>Ubicación</h3>
                <p><i class="fas fa-map-marker-alt"></i> Av. Andrés Eloy Blanco, Edificio Centro Profesional Prebo, Piso 2, Of. 2-04, Valencia, Carabobo, Venezuela</p>
            </div>
            
            <div>
                <h3>Síguenos</h3>
                <div class="social-icons">
                    <a href="https://www.tiktok.com/@fundavidbrandt" target="_blank"><i class="fab fa-tiktok"></i></a>
                    <a href="https://x.com/fundavidbrandt" target="_blank"><i class="fab fa-x-twitter"></i></a>
                    <a href="https://www.instagram.com/fundaciondavidbrandt" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
