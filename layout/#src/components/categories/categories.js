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

class CategoryItems {
    _items = null;
    _header = null;
    _categories = null;

    static setHeight() {
        if(!this._header) return;
        
        this._items.forEach(item => {
            item.style.maxHeight = document.documentElement.clientHeight - this._header.clientHeight - this._categories.clientHeight + 'px';
        })
    }

    static init() {
        this._items = Array.from(categoriesEl.querySelectorAll('[data-category-tab]'));
        this._header = document.querySelector('[data-header]');
        this._categories = document.querySelector('[data-categories]');
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