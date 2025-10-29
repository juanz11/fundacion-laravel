# Sistema de Registro - Caminata 5K

## Descripción General
Sistema completo de registro para el evento "1era Caminata Una Llamada, Una Vida 5K" con validación de pagos y módulo administrativo.

## Características Implementadas

### 1. Página Principal (Home)
- **Sección del Evento**: Ubicada entre "Testimonios" y "Compromiso Comunitario"
- **Información del Evento**:
  - Fecha: Domingo 30/11
  - Hora: 7:00 AM
  - Salida: Centro Profesional Prebo
  - Llegada: Cancha de la Trigaleña
- **Imagen**: `public/images/caminata5k-01.png`
- **Botón de Registro**: Abre modal de inscripción

### 2. Modal de Registro
**Campos Obligatorios**:
- Nombre y Apellido
- Cédula
- Teléfono
- Red Social (Instagram/Facebook)
- Confirmación de Transferencia (Número de Referencia)
- Método de Pago (opcional)

**Métodos de Pago Disponibles**:
- Transferencia Bancaria
- Pago Móvil
- Zelle
- PayPal
- Efectivo
- Otro

**Nota**: Los métodos de pago son los mismos que aparecen en la sección "Donar"

### 3. Base de Datos
**Tabla**: `event_registrations`

**Campos**:
- `id`: ID único
- `full_name`: Nombre completo
- `id_number`: Cédula
- `phone`: Teléfono
- `social_media`: Red social
- `payment_reference`: Referencia de pago
- `payment_method`: Método de pago
- `status`: Estado (pending, approved, rejected)
- `admin_notes`: Notas del administrador
- `approved_at`: Fecha de aprobación
- `approved_by`: ID del administrador que aprobó
- `created_at`: Fecha de registro
- `updated_at`: Fecha de actualización

### 4. Panel Administrativo
**Ruta**: `/admin/events`

**Funcionalidades**:
- Ver todos los registros del evento
- Estadísticas en tiempo real:
  - Registros pendientes
  - Registros aprobados
  - Registros rechazados
  - Total de registros
- Aprobar/Rechazar registros
- Ver detalles completos de cada registro
- Agregar notas administrativas
- Eliminar registros
- Indicador de registros pendientes en el menú lateral

**Estados de Registro**:
- **Pendiente** (amarillo): Esperando validación
- **Aprobado** (verde): Pago confirmado
- **Rechazado** (rojo): Pago no válido

### 5. Flujo de Trabajo

1. **Usuario visita la página principal**
   - Ve la sección del evento con la imagen promocional
   - Click en "¡Inscríbete Ahora!"

2. **Completa el formulario de registro**
   - Ingresa todos los datos requeridos
   - Incluye número de referencia de su pago
   - Selecciona método de pago utilizado
   - Envía el formulario

3. **Sistema procesa el registro**
   - Valida todos los campos
   - Guarda el registro con estado "Pendiente"
   - Muestra mensaje de confirmación

4. **Administrador revisa el registro**
   - Accede a `/admin/events`
   - Ve el nuevo registro en la lista
   - Verifica el pago con la referencia proporcionada
   - Aprueba o rechaza el registro
   - Puede agregar notas explicativas

5. **Notificación al participante**
   - El sistema actualiza el estado
   - El administrador puede contactar al participante según el estado

## Archivos Creados/Modificados

### Nuevos Archivos:
1. `database/migrations/2024_10_29_000000_create_event_registrations_table.php`
2. `app/Models/EventRegistration.php`
3. `app/Http/Controllers/EventRegistrationController.php`
4. `resources/views/admin/events/index.blade.php`

### Archivos Modificados:
1. `resources/views/home.blade.php` - Agregada sección del evento y modal
2. `routes/web.php` - Agregadas rutas del sistema de eventos
3. `resources/views/layouts/admin.blade.php` - Agregado enlace en menú admin

## Rutas del Sistema

### Rutas Públicas:
- `POST /evento/registro` - Registrar participante (route: `event.register`)

### Rutas Administrativas (requiere autenticación admin):
- `GET /admin/events` - Lista de registros (route: `admin.events.index`)
- `PATCH /admin/events/{registration}/status` - Actualizar estado (route: `admin.events.update-status`)
- `DELETE /admin/events/{registration}` - Eliminar registro (route: `admin.events.destroy`)

## Seguridad
- Validación de todos los campos en el servidor
- Protección CSRF en formularios
- Rutas administrativas protegidas con middleware `auth` y `admin`
- Sanitización de datos de entrada

## Próximos Pasos Sugeridos
1. Configurar notificaciones por email al aprobar/rechazar registros
2. Exportar lista de participantes aprobados a Excel/PDF
3. Generar códigos QR únicos para cada participante
4. Sistema de check-in el día del evento
5. Estadísticas post-evento

## Soporte
Para cualquier duda o problema con el sistema, contactar al equipo de desarrollo.
