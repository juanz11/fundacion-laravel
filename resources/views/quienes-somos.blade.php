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

    .content-wrapper {
        position: relative;
        width: 100%;
        padding: 40px 20px;
        background-color: white;
        max-width: 1400px;
        margin: 0 auto;
    }

    .content-wrapper img.banner-image {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .content-wrapper h2 {
        font-family: Arial, sans-serif;
        color: #4B0082;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .content-wrapper h3 {
        font-family: Arial, sans-serif;
        color: #4B0082;
        margin-top: 25px;
        margin-bottom: 10px;
    }

    .content-wrapper p, .content-wrapper ul {
        font-family: Arial, sans-serif;
        line-height: 1.8;
        color: #333;
        margin-bottom: 15px;
    }

    .content-wrapper ul {
        padding-left: 25px;
    }

    .content-wrapper ul li {
        margin-bottom: 10px;
    }

    /* Carrusel de Directores */
    .directores-carousel {
        width: 100%;
        margin: 60px 0;
        padding: 40px 0;
        background: #f9f9f9;
    }

    .carousel-container {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding: 0 20px;
    }

    .carousel-slide {
        display: flex;
        transition: transform 0.5s ease-in-out;
        gap: 30px;
        padding: 20px 0;
    }

    .director-card {
        min-width: 280px;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .director-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .director-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .director-card h3 {
        margin: 15px 10px 5px;
        color: #4B0082;
        font-size: 1.2em;
        font-weight: 600;
    }

    .director-card p {
        margin: 0 15px 15px;
        color: #666;
        font-size: 0.95em;
    }

    .carousel-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(75, 0, 130, 0.8);
        color: white;
        border: none;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        font-size: 20px;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
    }

    .carousel-button:hover {
        background: rgba(75, 0, 130, 1);
        transform: translateY(-50%) scale(1.1);
    }

    .carousel-button.prev {
        left: 25px;
    }

    .carousel-button.next {
        right: 25px;
    }

    /* Organigrama */
    .organigrama {
        width: 100%;
        max-width: 1200px;
        margin: 60px auto;
        padding: 20px;
    }

    .organigrama h2 {
        text-align: center;
        margin-bottom: 40px;
        color: #4B0082;
    }

    .nivel {
        display: flex;
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
        margin: 20px 0;
        position: relative;
    }

    .nivel::before {
        content: '';
        position: absolute;
        top: -20px;
        left: 50%;
        height: 20px;
        border-left: 4px solid #4B0082;
        transform: translateX(-50%);
    }

    .nivel:first-child::before {
        display: none;
    }

    .caja {
        background: linear-gradient(145deg, #4B0082, #6B238E);
        color: white;
        padding: 12px;
        border-radius: 12px;
        margin: 8px;
        text-align: center;
        font-size: 13px;
        flex: 1;
        min-width: 180px;
        max-width: 250px;
        box-shadow: 0 4px 15px rgba(75, 0, 130, 0.2);
        transition: all 0.3s ease;
    }

    .caja:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(75, 0, 130, 0.3);
    }

    .btn-contact-section {
        text-align: center;
        margin: 30px 0;
    }

    .btn-contact-section a {
        display: inline-block;
        padding: 12px 30px;
        background-color: #4B0082;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-family: Arial, sans-serif;
        transition: background 0.3s;
    }

    .btn-contact-section a:hover {
        background-color: #6B238E;
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 4rem 1.5rem;
            min-height: 300px;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .director-card {
            min-width: 220px;
        }

        .carousel-button {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .caja {
            min-width: 140px;
            font-size: 11px;
            padding: 8px;
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

        .director-card {
            min-width: 200px;
        }

        .caja {
            min-width: 100%;
            margin: 5px 10px;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <h1>Quiénes Somos</h1>
    <p>Fundación David Brandt Lasaballett</p>
</section>

<!-- Main Content -->
<div class="content-wrapper">
    <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/bannereditand.webp?w=800&ssl=1" alt="FUNDACIÓN DAVID BRANDT LASABALLETT" class="banner-image">
    
    <h2>FUNDACIÓN DAVID BRANDT LASABALLETT</h2>
    
    <h3>Semillas de esperanza: una Gala por el futuro de Venezuela</h3>
    
    <p>
        Una llamada una vida: La Fundación David Brandt Lasaballett Lidera la Prevención, Atención y Postvención del suicidio en Venezuela.
    </p>

    <p>
        En un país donde la salud mental enfrenta desafíos sin precedentes, la FUNDACION DAVID BRANDT LASABALLETT emerge como una organización pionera, dedicada a salvar vidas y ofrecer esperanza a miles de venezolanos desde la niñez hasta la adultez mayor. 
        Lamentablemente, el suicidio se ha convertido en una silenciosa emergencia de salud pública, por lo que la fundación emerge como un faro de luz, de acción y acompañamiento. Esta fundación tiene varios objetivos claros: La prevención, que se traduce en salvar vidas a través de diferentes medios y programas, a contener este fenómeno y finalmente a acompañar a quienes atraviesan el duelo.
    </p>
    
    <h3>¿Por qué es urgente nuestra causa?</h3>
    <p>
        Según el Observatorio Venezolano de violencia, durante el año 2024, dentro del país acontecieron unas 1962 muertes por suicidio, lo que arroja una tasa de 6,9 decesos por cada 100 mil habitantes. En promedio, estados como Mérida, Táchira, Distrito Capital, Trujillo y Lara lideran estas cifras, mientras la depresión figura como la causa principal en el 86,1% de los casos. Detrás de cada número hay historias, familias y comunidades marcadas por el dolor y la urgencia de actuar.
    </p>

    <p>
        Contamos con un equipo multidisciplinario (psicólogos, psiquiatras, médicos, abogados, comunicadores y voluntarios) que trabajamos dirigidos a la realización de charlas, talleres, conferencias y campañas en diferentes áreas de la salud mental y de la gestión emocional, así como las dirigidas a sensibilización a la población en general sobre el suicidio, desmitificando las creencias y los tabúes que lo acompañan.
    </p>

    <p>
        Desarrollarán en las escuelas, liceos, universidades, comunidades, y también a través de medios de comunicación y redes sociales las labores tendientes a la contención del suicidio, a través de la línea telefónica de atención inmediata las llamadas que realizan las personas que necesiten ayuda, atendidas por profesionales de la salud mental, altamente capacitados y sensibilizados en el tema, con la finalidad de contener cualquier situación.
    </p>

    <h3>Planes y Programas de Postvención</h3>
    <p>
        Referido al acompañamiento especializado a sobrevivientes (familias y allegados), ofreciendo espacios de escucha, grupos de apoyo y recursos para afrontar el duelo, dirigidos por profesionales.
    </p>

    <h3>Planes de Formación</h3>
    <p>
        Dirigidos a crear espacios de capacitación de profesionales de la salud, educación, voluntarios y líderes comunitarios, con la finalidad de detectar señales de alerta y actuar oportunamente ante cualquier señal de alerta.
    </p>

    <h3>Conectando con la esperanza</h3>
    <p>
        En un entorno saturado de información, contaremos historias reales de superación, visibilizaremos testimonios de quienes han encontrado apoyo y esperanza, para de esta manera, generar solidaridad y redes de apoyo, que tanta falta hacen en la humanidad. 
        Cada vida salvada es una victoria sobre el silencio; hablar es prevenir; acompañar a sanar.
    </p>

    <p>
        La fundación David Brandt basa sus principios sobre la alquimia y la resiliencia, que no son más que preceptos que eluden la transformación emocional y mental de las situaciones dolorosas a circunstancias favorecedoras, de crecimiento y superación emocional, mediante el establecimiento de una nueva y liberadora percepción, que nos ofrecen una nueva oportunidad de cambiar y de vivir, que es lo que realmente nos importa.
    </p>

    <p>
        La fundación abre sus puertas a todos los ciudadanos, tanto de Venezuela como del mundo, a sus nuevos miembros, a los voluntarios, colaboradores, sponsors y donantes, que deseen ser parte activa de este único y novedoso movimiento transformador, que defiende el valor de simplemente vivir. En este sentido, su apoyo es vital para expandir nuestras acciones, para llegar a más comunidades y sostener programas de prevención, atención y postvención en todo el país.
    </p>

    <h3>Nuestra Misión</h3>
    <ul>
        <li>Salvar vidas y ofrecer esperanza a través de la prevención integral del suicidio y el apoyo compasivo a personas afectadas en Venezuela, mediante programas educativos, asistencia especializada y la promoción de un entorno social sensible y solidario.</li>
    </ul>

    <h3>Nuestra Visión</h3>
    <p>
        Ser la organización líder y referente nacional e internacional en la reducción significativa de la conducta suicida, reconocida por el impacto positivo de sus proyectos y programas, la excelencia profesional y la construcción de una sociedad informada, resiliente y protectora de la salud mental.
    </p>

    <h3>Nuestros Valores</h3>
    <ul>
        <li><strong>Derechos Humanos:</strong> Respeto absoluto por la dignidad y los derechos de todas las personas.</li>
        <li><strong>Solidaridad:</strong> Compromiso activo con quienes sufren y sus familias.</li>
        <li><strong>Transparencia:</strong> Rendición de cuentas clara y abierta.</li>
        <li><strong>Empatía:</strong> Comprensión profunda y respuesta sensible.</li>
        <li><strong>Profesionalismo:</strong> Competencia y ética en cada intervención.</li>
        <li><strong>Colaboración:</strong> Alianzas estratégicas para maximizar el impacto.</li>
        <li><strong>Innovación:</strong> Búsqueda constante de nuevas soluciones.</li>
    </ul>

    <h3>¿Qué nos diferencia?</h3>
    <p>
        Tenemos un enfoque Integral: Ya que abordamos la conducta suicida desde la prevención primaria hasta la postvención especializada, cubriendo todas las etapas de este fenómeno.
    </p>

    <ul>
        <li>Contamos con alianzas multidisciplinarias: Colaboramos con profesionales de la salud, educadores, líderes comunitarios y sectores clave.</li>
        <li>Atención centrada en la persona y la familia: Apoyo individualizado y sensible a cada situación.</li>
        <li>Uso estratégico de la tecnología: Contamos con plataformas digitales y líneas de ayuda accesibles y confidenciales.</li>
        <li>Investigación y formación: Promovemos estudios sobre suicidio y capacitamos a profesionales y comunidades.</li>
    </ul>

    <h3>¿Cómo puedes ayudar?</h3>
    <ul>
        <li>Únete como miembro voluntario o profesional, aquí tienes un espacio.</li>
        <li>Conviértete en sponsor y asocia tu marca a una causa de alto impacto social.</li>
        <li>Dona y permite que más personas reciban ayuda gratuita y oportuna.</li>
    </ul>

    <div class="btn-contact-section">
        <a href="https://wa.me/584144008240?text=Hola%20necesito%20mas%20informacion">Ver Más</a>
    </div>
</div>

<!-- Carrusel de Directores -->
<div class="directores-carousel">
    <h2 style="text-align: center; margin-bottom: 30px; color: #4B0082;">Directorio - Fundación David Brandt</h2>
    <div class="carousel-container">
        <div class="carousel-slide" id="carouselSlide">
            <div class="director-card">
                <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-22-at-6.31.23-PM-8.webp?w=800&ssl=1" alt="Presidenta">
                <h3>Masiel Lasaballlet</h3>
                <p>Presidenta de la Fundación David Brandt</p>
            </div>
            <div class="director-card">
                <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-22-at-6.31.23-PM-9.jpeg?w=800&ssl=1" alt="Vicepresidente">
                <h3>Julio César Brandt Lasaballlet</h3>
                <p>Vicepresidente de la Fundación David Brandt</p>
            </div>
            <div class="director-card">
                <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-22-at-6.31.23-PM-5.webp?w=800&ssl=1" alt="Directora Legal">
                <h3>Yaneth Di Gregorio</h3>
                <p>Directora del Departamento Legal</p>
            </div>
            <div class="director-card">
                <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-22-at-6.31.23-PM-6.webp?w=800&ssl=1" alt="Directora de Administración">
                <h3>Bella Silva</h3>
                <p>Directora de Administración</p>
            </div>
            <div class="director-card">
                <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-22-at-6.31.23-PM-7.webp?w=800&ssl=1" alt="Secretaria">
                <h3>María Consuelo De Bianchi</h3>
                <p>Secretaria</p>
            </div>
            <div class="director-card">
                <img src="https://i0.wp.com/fundaciondavidbrandt.org/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-22-at-6.31.23-PM-1.webp?w=800&ssl=1" alt="Director de Tesorería">
                <h3>Miguel Alejandro Ramírez</h3>
                <p>Director de Tesorería</p>
            </div>
        </div>
        <button class="carousel-button prev" onclick="prevSlide()">❮</button>
        <button class="carousel-button next" onclick="nextSlide()">❯</button>
    </div>
</div>

<!-- Organigrama -->
<div class="organigrama">
    <h2>Organigrama de la Fundación David Brandt</h2>
    
    <div class="nivel">
        <div class="caja">PRESIDENTE</div>
    </div>
    
    <div class="nivel">
        <div class="caja">DPTO. DE DESARROLLO DE PROYECTOS</div>
        <div class="caja">DPTO. DE TALENTO HUMANO</div>
        <div class="caja">DPTO. DE GESTIÓN MÉDICO ASISTENCIAL</div>
        <div class="caja">DPTO. DE PRENSA Y MARKETING</div>
    </div>
    
    <div class="nivel">
        <div class="caja">DPTO. ADMINISTRACIÓN Y TESORERÍA</div>
        <div class="caja">DPTO. LEGAL</div>
        <div class="caja">PROGRAMADA UNA VIDA</div>
        <div class="caja">DPTO. DE INVESTIGACIÓN CIENTÍFICA Y MÉTRICAS</div>
        <div class="caja">DPTO. DE RELACIONES INSTITUCIONALES Y ORGANIZACIÓN DE EVENTOS</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Carrusel de directores
    let currentIndex = 0;
    const carouselSlide = document.getElementById('carouselSlide');
    const cards = document.querySelectorAll('.director-card');
    const cardWidth = 310; // 280px + 30px gap

    function nextSlide() {
        if (currentIndex < cards.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    }

    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    }

    function updateCarousel() {
        const offset = -currentIndex * cardWidth;
        carouselSlide.style.transform = `translateX(${offset}px)`;
    }

    // Auto-advance carousel
    setInterval(nextSlide, 5000);

    // Touch support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    carouselSlide.addEventListener('touchstart', e => {
        touchStartX = e.touches[0].clientX;
    });

    carouselSlide.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].clientX;
        if (touchStartX - touchEndX > 50) {
            nextSlide();
        } else if (touchEndX - touchStartX > 50) {
            prevSlide();
        }
    });
</script>
@endsection
