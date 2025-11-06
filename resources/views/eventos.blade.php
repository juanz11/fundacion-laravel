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
        <img src="{{ asset('images/unnamed.png') }}" alt="Caminata 5K" class="evento-image">
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
                <p style="font-size: 1.5rem; color: #000; font-weight: bold; margin-top: 1.5rem;">
                    Costo de inscripción: $20 USD
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
            <form id="registrationForm" method="POST" action="{{ route('event.register') }}" enctype="multipart/form-data">
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
                    <label for="shirt_size">Talla de Camisa *</label>
                    <select id="shirt_size" name="shirt_size" required>
                        <option value="">Seleccione una talla</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XXL">XXL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico <span style="color: #000;">(Opcional)</span></label>
                    <input type="email" id="email" name="email" placeholder="ejemplo@correo.com">
                </div>

                <div class="form-group">
                    <label for="social_media">Red Social (Instagram/Facebook) <span style="color: #000;">(Opcional)</span></label>
                    <input type="text" id="social_media" name="social_media" placeholder="@usuario">
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
                <div id="additional-people-container"></div>

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

                <div class="form-group" id="reference-group">
                    <label for="payment_reference" id="reference-label">Número de Referencia de Pago *</label>
                    <input type="text" id="payment_reference" name="payment_reference" required placeholder="Ingrese el número de referencia">
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

    // Calcular total automáticamente y generar campos para personas adicionales
    const PRICE_PER_PERSON = 20;
    document.getElementById('quantity').addEventListener('input', function() {
        const quantity = parseInt(this.value) || 1;
        const total = (quantity * PRICE_PER_PERSON).toFixed(2);
        document.getElementById('total_amount_display').value = '$' + total + ' USD';
        document.getElementById('total_amount').value = total;
        
        // Generar campos para personas adicionales
        const container = document.getElementById('additional-people-container');
        container.innerHTML = '';
        
        if (quantity > 1) {
            for (let i = 2; i <= quantity; i++) {
                const personDiv = document.createElement('div');
                personDiv.style.cssText = 'border: 2px solid #667eea; padding: 1.5rem; margin: 1.5rem 0; border-radius: 10px; background-color: #f9f9ff;';
                personDiv.innerHTML = `
                    <h3 style="color: #667eea; margin-bottom: 1rem; font-size: 1.2rem;">Persona ${i}</h3>
                    
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
                    
                    <div class="form-group">
                        <label for="person_${i}_shirt_size">Talla de Camisa *</label>
                        <select id="person_${i}_shirt_size" name="additional_people[${i-2}][shirt_size]" required>
                            <option value="">Seleccione una talla</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XXL">XXL</option>
                        </select>
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
            tallaCamisa: formData.get('shirt_size'),
            email: formData.get('email'),
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
                // Crear mensaje de WhatsApp con toda la información del registro
                const mensaje = `Hola, acabo de completar mi inscripción para la Caminata 5K.

*Datos de mi registro:*
📝 Nombre: ${registrationData.nombre}
🆔 Cédula: ${registrationData.cedula}
📱 Teléfono: ${registrationData.telefono}
👕 Talla de Camisa: ${registrationData.tallaCamisa}
📧 Email: ${registrationData.email}
📲 Red Social: ${registrationData.redSocial}
👥 Cantidad de Inscripciones: ${registrationData.cantidad}
💵 Total Pagado: $${registrationData.total} USD
💳 Método de Pago: ${registrationData.metodoPago}
🔢 Referencia: ${registrationData.referencia}

Necesito confirmar mi registro. ¡Gracias!`;
                
                const whatsappURL = `https://api.whatsapp.com/send/?phone=584144008240&text=${encodeURIComponent(mensaje)}&type=phone_number&app_absent=0`;
                
                // Cerrar modal y resetear formulario
                closeRegistrationModal();
                this.reset();
                
                // Mostrar mensaje de éxito
                alert('¡Registro exitoso! Te redirigiremos a WhatsApp para confirmar tu registro.');
                
                // Redirigir a WhatsApp inmediatamente (compatible con Safari)
                window.location.href = whatsappURL;
            } else {
                alert('Error: ' + (data.message || 'No se pudo completar el registro'));
                isSubmitting = false; // Permitir reintentar
                // Rehabilitar botón
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
                submitBtn.style.cursor = 'pointer';
                submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmar Inscripción';
            }
        })
        .catch(error => {
            console.error('Error completo:', error);
            alert('Error: ' + error.message);
            isSubmitting = false; // Permitir reintentar
            // Rehabilitar botón
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
            submitBtn.style.cursor = 'pointer';
            submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmar Inscripción';
        });
    });
</script>
@endsection
