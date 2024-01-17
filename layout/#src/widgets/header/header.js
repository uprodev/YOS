

// categories
const headerMobCategoriesSlider = document.querySelector('[data-slider="header-mob-categories"]');
if (headerMobCategoriesSlider) {
    const swiperSlider = new Swiper(headerMobCategoriesSlider, {
        freeMode: true,
        slidesPerView: 'auto',
        scrollbar: {
            el: headerMobCategoriesSlider.querySelector('.swiper-scrollbar'),
            hide: true,
            draggable: true
        },
    })
}

// Mobile menu
const mobileMenu = document.querySelector('[data-mobile-menu]');
if (mobileMenu) {
    const buttonsOpen = document.querySelectorAll('[data-action="open-mobile-menu"]');
    const buttonsClose = document.querySelectorAll('[data-action="close-mobile-menu"]');
    const mainLayer = mobileMenu.querySelector('.mobile-menu__main-layer');
    const catalogLayer = mobileMenu.querySelector('.mobile-menu__layer--catalog');

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
        if(e.target.closest('[data-action]')) return;

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

            if(layer !== catalogLayer) {
                catalogLayer.classList.add('overflow-hidden');
            }
        }

        if(e.target.closest('[data-action="hide-layer"]')) {
            const layer = e.target.closest('[data-layer]');
            if(!layer) return;
            layer.classList.remove('show');

            if(!catalogLayer.classList.contains('show')) {
                mainLayer.classList.remove('overflow-hidden');
            }

            if(layer !== catalogLayer) {
                catalogLayer.classList.remove('overflow-hidden');
            }
        }
    })
}


// Categories
class CategoryItems {
    _items = null;
    _header = null;

    static setHeight() {
        if(!this._header) return;
        this._items.forEach(item => {
            item.style.maxHeight = document.documentElement.clientHeight - this._header.clientHeight + 'px';
        })
    }

    static init() {
        this._items = Array.from(categoriesEl.querySelectorAll('[data-category-tab]'));
        this._header = document.querySelector('[data-header]');
        this.setHeight();

        window.addEventListener('resize', this.setHeight.bind(this))
    }
}

const categoriesEl = document.querySelector('[data-categories]');
if(categoriesEl) {
    const navItems = categoriesEl.querySelectorAll('[data-action="show-category-tab-by-index"]');
    const targetItems = Array.from(categoriesEl.querySelectorAll('[data-category-tab]'));

    const resetNavItems = () => {
        navItems.forEach(navItem => navItem.classList.remove('active'))
    }
    const resetTargetItems = () => {
        if(document.documentElement.clientWidth < 992) {
            document.documentElement.classList.remove('overflow-hidden');
        }
        targetItems.forEach(targetItem => targetItem.classList.remove('show'));
    }

    navItems.forEach(navItem => {
        navItem.addEventListener('mouseenter', () => {
            const index = navItem.getAttribute('data-index');
            resetNavItems();
            resetTargetItems();

            navItem.classList.add('active');
            if(!index) return;

            const [targetItem] = targetItems.filter(targetItem => targetItem.dataset?.index === index);
            if(!targetItem) return;
            targetItem.classList.add('show');
            if(document.documentElement.clientWidth < 992) {
                document.documentElement.classList.add('overflow-hidden');
            }
        })
    })

    categoriesEl.addEventListener('mouseleave', () => {
        resetNavItems();
        resetTargetItems();
    })

    CategoryItems.init();
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
        const buttonClose = mainSearch.querySelector('.main-search__btn-close');
        const input = mainSearch.querySelector('input.input');

        buttonsShow.forEach(buttonShow => {
            buttonShow.addEventListener('click', (e) => {
                e.preventDefault();
                mainSearch.classList.add('show');
                input.focus();
            })
        })

        input.addEventListener('blur', () => {
            if (input.value.length === 0) mainSearch.classList.remove('show');
        })

        buttonClose.addEventListener('click', (e) => {
            e.preventDefault();
            mainSearch.classList.remove('show');
        })
    })
}