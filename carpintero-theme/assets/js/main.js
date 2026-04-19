/**
 * main.js — navegación móvil, scroll suave, banner de cookies, hero slider.
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

    // --- Hero slider ---
    const slides = document.querySelectorAll('.hero-slide');
    if (slides.length > 1) {
        const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduced) {
            // Sin animación: mostrar primera slide estáticamente.
            return;
        }

        let idx = 0;
        let timer = null;
        const heroSection = document.querySelector('.hero-gallery');

        function next() {
            slides[idx].classList.remove('is-active');
            idx = (idx + 1) % slides.length;
            slides[idx].classList.add('is-active');
        }

        function start() {
            if (!timer) timer = setInterval(next, 5000);
        }

        function pause() {
            clearInterval(timer);
            timer = null;
        }

        start();

        // Pausa en hover y cuando el foco entra en la sección.
        if (heroSection) {
            heroSection.addEventListener('mouseenter', pause);
            heroSection.addEventListener('mouseleave', start);
            heroSection.addEventListener('focusin',   pause);
            heroSection.addEventListener('focusout',  start);
        }
    }
})();
