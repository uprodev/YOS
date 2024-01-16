const specialOfferCards = document.querySelectorAll('[data-special-offer-card]');
if (specialOfferCards.length) {
    document.addEventListener('click', (e) => {
        if (e.target.closest('[data-action="show-full-text-by-index"]')) {
            e.preventDefault();
            const btn = e.target.closest('[data-action="show-full-text-by-index"]');

            const index = btn.getAttribute('data-index');
            if (!index) return;

            const parent = e.target.closest('[data-special-offer-card]');
            if (!parent) return;

            const fullTextElements = parent.querySelectorAll('.special-offer-card__full-text');

            fullTextElements.forEach(fullTextEl => {
                const elIndex = fullTextEl.getAttribute('data-index');
                if (!elIndex) return;

                if (elIndex === index) {
                    fullTextEl.classList.add('show');
                } else {
                    fullTextEl.classList.remove('show');
                }
            })

            const slide = e.target.closest('.swiper-slide');
            if(!slide) return;
            slide.classList.add('z-index-100');
        } else if(e.target.closest('[data-action="hide-full-text-by-index"]')) {
            e.preventDefault();
            const btn = e.target;
            const fullTextEl = btn.closest('.special-offer-card__full-text');

            if(!fullTextEl) return;
            fullTextEl.classList.remove('show');

            const slide = e.target.closest('.swiper-slide');
            if(!slide) return;
            slide.classList.remove('z-index-100');
        }

    })
}