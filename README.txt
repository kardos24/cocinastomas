================================================================
PROYECTO: WEB DEL CARPINTERO
================================================================
Documento maestro con el contexto completo del proyecto.
Se va actualizando según añadimos información y configuraciones.

Última actualización: 2026-04-18
Versión: 1.0
Fase actual: PRODUCCIÓN + entorno local activo (Laragon).


----------------------------------------------------------------
1. RESUMEN DEL PROYECTO
----------------------------------------------------------------
Marca: "Cocinas Tomás". Carpintero: Tomás Cardos.
Web corporativa que muestra su trabajo en cuatro especialidades
(cocinas, armarios, baños y mantenimiento), biografía y sistema
de contacto (teléfono, WhatsApp, formulario por email).

Hosting: WebEmpresa — ACTIVO en https://cocinastomas.es/
Plataforma: WordPress con tema personalizado "carpintero-theme".
Repositorio: https://github.com/kardos24/cocinastomas (rama main)
Paralelo: carpeta /preview/ con HTML estáticos probables en Live Server.


----------------------------------------------------------------
2. DECISIONES DE DISEÑO
----------------------------------------------------------------
Paleta seleccionada: OPCIÓN B (moderna minimalista)
  Primario    #1A1A1A  (carbón)
  Secundario  #F5F1EA  (hueso)
  Acento      #B8860B  (dorado madera)
  Fondo       #FFFFFF
  Texto       #2B2B2B
  Muted       #6B6B6B
  Borde       #E5E0D6

Tipografía seleccionada: COMBO 1 (elegante artesanal)
  Títulos: Playfair Display (500, 600, 700)
  Cuerpo:  Inter (400, 500, 600, 700)
  Cargada desde Google Fonts con display=swap.

Estilo visual:
  - Mucho espacio en blanco, grid limpio.
  - Fotografía grande, detalles de madera.
  - Bordes redondeados 6-16px.
  - Sombras sutiles.
  - Transiciones 200-300 ms.
  - Scroll reveal (fade + translateY 24px).
  - Mobile-first.


