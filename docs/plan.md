# Plan del proyecto

## Objetivo
Web corporativa para un carpintero que muestre su trabajo (cocinas, armarios, baños, mantenimiento), su perfil y capte contactos.

## Público objetivo
Particulares y pequeñas empresas locales buscando carpintería a medida.

## Secciones
1. **Home**: hero galería + servicios + bio + contacto.
2. **Cocinas**: galería + proceso + CTA.
3. **Armarios**: galería + tipos/accesorios + CTA.
4. **Baños**: galería + materiales + CTA.
5. **Mantenimiento**: galería + servicios + antes/después + CTA.
6. **Sobre mí**: biografía + stats + foto.
7. **Contacto**: formulario + datos + mapa.

## Funcionalidades seleccionadas
- Animaciones suaves al hacer scroll en el home.
- Slider antes/después.
- SEO local (JSON-LD LocalBusiness + Open Graph + Twitter Card).
- Rendimiento: imágenes responsive, lazy loading, preconnect a fonts.
- Responsive first (mobile-first).
- Cookies y RGPD (banner con localStorage).
- Accesibilidad (skip link, aria-labels, prefers-reduced-motion).
- Favicon + Open Graph images.
- Formulario con envío por email (wp_mail, nonce, honeypot).

## Stack
- WordPress + tema custom `carpintero-theme`.
- ACF (Advanced Custom Fields) para contenidos editables.
- Hosting final: WebEmpresa.

## Fases
1. ✅ Planificación + diseño visual.
2. ✅ Esqueleto del tema.
3. ⏳ Maquetación y pruebas locales.
4. ⏳ Contenidos reales (fotos, textos, datos).
5. ⏳ Pruebas de accesibilidad y rendimiento (Lighthouse >90).
6. ⏳ Despliegue en WebEmpresa.
