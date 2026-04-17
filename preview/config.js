/**
 * config.js — Variables globales del sitio.
 * Cambia aquí el teléfono, email, dirección, etc. y se actualizará
 * en todas las páginas (header, footer, enlaces tel:/mailto:).
 *
 * Tokens usados en los parciales (partials/*.html): {{phone}}, {{phoneTel}}, etc.
 */
window.SITE_CONFIG = {
    brand:       'Cocinas Tomás',
    tagline:     'Carpintería a medida: cocinas, armarios, baños y otros servicios.',
    taglineShort:'Carpintería a medida.',

    // Teléfono: "phone" es el formato mostrado, "phoneTel" va en href="tel:..."
    phone:       '+34 609 608 289',
    phoneTel:    '+34609608289',

    // WhatsApp (formato internacional sin +, para wa.me)
    whatsapp:    '34609608289',

    // Email
    email:       'tomascocinas@hotmail.com',

    // Ubicación
    workshop:    'Molina de Segura',
    zone:        'Murcia',

    // Footer
    year:        '2026'
};