----------------------------------------------------------------
3. ESTRUCTURA DE CARPETAS
----------------------------------------------------------------
proyectoPruebaClaude/
├── README.txt                 (este archivo)
├── preview/                   (HTML estático para Live Server)
│   ├── index.html             (home: hero slider + servicios + bio + contacto)
│   ├── cocinas.html
│   ├── armarios.html
│   ├── banos.html
│   ├── otros-servicios.html   (antes mantenimiento.html)
│   ├── sobre-mi.html
│   ├── contacto.html
│   ├── config.js              (variables centralizadas: tel, email, marca...)
│   └── partials/              (componentes compartidos)
│       ├── header.html        (top-bar + nav)
│       ├── footer.html
│       ├── cookies-banner.html
│       └── include.js         (inyecta parciales y sustituye tokens)
├── scripts/
│   ├── resize-images.ps1      (redimensionado con System.Drawing)
│   └── image-manifest.txt     (48 entradas: src|dest|w|h|quality)
├── carpintero-theme/          (el tema WordPress)
│   ├── style.css              (cabecera del tema)
│   ├── functions.php
│   ├── index.php              (fallback)
│   ├── header.php
│   ├── footer.php
│   ├── front-page.php         (Home)
│   ├── page-cocinas.php       (Template: Cocinas)
│   ├── page-armarios.php      (Template: Armarios)
│   ├── page-banos.php         (Template: Baños)
│   ├── page-otros-servicios.php (Template: Otros servicios)
│   ├── page-sobre-mi.php      (Template: Sobre mí)
│   ├── page-contacto.php      (Template: Contacto)
│   ├── 404.php
│   │
│   ├── assets/
│   │   ├── css/
│   │   │   ├── main.css       (estilos principales)
│   │   │   └── animations.css (scroll reveal)
│   │   ├── js/
│   │   │   ├── main.js        (nav móvil, cookies, scroll suave)
│   │   │   ├── scroll-reveal.js
│   │   │   ├── gallery.js     (lightbox)
│   │   │   └── before-after.js
│   │   ├── images/
│   │   │   ├── logo/          (logos: horizontal, vertical, isotipo, .ico)
│   │   │   ├── brand/         (entregables de identidad, tarjeta)
│   │   │   ├── favicon/       (iconos del navegador)
│   │   │   ├── og/            (Open Graph — fuente sin optimizar)
│   │   │   ├── placeholders/
│   │   │   ├── bio/           (foto del carpintero — fuente)
│   │   │   ├── gallery/       (fuentes originales a plena resolución)
│   │   │   │   ├── hero/
│   │   │   │   ├── cocinas/
│   │   │   │   ├── armarios/
│   │   │   │   ├── banos/
│   │   │   │   └── mantenimiento/
│   │   │   ├── optimized/     (versiones redimensionadas y recortadas)
│   │   │   │   ├── hero/      (5 x 1920x1080)
│   │   │   │   ├── cocinas/   (10 x 1200x900, 01..10.jpg)
│   │   │   │   ├── armarios/  (10 x 1200x900)
│   │   │   │   ├── banos/     (10 x 1200x900)
│   │   │   │   ├── mantenimiento/ (7 x 1200x900)
│   │   │   │   ├── home/      (4 destacadas 800x600)
│   │   │   │   ├── bio/       (carpintero.jpg 800x1000)
│   │   │   │   └── og/        (og-default.jpg 1200x630)
│   │   │   └── before-after/
│   │   │       ├── cocinas/
│   │   │       └── mantenimiento/
│   │   ├── fonts/             (reservada)
│   │   └── icons/             (reservada)
│   │
│   ├── inc/
│   │   ├── theme-setup.php    (menús, tamaños de imagen, soportes)
│   │   ├── enqueue.php        (carga CSS/JS + Google Fonts)
│   │   ├── cpt.php            (CPT Proyecto + taxonomía)
│   │   ├── acf-fields.php     (integración con ACF)
│   │   ├── seo-local.php      (OG + JSON-LD LocalBusiness)
│   │   ├── contact-form.php   (formulario + wp_mail)
│   │   ├── accessibility.php
│   │   └── helpers.php
│   │
│   ├── template-parts/
│   │   ├── header/
│   │   │   ├── top-bar.php    (logo + tel + WhatsApp)
│   │   │   └── nav.php
│   │   ├── footer/            (reservada)
│   │   ├── home/
│   │   │   ├── hero-gallery.php
│   │   │   ├── services.php
│   │   │   ├── bio.php
│   │   │   └── contact.php
│   │   └── components/
│   │       ├── gallery.php
│   │       ├── before-after.php
│   │       ├── testimonial.php
│   │       ├── cta.php
│   │       └── cookies-banner.php
│   │
│   ├── languages/             (reservada, para traducciones)
│   └── acf-json/              (sincronización de grupos ACF)
│
├── design/
│   ├── palette.md             (detalle de colores)
│   ├── typography.md          (detalle tipografías)
│   ├── components.md          (componentes visuales)
│   └── mockups/               (wireframes y pantallas)
│
└── docs/
    ├── plan.md                (plan de trabajo)
    ├── content/               (textos por sección)
    └── deploy-webempresa.md   (checklist de despliegue)


----------------------------------------------------------------
4. FUNCIONALIDADES IMPLEMENTADAS (BASE)
----------------------------------------------------------------
[OK] Estructura de páginas (Home + 4 servicios + Sobre mí + Contacto + 404).
[OK] Header sticky con top-bar (teléfono + WhatsApp) y navegación.
[OK] Menú móvil (hamburguesa).
[OK] Hero a pantalla completa con slider automático (crossfade 5s).
[OK] Sección de servicios en el home (4 cards).
[OK] Mini biografía + bloque de contacto rápido en el home.
[OK] Plantillas de las 4 páginas de servicio con galería + CTA.
[OK] Página de mantenimiento con slider antes/después.
[OK] Página de contacto con formulario + datos + (mapa pendiente).
[OK] Animaciones suaves al hacer scroll (data-reveal).
[OK] Slider antes/después funcional.
[OK] SEO local: Open Graph, Twitter Card, JSON-LD LocalBusiness.
[OK] Favicon + enlaces en <head> (los ficheros hay que añadirlos).
[OK] Formulario con envío por email (wp_mail, nonce, honeypot, RGPD).
[OK] Responsive first (mobile-first, breakpoints 640/768/1024).
[OK] Accesibilidad: skip link, aria-labels, prefers-reduced-motion.
[OK] Banner de cookies con localStorage.
[OK] WhatsApp flotante.
[OK] Custom Post Type "Proyecto" + taxonomía "categoria_proyecto".
[OK] Lightbox básico para galerías.
[OK] Imágenes optimizadas integradas (48 archivos, 29-220KB).
[OK] Galería con fallback estático cuando no hay CPT (lee /optimized/{cat}/).
[OK] Preview estática (/preview/) probable con Live Server sin WordPress.
[OK] Logo "Cocinas Tomás" en la barra de navegación (logo-horizontal.png).


