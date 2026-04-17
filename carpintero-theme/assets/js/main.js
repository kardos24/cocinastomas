/**
 * main.js — navegación móvil, scroll suave, banner de cookies.
 */
(function () {
    'use strict';

    // --- Nav móvil ---
    const toggle = document.querySelector('.nav-toggle');
    const menu = document.getElementById('primary-menu');
    if (toggle && menu) {
        toggle.addEventListener('click', () => {
            const open = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
        });
    }

    // --- Scroll suave para anclas internas ---
    document.querySelectorAll('[data-scroll-to]').forEach((el) => {
        el.addEventListener('click', (e) => {
            const target = document.querySelector(el.getAttribute('data-scroll-to'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // --- Cookies banner ---
    const banner = document.getElementById('cookies-banner');
    if (banner) {
        const choice = localStorage.getItem('carpintero_cookies');
        if (!choice) banner.hidden = false;

        banner.querySelectorAll('[data-cookies]').forEach((btn) => {
            btn.addEventListener('click', () => {
                localStorage.setItem('carpintero_cookies', btn.dataset.cookies);
                banner.hidden = true;
            });
        });
    }
})();
