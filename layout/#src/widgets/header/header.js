



// Mobile menu
const mobileMenu = document.querySelector('[data-mobile-menu]');
if (mobileMenu) {
    const buttonsOpen = document.querySelectorAll('[data-action="open-mobile-menu"]');
    const buttonsClose = document.querySelectorAll('[data-action="close-mobile-menu"]');
    const mainLayer = mobileMenu.querySelector('.mobile-menu__main-layer');

    buttonsOpen.forEach(button => {
        button.addEventListener('click', () => {
            document.body.classList.add('overflow-hidden');
            mobileMenu.classList.add('open')
        });
    })

    buttonsClose.forEach(button => {
        button.addEventListener('click', () => {
            document.body.classList.remove('overflow-hidden');
            mobileMenu.classList.remove('open')
        });
    })

    document.addEventListener('click', (e) => {
        if(
            e.target.closest('[data-action]')
            || e.target.closest('[data-side-basket]')
            || e.target.closest('[data-filter]')
            || e.target.closest('[data-add-comment]')
            ) return;

        if(!e.target.closest('.mobile-menu')) {
            document.body.classList.remove('overflow-hidden');
            mobileMenu.classList.remove('open')
        }
    })

    mobileMenu.addEventListener('click', (e) => {
        if(e.target.closest('[data-action="show-layer-by-id"]')) {
            const btn = e.target.closest('[data-action="show-layer-by-id"]');
            const id = btn.getAttribute('data-id');
            if(!id) return;
            
            const layer = mobileMenu.querySelector(`[data-layer="${id}"]`);
            if(!layer) return;
            layer.classList.add('show');
            mainLayer.classList.add('overflow-hidden');
        }

        if(e.target.closest('[data-action="hide-layer"]')) {
            const layer = e.target.closest('[data-layer]');
            if(!layer) return;
            layer.classList.remove('show');
            mainLayer.classList.remove('overflow-hidden');
        }
    })
}

// Top offer
const topOffers = document.querySelectorAll('[data-top-offer]');
if (topOffers.length) {
    const headHeightCompensation = document.querySelector('.head-height-compensation');

    topOffers.forEach(topOffer => {
        const parrentEl = topOffer.parentElement;

        const setPaddingTop = (value, isTransition = false) => {
            parrentEl.style.transition = isTransition ? 'padding-top .15s ease' : '';
            parrentEl.style.paddingTop = value + 'px';
        }

        const setPaddingWrapper = () => {
            setPaddingTop(topOffer.clientHeight);
        }

        topOffer.classList.add('show');
        setPaddingTop(topOffer.clientHeight);
        CategoryItems.setHeight();


        window.addEventListener('resize', setPaddingWrapper);

        topOffer.addEventListener('click', (e) => {
            if(e.target.closest('[data-action="close-top-offer"]')) {
                e.preventDefault();
                const topOfferHeight = topOffer.clientHeight;
                topOffer.classList.remove('show');
                setPaddingTop(0, true);

                setTimeout(() => {
                    CategoryItems.setHeight();
                }, 300);
    
                window.removeEventListener('resize', setPaddingWrapper);

                if(!headHeightCompensation) return;
                headHeightCompensation.style.transition = 'padding-top .15s ease';
                headHeightCompensation.style.paddingTop = (headHeightCompensation.clientHeight - topOfferHeight) + 'px';
            }
        })
    })
}


const header = document.querySelector('[data-header]');
if(header) {

    // header scrool animation
    window.addEventListener('scroll', () => {
        header.classList.toggle('header--is-scrolling', window.pageYOffset > 50);
    })


    // header height compensation
    const headHeightCompensation = document.querySelector('.head-height-compensation');
    if(!headHeightCompensation) return;

    const setPaddingTop = (value, isTransition = false) => {
        headHeightCompensation.style.transition = isTransition ? 'padding-top .15s ease' : '';
        headHeightCompensation.style.paddingTop = value + 'px';
    }

    setPaddingTop(header.clientHeight);
    

    window.addEventListener('resize', () => setPaddingTop(header.clientHeight));
}


// main search
const mainSearchElements = document.querySelectorAll('[data-main-search]');
if(mainSearchElements.length) {
    mainSearchElements.forEach(mainSearch => {
        const searchId = mainSearch.getAttribute('data-id');
        if(!searchId) return;
        const buttonsShow = document.querySelectorAll(`[data-action="show-search-by-id"][data-id="${searchId}"]`);
        const input = mainSearch.querySelector('input.dgwt-wcas-search-input');

        buttonsShow.forEach(buttonShow => {
            buttonShow.addEventListener('click', (e) => {
                e.preventDefault();
                mainSearch.classList.add('show');
                input.focus();
            })
        })

        if(!input) return;
        input.addEventListener('blur', () => {
            if (input.value.length === 0) mainSearch.classList.remove('show');
        })
    })
}