----------------------------------------------------------------
5. PENDIENTE DE HACER
----------------------------------------------------------------
Contenido (lo aporta el cliente / el usuario):
  [OK] Logo de la empresa (logo-horizontal.png en /assets/images/logo/).
  [OK] Imagen Open Graph (og-default.jpg).
  [OK] Fotos del hero (5 imágenes 1920x1080).
  [OK] Fotos de cocinas (10), armarios (10), baños (10), mantenimiento (7).
  [OK] Foto del carpintero para la bio.
  [OK] Favicon en todos los tamaños (generados desde logo-isotipo.png).
  [  ] Pares antes/después para el slider de mantenimiento.
  [  ] Textos reales de biografía.
  [  ] Datos reales: teléfono, WhatsApp, email, dirección, horario, zona.
  [  ] Textos legales: aviso legal, política de privacidad, política de cookies.
  [  ] Dar de alta en Google Business Profile.

Configuración técnica:
  [~] Instalar WordPress en entorno local → ver wordpress-local/INSTRUCCIONES.txt
       (WordPress descargado, tema copiado, script de setup listo; falta instalar Laragon).
  [OK] Subir el tema y activarlo en producción.
  [  ] Instalar plugins: ACF Pro, WP Mail SMTP, Rank Math, Complianz.
  [OK] Crear las páginas en WP y asignar templates (cocinas, armarios, banos,
       otros-servicios, sobre-mi, contacto).
  [OK] Menú de navegación funcional (fallback estático en nav.php).
  [  ] Mapa de Google embebido en la página de Contacto.
  [  ] Configurar SMTP para los envíos de formulario.
  [  ] Sustituir todos los +34 000 000 000 por el teléfono real.
  [OK] Email real: tomascocinas@hotmail.com.
  [  ] Rellenar Schema.org LocalBusiness con dirección real.

Despliegue (ver docs/deploy-webempresa.md):
  [OK] Dominio cocinastomas.es activo en WebEmpresa.
  [OK] WordPress instalado en WebEmpresa (cocinastomas.es).
  [OK] Tema carpintero-theme subido y activado vía FTP.
  [OK] cocinastomas.com redirige 301 a cocinastomas.es.
  [  ] SSL, caché, backups.
  [  ] Configurar SMTP.


----------------------------------------------------------------
6. CÓMO AÑADIR MÁS FOTOS
----------------------------------------------------------------
Flujo establecido:
  1. Dejar las fotos originales en /assets/images/gallery/{categoria}/.
  2. Editar scripts/image-manifest.txt añadiendo una línea por foto:
       src|dest|width|height|quality
     Ejemplo:
       carpintero-theme/assets/images/gallery/cocinas/foto.jpg|carpintero-theme/assets/images/optimized/cocinas/11.jpg|1200|900|82
  3. Ejecutar en PowerShell desde la raíz del proyecto:
       powershell -ExecutionPolicy Bypass -File scripts/resize-images.ps1
  4. Si son galerías: actualizar el count en template-parts/components/gallery.php
     ($static_counts) y la misma cantidad en /preview/{pagina}.html.

Formatos de destino (fit-cover centrado, JPG):
  - Hero:           1920x1080 (hero-1..5.jpg)
  - Galerías:       1200x900 (01..NN.jpg)
  - Destacadas:     800x600  (cocina-destacada.jpg, etc.)
  - Bio:            800x1000 (carpintero.jpg)
  - OG:             1200x630 (og-default.jpg)

Favicon: usar realfavicongenerator.net con logo-isotipo.png como fuente.


----------------------------------------------------------------
6b. CÓMO PROBAR LA PREVIEW SIN WORDPRESS
----------------------------------------------------------------
Live Server es estático y no ejecuta PHP. Para ver el diseño:
  1. Abrir VSCode en la raíz del proyecto.
  2. Instalar la extensión "Live Server" (ritwickdey.LiveServer).
  3. Clic derecho en preview/index.html → "Open with Live Server".
  4. Navegar por los enlaces del menú (todas las páginas están enlazadas).

