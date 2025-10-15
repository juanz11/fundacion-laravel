# Fundación David Brandt - Sitio Web Laravel

Este proyecto es una recreación del sitio web de WordPress de la Fundación David Brandt utilizando Laravel.

## 🚀 Características

- **Diseño Responsive**: Adaptado a todos los dispositivos
- **Páginas Principales**:
  - Inicio (Home)
  - Quiénes Somos
  - Programas
  - Contacto

## 📋 Requisitos Previos

- PHP >= 8.2
- Composer
- MySQL/MariaDB (opcional para funcionalidades futuras)
- Node.js y NPM (opcional para assets)

## 🔧 Instalación

1. **Navegar al directorio del proyecto**:
   ```bash
   cd C:\Users\Programador\CascadeProjects\fundacion-laravel
   ```

2. **Instalar dependencias de Composer** (ya instaladas):
   ```bash
   composer install
   ```

3. **Configurar el archivo de entorno**:
   ```bash
   copy .env.example .env
   ```

4. **Generar la clave de aplicación**:
   ```bash
   php artisan key:generate
   ```

5. **Iniciar el servidor de desarrollo**:
   ```bash
   php artisan serve
   ```

6. **Acceder al sitio**:
   Abre tu navegador en: `http://localhost:8000`

## 📁 Estructura del Proyecto

```
fundacion-laravel/
├── app/                    # Lógica de la aplicación
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php      # Layout principal
│       ├── home.blade.php         # Página de inicio
│       ├── quienes-somos.blade.php # Página quiénes somos
│       ├── programas.blade.php    # Página de programas
│       └── contacto.blade.php     # Página de contacto
├── routes/
│   └── web.php            # Rutas del sitio
└── public/                # Archivos públicos
```

## 🎨 Diseño y Estilos

El diseño está basado en el sitio WordPress original con las siguientes características:

- **Colores principales**:
  - Primario: #0a74da (azul)
  - Secundario: #25d366 (verde WhatsApp)
  - Gradientes: Púrpura a azul

- **Tipografía**: Inter (Google Fonts)
- **Iconos**: Font Awesome 6.4.0

## 📱 Páginas Implementadas

### 1. Inicio (/)
- Hero section con llamado a la acción
- Sección de servicios (3 tarjetas)
- Video institucional
- Testimonios
- Sección de compromiso comunitario
- Programa "Una Llamada, Una Vida"
- Información de contacto
- Mapa de ubicación

### 2. Quiénes Somos (/quienes-somos)
- Historia de la fundación
- Misión y visión
- Valores institucionales
- Equipo de trabajo

### 3. Programas (/programas)
- Programas de Prevención
- Programas de Intervención Inmediata
- Programas de Postvención
- Programa especial "Una Llamada, Una Vida"

### 4. Contacto (/contacto)
- Banner de emergencia
- Formulario de contacto
- Información de contacto completa
- Redes sociales
- Mapa de ubicación

## 🔗 Enlaces Importantes

- **WhatsApp**: +58 414-4008240
- **Teléfonos**: 0414-4008240 / 0414-4265181
- **Email**: fundabl25@fundaciondavidbrandt.org
- **Instagram**: @fundaciondavidbrandt
- **TikTok**: @fundavidbrandt
- **X (Twitter)**: @fundavidbrandt

## 🛠️ Próximos Pasos Sugeridos

1. **Base de Datos**:
   - Configurar MySQL
   - Crear modelos para contactos, testimonios, etc.
   - Implementar sistema de administración

2. **Funcionalidades**:
   - Sistema de envío de formularios por email
   - Panel de administración
   - Blog/Noticias
   - Sistema de donaciones

3. **Optimizaciones**:
   - Compilar assets con Vite
   - Optimizar imágenes
   - Implementar caché
   - SEO mejorado

4. **Seguridad**:
   - CSRF protection en formularios
   - Validación de datos
   - Rate limiting

## 📝 Notas

- El proyecto está configurado para desarrollo local
- Las imágenes actualmente apuntan a URLs externas del sitio WordPress original
- Se recomienda descargar y almacenar las imágenes localmente en `public/images/`

## 🤝 Contribuir

Para contribuir al proyecto:
1. Crea una rama para tu feature
2. Realiza tus cambios
3. Envía un pull request

## 📄 Licencia

Este proyecto es propiedad de la Fundación David Brandt.

## 📞 Soporte

Para soporte o consultas:
- Email: fundabl25@fundaciondavidbrandt.org
- Teléfono: 0414-4008240

---

**Desarrollado con ❤️ para la Fundación David Brandt**
