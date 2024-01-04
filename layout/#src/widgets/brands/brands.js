const bestBrandsSlider = document.querySelector('[data-slider="best-brands"]');
if (bestBrandsSlider) {
    const slider = bestBrandsSlider;
    let mySwiper;

    function mobileSlider() {
        if (document.documentElement.clientWidth <= 767 && slider.dataset.mobile == 'false') {
            mySwiper = new Swiper(slider, {
                slidesPerView: 'auto',
                freeMode: true,
                scrollbar: {
                    el: slider.querySelector('.swiper-scrollbar'),
                },
            });

            slider.dataset.mobile = 'true';
        }

        if (document.documentElement.clientWidth > 767) {
            slider.dataset.mobile = 'false';

            if (slider.classList.contains('swiper-initialized')) {
                mySwiper.destroy();
            }
        }
    }

    mobileSlider();

    window.addEventListener('resize', () => {
        mobileSlider();
    })
}

const brandsNavSlider = document.querySelector('[data-slider="brands-nav"]');
if (brandsNavSlider) {
    new Swiper(brandsNavSlider, {
        slidesPerView: 'auto',
        freeMode: true,
        scrollbar: {
            el: brandsNavSlider.querySelector('.swiper-scrollbar'),
        },
    });
}

const brandsSection = document.querySelector('[data-brands]');
if (brandsSection) {
    const navItems = brandsSection.querySelectorAll('[data-action="filter-by-letter"]');
    const inputSearch = brandsSection.querySelector('.brands__search input');
    const list = brandsSection.querySelector('.brands__list');

    const listData = Array.from(list.children).map(listRow => {
        const rowItemsBlock = listRow.querySelector('.brands__list-block');
        const rowItemsData = rowItemsBlock?.children
            ? Array.from(rowItemsBlock.children).map(rowItem => {
                return {
                    el: rowItem,
                    text: rowItem.querySelector('.brands__list-block-item').innerText.trim().toLowerCase()
                }
            })
            : null
        return {
            letter: listRow.getAttribute('data-letter').toLowerCase(),
            el: listRow,
            children: rowItemsData
        }
    });

    const filter = (value) => {
        const text = value.trim().toLowerCase();
        const firstLetter = text.at(0);

        listData.forEach(listRowData => {
            if (text.length) {

                if (firstLetter !== listRowData.letter) {

                    listRowData.el.classList.add('d-none');

                } else {
                    listRowData.el.classList.remove('d-none');
                    listRowData.children.forEach(rowItem => {

                        if (!rowItem.text.startsWith(text)) {
                            rowItem.el.classList.add('d-none');
                        } else {
                            rowItem.el.classList.remove('d-none');
                        }

                    })
                }

            } else {
                listRowData.el.classList.remove('d-none');
            }
        })
    }

    inputSearch.addEventListener('input', (e) => {
        filter(e.target.value);
    });

    navItems.forEach(navItem => {
        const letter = navItem.getAttribute('data-letter');
        if(!letter) return;

        navItem.addEventListener('click', () => {
            if(letter === '#') {
                inputSearch.parentElement.classList.remove('using');
                inputSearch.value = '';
                filter('');
            } else {
                inputSearch.parentElement.classList.add('using');
                inputSearch.value = letter;
                filter(letter);
            }
            navItems.forEach(n => {
                if(n === navItem) {
                    n.classList.add('active');
                } else {
                    n.classList.remove('active');
                }
            })
        })
    })
}