La preview replica el tema WordPress con las mismas CSS/JS.
El formulario de contacto muestra una alert — solo funciona en WP.

IMPORTANTE: Live Server es obligatorio (no sirve abrir el .html con
doble click). El include.js usa fetch() para cargar los parciales y
fetch() no funciona con el protocolo file://.

Cómo funcionan los componentes:
  - preview/config.js define las variables del sitio (tel, email, marca).
    Cambia aquí el teléfono o el email y se actualiza en TODAS las páginas.
  - preview/partials/header.html, footer.html y cookies-banner.html son
    los componentes compartidos. Los tokens {{phone}}, {{email}}, etc.
    se sustituyen en tiempo de ejecución con los valores de config.js.
  - En cada página los componentes se insertan con:
        <div data-include="header"></div>
        <div data-include="footer"></div>
        <div data-include="cookies-banner"></div>
  - Para enlazar un botón al teléfono o email directamente en el
    contenido de una página se puede usar:
        <a data-bind-href="tel:phoneTel" href="#">Llamar</a>
        <a data-bind-href="mailto:email" href="#">Escribir</a>
        <span data-bind-text="phone"></span>


----------------------------------------------------------------
7. NOTAS TÉCNICAS
----------------------------------------------------------------
- Textdomain del tema: "carpintero" (para traducciones).
- Constantes definidas en functions.php:
    CARPINTERO_VERSION = "0.1.0"
    CARPINTERO_DIR     = path al tema
    CARPINTERO_URI     = URL al tema
- El formulario usa wp_mail() y la dirección de admin_email.
  Para producción: instalar WP Mail SMTP con el SMTP de WebEmpresa.
- Los tamaños de imagen "carpintero-*" se registran en theme-setup.php.
- Compatible con Yoast/RankMath: si están activos, el SEO custom se
  desactiva para evitar duplicados.


----------------------------------------------------------------
8. HISTORIAL DE CAMBIOS
----------------------------------------------------------------
2026-04-17  Creación del proyecto.
            - Plan general definido.
            - Paleta B y tipografía Combo 1 elegidas.
            - Esqueleto del tema creado.
            - README maestro inicializado.

2026-04-17  Integración de imágenes y preview estática.
            - Marca definida: "Cocinas Tomás" (Tomás Cardos).
            - Logos reorganizados de /favicon/ a /logo/ y /brand/.
            - Script PowerShell (System.Drawing) para redimensionar
              con recorte fit-cover centrado, bicúbico de alta calidad.
            - 48 imágenes optimizadas en /assets/images/optimized/:
              hero (5), cocinas (10), armarios (10), baños (10),
              mantenimiento (7), home destacadas (4), bio (1), og (1).
            - Plantillas WP actualizadas para leer de /optimized/:
              hero-gallery.php, services.php, bio.php, page-sobre-mi.php,
              seo-local.php (og image) y gallery.php (fallback estático).
            - Top-bar simplificada (solo contacto); logo en nav-bar blanca.
            - Preview estática /preview/ con las 7 páginas, probable
              en Live Server sin necesidad de WordPress.

2026-04-17  Favicons, contenido otros-servicios y biografía sobre-mi.
            - Favicons generados desde logo-isotipo.png con System.Drawing:
              favicon.ico, favicon-16/32/48, apple-touch-icon (180),
              android-chrome-192/512. Copiados en /favicon/, /logo/ y
              /optimized/favicon/.
            - site.webmanifest creado en /favicon/.
            - Todas las páginas HTML actualizadas con <link> de favicon
              completos (ICO + PNG 16/32 + apple-touch-icon + manifest).
            - otros-servicios.html: contenido reescrito con 8 tarjetas de
              servicio (puertas, mobiliario, tarimas, escaleras, revestimientos,
              pérgolas, restauración, reparaciones) y sección de proceso en 4
              pasos. Meta description actualizada.
            - sobre-mi.html: biografía profesional en 3 párrafos y sección
              "Mi forma de trabajar" con 6 valores (escucha, diseño funcional,
              materiales, presupuesto cerrado, plazos, garantía).
            - main.css: nuevas secciones 20-22 con estilos responsive para
              .feature-cards, .process-steps con .step-number y .values-grid.

