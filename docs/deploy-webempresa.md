# Despliegue en WebEmpresa (pendiente)

Checklist para cuando toque subir el sitio.

## 1. Acceso
- Entrar al panel de WebEmpresa (cPanel).
- Contratar dominio si no lo tenemos.
- Asegurar certificado SSL gratuito (Let's Encrypt).

## 2. WordPress
- Instalar WordPress desde Softaculous / instalador 1-click.
- Elegir prefijo de tablas distinto a `wp_` (seguridad).
- Crear usuario admin con contraseña fuerte.

## 3. Plugins base
- Advanced Custom Fields Pro (campos editables).
- WP Mail SMTP (para que el formulario envíe fiable — usar el SMTP de WebEmpresa).
- WPForms o Contact Form 7 (alternativa al form custom si se prefiere).
- Yoast SEO o Rank Math (complemento al SEO que ya trae el tema).
- Complianz / CookieYes (RGPD completo).
- WP Super Cache o W3 Total Cache (caché).
- WebP Express o ShortPixel (optimización de imágenes).
- Wordfence o Solid Security (seguridad).
- UpdraftPlus (backups automáticos).

## 4. Subida del tema
- Comprimir `carpintero-theme/` en ZIP.
- Subir desde Apariencia → Temas → Añadir nuevo → Subir.
- Activar el tema.
- Instalar ACF y sincronizar los grupos desde `/acf-json`.

## 5. Configuración básica
- Ajustes → Lectura: Página de inicio = Home estática.
- Ajustes → Enlaces permanentes: `/%postname%/`.
- Crear las páginas: Inicio, Cocinas, Armarios, Baños, Mantenimiento, Sobre mí, Contacto, Aviso legal, Política de privacidad, Política de cookies.
- Asignar los templates (Cocinas → Template "Cocinas", etc.).
- Configurar el menú principal y de footer.

## 6. Contenidos
- Subir logo.
- Subir fotos a la librería de medios (alternativa a `assets/images/`).
- Crear entradas de "Proyectos" en cada categoría.
- Rellenar datos de contacto reales en Ajustes → General y en ACF global.

## 7. SEO
- Dar de alta Google Search Console y subir sitemap.
- Crear perfil en Google Business Profile.
- Actualizar `seo-local.php` con la dirección, teléfono y horario reales.

## 8. Rendimiento
- Revisar Lighthouse (>90).
- Activar compresión GZIP/Brotli en cPanel.
- Activar HTTP/2.
- Configurar caché de navegador en `.htaccess`.

## 9. Post-lanzamiento
- Programar backups semanales.
- Configurar actualizaciones automáticas (core + seguridad).
- Revisar formularios de contacto mensualmente.
