/**
 * include.js — Sistema de componentes para la preview estática.
 *
 * 1. Busca elementos con data-include="nombre" y los sustituye
 *    por el contenido de partials/nombre.html.
 * 2. Reemplaza tokens {{clave}} usando window.SITE_CONFIG (config.js).
 * 3. Tras inyectar los parciales, carga los scripts del tema
 *    (main.js, scroll-reveal.js, gallery.js, before-after.js) para
 *    que encuentren el DOM ya completo.
 *
 * Necesita un servidor HTTP (Live Server). No funciona con file://.
 */
(function () {
    'use strict';

    const THEME_JS = '../carpintero-theme/assets/js/';
    const THEME_SCRIPTS = [
        'main.js',
        'scroll-reveal.js',
        'gallery.js',
        'before-after.js'
    ];

    const config = window.SITE_CONFIG || {};

    function applyTokens(str) {
        return str.replace(/\{\{\s*(\w+)\s*\}\}/g, (match, key) => {
            return Object.prototype.hasOwnProperty.call(config, key) ? config[key] : match;
        });
    }

    async function includeOne(el) {
        const name = el.dataset.include;
        if (!name) return;
        try {
            const res = await fetch('partials/' + name + '.html');
            if (!res.ok) throw new Error('HTTP ' + res.status);
            const html = applyTokens(await res.text());
            const tpl = document.createElement('template');
            tpl.innerHTML = html.trim();
            el.replaceWith(tpl.content);
        } catch (err) {
            console.error('[include] no se pudo cargar', name, err);
            el.innerHTML = '<!-- include error: ' + name + ' -->';
        }
    }

    function loadScript(src) {
        return new Promise((resolve, reject) => {
            const s = document.createElement('script');
            s.src = src;
            s.defer = false;
            s.onload = resolve;
            s.onerror = reject;
            document.body.appendChild(s);
        });
    }

    async function boot() {
        const slots = Array.from(document.querySelectorAll('[data-include]'));
        await Promise.all(slots.map(includeOne));

        // Sustituir tokens dentro de nodos existentes (por ejemplo textos en main)
        // marcados con data-bind="clave" o atributos data-bind-href, data-bind-text.
        document.querySelectorAll('[data-bind-text]').forEach((el) => {
            const key = el.getAttribute('data-bind-text');
            if (config[key] != null) el.textContent = config[key];
        });
        document.querySelectorAll('[data-bind-href]').forEach((el) => {
            const spec = el.getAttribute('data-bind-href');
            // formato: "tel:phoneTel" o "mailto:email" o "phoneTel"
            const [prefix, key] = spec.includes(':') ? spec.split(':') : ['', spec];
            if (config[key] != null) {
                el.setAttribute('href', (prefix ? prefix + ':' : '') + config[key]);
            }
        });

        document.dispatchEvent(new CustomEvent('partials:loaded'));

        for (const name of THEME_SCRIPTS) {
            try {
                await loadScript(THEME_JS + name);
            } catch (err) {
                console.error('[include] no se pudo cargar script', name, err);
            }
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot, { once: true });
    } else {
        boot();
    }
})();