2026-04-17  Componentización del preview y renombrado.
            - Renombrado: mantenimiento.html → otros-servicios.html.
            - Renombrado: page-mantenimiento.php → page-otros-servicios.php
              (clase CSS page-mantenimiento → page-otros-servicios).
            - Nuevo /preview/config.js con variables globales del sitio
              (marca, teléfono, email, dirección, WhatsApp, año).
            - Nueva carpeta /preview/partials/ con header.html, footer.html
              y cookies-banner.html: componentes compartidos entre páginas.
            - /preview/partials/include.js: sistema de inclusión por
              data-include="..." con sustitución de tokens {{clave}} y
              bindings data-bind-text / data-bind-href.
            - Las 7 páginas del preview ya no duplican header/footer/cookies.
              Cambiar el teléfono o el email en config.js se propaga a todo.

2026-04-18  Versión 1.0 — Limpieza, galería completa y entorno local.
            - Galería completa: procesadas TODAS las imágenes originales a
              1200x900 JPG en assets/images/wp-gallery-ready/ (106 imágenes:
              cocinas 58, armarios 23, baños 10, mantenimiento 7, hero 8).
            - gallery.php actualizado: usa wp-gallery-ready/ con conteos reales.
            - hero-gallery.php: usa wp-gallery-ready/hero/01-05.jpg.
            - Rutas de imágenes especiales reorganizadas:
              bio/, home/, og/ en assets/images/ (eliminada carpeta optimized/).
            - bio.php home: añadida biografía resumida de Tomás Cardos.
            - nav.php y services.php: corregida URL /mantenimiento→/otros-servicios.
            - Limpieza mayor del proyecto:
                Eliminados: wordpress-local/ (258MB), carpintero-theme.zip (168MB),
                preview/, optimized/, scripts PHP de despliegue, PDFs de diseño,
                carpetas vacías (design/mockups, docs/content, before-after/cocinas).
            - Entorno local Laragon configurado (cocinastomas.test):
                BD importada desde producción, uploads descargados, tema instalado.

2026-04-18  Mejoras visuales home y footer.
            - Imágenes de servicios home regeneradas a 1200x800 calidad 95
              (antes 800x600) para eliminar borrosidad en pantallas HD.
            - Footer sección "Secciones" reemplaza wp_nav_menu (requería
              menú configurado en admin) por links hardcodeados: Inicio,
              Cocinas, Armarios, Baños, Otros servicios, Sobre mí, Contacto.
            - Hero slider: orden de fotos cambiado a 6, 5, 3, 4, 2, 1.
            - Imágenes home y wp-gallery-ready copiadas al entorno local Laragon.
            - Cambios subidos a WebEmpresa por FTP.

2026-04-17  Despliegue en producción (WebEmpresa) + GitHub.
            - Repositorio GitHub creado: https://github.com/kardos24/cocinastomas
            - Instalada la GitHub App de Claude Code con workflows:
              claude.yml (responde a @claude en PRs/issues) y
              claude-code-review.yml (revisión automática en PRs).
            - Proyecto subido a la rama main del repositorio.
            - Tema carpintero-theme subido por FTP a
              cocinastomas.es/wp-content/themes/carpintero-theme/ (235 archivos).
            - Resuelto error 500 por plugins incompatibles con PHP 8.5
              (cactus-edd-addon, cactus-job, cactus-portfolio, bizhub-sampledata,
              gantry, revslider, easing-slider, tema business-hub): todos eliminados.
            - Tema activado directamente en base de datos (wp_options).
            - Páginas WordPress creadas/corregidas vía DB:
                contacto (slug contact → contacto)
                otros-servicios (slug otros-muebles → otros-servicios)
                banos (nueva)
                sobre-mi (nueva)
            - nav.php y services.php: corregida URL hardcodeada
              /mantenimiento → /otros-servicios.
            - Limpieza del servidor:
                Eliminados: danielcardos.es, clinicadentalmula.danielcardos.es
                Eliminados: todos los plugins
                Eliminados: temas antiguos (business-hub, twentytwentytwo,
                  twentytwentyfive, twentytwentyfour)
            - cocinastomas.com reconvertido a redirect 301 → cocinastomas.es.
