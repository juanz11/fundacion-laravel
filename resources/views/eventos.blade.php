@extends('layouts.app')

@section('title', 'Eventos')

@section('styles')
<style>
    .eventos-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
    }

    .eventos-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .eventos-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 2rem;
    }

    .evento-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 3rem;
        transition: transform 0.3s;
    }

    .evento-card:hover {
        transform: translateY(-5px);
    }

    .evento-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .evento-content {
        padding: 2rem;
    }

    .evento-fecha {
        display: inline-block;
        background: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .evento-title {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: var(--text-dark);
    }

    .evento-detalles {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .detalle-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .detalle-item i {
        color: var(--primary-color);
        font-size: 1.2rem;
    }

    .evento-descripcion {
        line-height: 1.8;
        color: var(--text-light);
        margin-bottom: 2rem;
    }

    .btn-inscribirse {
        display: inline-block;
        background: var(--primary-color);
        color: white;
        padding: 1rem 2rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: background 0.3s;
    }

    .btn-inscribirse:hover {
        background: #0860b8;
    }

    .no-eventos {
        text-align: center;
        padding: 4rem 2rem;
    }

    .no-eventos i {
        font-size: 4rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
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
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 0;
        border-radius: 15px;
        width: 90%;
        max-width: 600px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    .modal-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 15px 15px 0 0;
    }

    .modal-header h2 {
        margin: 0;
        font-size: 1.5rem;
    }

    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        line-height: 1;
    }

    .close:hover,
    .close:focus {
        opacity: 0.8;
    }

    .modal-body {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--text-dark);
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .btn-submit {
        width: 100%;
        background: var(--primary-color);
        color: white;
        padding: 1rem;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-submit:hover {
        background: #0860b8;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    @media (max-width: 768px) {
        .eventos-hero h1 {
            font-size: 2rem;
        }

        .evento-image {
            height: 250px;
        }

        .evento-title {
            font-size: 1.5rem;
        }

        .evento-detalles {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="eventos-hero">
    <h1>Nuestros Eventos</h1>
    <p>Únete a nuestras actividades y forma parte del cambio</p>
</section>

<!-- Eventos Container -->
<div class="eventos-container">
    <!-- Evento Principal: Caminata 5K -->
    <div class="evento-card">
        <img src="{{ asset('images/caminata5k-01.png') }}" alt="Caminata 5K" class="evento-image">
        <div class="evento-content">
            <span class="evento-fecha">
                <i class="fas fa-calendar-alt"></i> Domingo 30 de Noviembre, 2025
            </span>
            <h2 class="evento-title"><strong>Fundación David Brandt</strong> presenta:<br>1era Caminata Una Llamada, Una Vida 5K</h2>
            
            <div class="evento-detalles">
                <div class="detalle-item">
                    <i class="fas fa-clock"></i>
                    <span><strong>Hora:</strong> 7:00 AM</span>
                </div>
                <div class="detalle-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span><strong>Salida:</strong> Centro Profesional Prebo</span>
                </div>
                <div class="detalle-item">
                    <i class="fas fa-flag-checkered"></i>
                    <span><strong>Llegada:</strong> Cancha de la Trigaleña</span>
                </div>
                <div class="detalle-item">
                    <i class="fas fa-route"></i>
                    <span><strong>Distancia:</strong> 5 Kilómetros</span>
                </div>
            </div>

            <div class="evento-descripcion">
                <p>
                    Únete a nuestra primera caminata solidaria "Una Llamada, Una Vida 5K". 
                    Este evento tiene como objetivo crear conciencia sobre la importancia de la salud mental 
                    y recaudar fondos para nuestros programas de prevención del suicidio.
                </p>
                <p>
                    Todos los participantes recibirán una franela del evento y un kit de hidratación. 
                    ¡Ven con tu familia y amigos a ser parte de este movimiento que salva vidas!
                </p>
                <p>
                    <strong>Costo de inscripción:</strong> Bs. 10 o $3 USD
                </p>
            </div>

            <!-- Métodos de Pago -->
            <div style="margin: 2rem 0; text-align: center;">
                <h3 style="margin-bottom: 1rem; color: var(--text-dark);">Métodos de Pago Disponibles</h3>
                <img src="{{ asset('images/caminata5k-METODOSDEPAGO.png') }}" alt="Métodos de Pago" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            </div>

            <button onclick="openRegistrationModal()" class="btn-inscribirse">
                <i class="fas fa-running"></i> ¡Inscríbete Ahora!
            </button>
        </div>
    </div>

    <!-- Mensaje si no hay más eventos -->
    <div class="no-eventos">
        <i class="fas fa-calendar-check"></i>
        <h3>Próximamente más eventos</h3>
        <p>Mantente atento a nuestras redes sociales para conocer nuestros próximos eventos y actividades.</p>
    </div>
</div>

<!-- Modal de Registro -->
<div id="registrationModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closeRegistrationModal()">&times;</span>
            <h2>Registro - Caminata 5K</h2>
        </div>
        <div class="modal-body">
            <form id="registrationForm" method="POST" action="{{ route('event.register') }}">
                @csrf
                
                <div class="form-group">
                    <label for="full_name">Nombre y Apellido *</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>

                <div class="form-group">
                    <label for="id_number">Cédula *</label>
                    <input type="text" id="id_number" name="id_number" required placeholder="Ej: V-12345678">
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono *</label>
                    <input type="tel" id="phone" name="phone" required placeholder="Ej: 0414-1234567">
                </div>

                <div class="form-group">
                    <label for="social_media">Red Social (Instagram/Facebook)</label>
                    <input type="text" id="social_media" name="social_media" placeholder="@usuario">
                </div>

                <div class="form-group">
                    <label for="payment_method">Método de Pago</label>
                    <select id="payment_method" name="payment_method">
                        <option value="">Seleccione un método</option>
                        <option value="transferencia">Transferencia Bancaria</option>
                        <option value="pago_movil">Pago Móvil</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="payment_reference">Número de Referencia de Pago *</label>
                    <input type="text" id="payment_reference" name="payment_reference" required placeholder="Ingrese el número de referencia">
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-check-circle"></i> Confirmar Inscripción
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let isSubmitting = false; // Variable para controlar el envío

    function openRegistrationModal() {
        document.getElementById('registrationModal').style.display = 'block';
        isSubmitting = false; // Resetear al abrir el modal
    }

    function closeRegistrationModal() {
        document.getElementById('registrationModal').style.display = 'none';
        isSubmitting = false; // Resetear al cerrar el modal
    }

    // Cerrar modal al hacer clic fuera de él
    window.onclick = function(event) {
        const modal = document.getElementById('registrationModal');
        if (event.target == modal) {
            closeRegistrationModal();
        }
    }

    // Manejar envío del formulario
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Prevenir múltiples envíos
        if (isSubmitting) {
            console.log('Ya hay un envío en proceso...');
            return;
        }
        
        isSubmitting = true;
        const formData = new FormData(this);
        const submitBtn = this.querySelector('.btn-submit');
        
        // Capturar datos del formulario antes de enviar
        const registrationData = {
            nombre: formData.get('full_name'),
            cedula: formData.get('id_number'),
            telefono: formData.get('phone'),
            redSocial: formData.get('social_media'),
            metodoPago: formData.get('payment_method') || 'No especificado',
            referencia: formData.get('payment_reference')
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
                closeRegistrationModal();
                this.reset();
                
                // Crear mensaje de WhatsApp con toda la información del registro
                const mensaje = `Hola, acabo de completar mi inscripción para la Caminata 5K.

*Datos de mi registro:*
📝 Nombre: ${registrationData.nombre}
🆔 Cédula: ${registrationData.cedula}
📱 Teléfono: ${registrationData.telefono}
📲 Red Social: ${registrationData.redSocial}
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
                isSubmitting = false; // Permitir reintentar
            }
        })
        .catch(error => {
            console.error('Error completo:', error);
            alert('Error: ' + error.message);
            isSubmitting = false; // Permitir reintentar
        })
        .finally(() => {
            // Rehabilitar botón solo si no fue exitoso
            if (isSubmitting) {
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
                submitBtn.style.cursor = 'pointer';
                submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmar Inscripción';
            }
        });
    });
</script>
@endsection
