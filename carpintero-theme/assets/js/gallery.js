/**
 * gallery.js — Photo slider: imagen principal + tira de miniaturas + flechas.
 */
(function () {
    'use strict';

    document.querySelectorAll('[data-slider]').forEach(function (slider) {
        const mainImg   = slider.querySelector('.slider-main-img');
        const prevBtn   = slider.querySelector('.slider-prev');
        const nextBtn   = slider.querySelector('.slider-next');
        const thumbsWrap = slider.querySelector('.slider-thumbs-wrap');
        const thumbs    = Array.from(slider.querySelectorAll('.slider-thumb'));

        if (!mainImg || !thumbs.length) return;

        let current = 0;

        function goTo(idx) {
            if (idx === current) return;

            // Fade out
            mainImg.classList.add('is-fading');

            setTimeout(function () {
                const thumb = thumbs[idx];
                mainImg.src = thumb.dataset.src;
                mainImg.alt = thumb.dataset.alt || '';
                mainImg.classList.remove('is-fading');
            }, 140);

            // Actualizar clases y aria
            thumbs[current].classList.remove('is-active');
            thumbs[current].setAttribute('aria-pressed', 'false');
            thumbs[idx].classList.add('is-active');
            thumbs[idx].setAttribute('aria-pressed', 'true');

            current = idx;

            // Llevar la miniatura activa al centro de la tira
            scrollThumbIntoView(thumbs[idx]);
        }

        function scrollThumbIntoView(thumb) {
            if (!thumbsWrap) return;
            const wrapRect  = thumbsWrap.getBoundingClientRect();
            const thumbRect = thumb.getBoundingClientRect();
            const offset    = thumbRect.left - wrapRect.left + thumbsWrap.scrollLeft
                              - (wrapRect.width / 2 - thumbRect.width / 2);
            thumbsWrap.scrollTo({ left: offset, behavior: 'smooth' });
        }

        // Miniaturas
        thumbs.forEach(function (thumb, idx) {
            thumb.addEventListener('click', function () { goTo(idx); });
        });

        // Flechas
        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                goTo(current === 0 ? thumbs.length - 1 : current - 1);
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                goTo(current === thumbs.length - 1 ? 0 : current + 1);
            });
        }

        // Teclado cuando el slider tiene foco
        slider.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowLeft')  { e.preventDefault(); prevBtn && prevBtn.click(); }
            if (e.key === 'ArrowRight') { e.preventDefault(); nextBtn && nextBtn.click(); }
        });

        // Swipe táctil en la imagen principal
        let touchStartX = 0;
        mainImg.addEventListener('touchstart', function (e) {
            touchStartX = e.touches[0].clientX;
        }, { passive: true });
        mainImg.addEventListener('touchend', function (e) {
            const dx = e.changedTouches[0].clientX - touchStartX;
            if (Math.abs(dx) > 40) {
                dx < 0 ? nextBtn && nextBtn.click() : prevBtn && prevBtn.click();
            }
        }, { passive: true });
    });
})();
