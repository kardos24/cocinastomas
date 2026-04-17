/**
 * before-after.js — slider comparador de imágenes.
 */
(function () {
    'use strict';

    document.querySelectorAll('[data-before-after]').forEach((wrap) => {
        const slider = wrap.querySelector('.ba-slider');
        const clip = wrap.querySelector('[data-ba-clip]');
        if (!slider || !clip) return;

        const update = (value) => {
            clip.style.clipPath = `inset(0 ${100 - value}% 0 0)`;
        };

        slider.addEventListener('input', (e) => update(e.target.value));
        update(slider.value);
    });
})();
