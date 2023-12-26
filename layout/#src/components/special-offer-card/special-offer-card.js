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
            console.log(fullTextElements);
            fullTextElements.forEach(fullTextEl => {
                const elIndex = fullTextEl.getAttribute('data-index');
                if (!elIndex) return;

                if (elIndex === index) {
                    fullTextEl.classList.add('show');
                } else {
                    fullTextEl.classList.remove('show');
                }
            })
        } else if(e.target.closest('[data-action="hide-full-text-by-index"]')) {
            e.preventDefault();
            const btn = e.target;
            const parent = btn.closest('.special-offer-card__full-text');
           
            if(!parent) return;
            parent.classList.remove('show');
        }

    })
}