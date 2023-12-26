// header
const header = document.querySelector('[data-header]');
if(header) {
    window.addEventListener('scroll', () => {
        header.classList.toggle('header--is-scrolling', window.pageYOffset > 50);
    })
}


// categories
const headerMobCategoriesSlider = document.querySelector('[data-slider="header-mob-categories"]');
if (headerMobCategoriesSlider) {
    const swiperSlider = new Swiper(headerMobCategoriesSlider, {
        freeMode: true,
        slidesPerView: 'auto',
        scrollbar: {
            el: headerMobCategoriesSlider.querySelector('.swiper-scrollbar'),
        },
    })
}

// Mobile menu
const mobileMenu = document.querySelector('[data-mobile-menu]');
if (mobileMenu) {
    const buttonsOpen = document.querySelectorAll('[data-action="open-mobile-menu"]');
    const buttonsClose = document.querySelectorAll('[data-action="close-mobile-menu"]');

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
}


// Categories
class CategoryItems {
    _items = null;
    _header = null;

    static setHeight() {
        if(!this._header) return;
        this._items.forEach(item => {
            item.style.height = document.documentElement.clientHeight - this._header.clientHeight + 'px';
        })
    }

    static init() {
        this._items = Array.from(categoriesEl.querySelectorAll('[data-category-item]'));
        this._header = document.querySelector('[data-header]');
        this.setHeight();

        window.addEventListener('resize', this.setHeight.bind(this))
    }
}

const categoriesEl = document.querySelector('[data-categories]');
if(categoriesEl) {
    const navItems = categoriesEl.querySelectorAll('[data-action="show-category-nav-by-index"]');
    const targetItems = Array.from(categoriesEl.querySelectorAll('[data-category-item]'));

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
    topOffers.forEach(topOffer => {
        const parrentEl = topOffer.parentElement;
        const delay = topOffer.getAttribute('data-delay') || 2000;

        const setPaddingTop = (value) => {
            parrentEl.style.transition = 'padding-top .3s ease';
            parrentEl.style.paddingTop = value + 'px';
        }

        const setPaddingTopWithouTransition = () => {
            parrentEl.style.transition = '';
            parrentEl.style.paddingTop = topOffer.clientHeight + 'px';
        }

        setTimeout(() => {
            topOffer.classList.add('show');
            setPaddingTop(topOffer.clientHeight);

            setTimeout(() => {
                CategoryItems.setHeight();
            }, 300);
        }, 300);

        window.addEventListener('resize', setPaddingTopWithouTransition);

        const buttonClose = topOffer.querySelector('[data-action="close-top-offer"]');
        if (!buttonClose) return;

        buttonClose.addEventListener('click', () => {
            topOffer.classList.remove('show');
            setPaddingTop(0);

            setTimeout(() => {
                CategoryItems.setHeight();
            }, 300);

            window.removeEventListener('resize', setPaddingTopWithouTransition);
        })
    })
}
