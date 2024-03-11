const carousels = document.querySelectorAll('[data-slider="carousel"]');
if (carousels.length) {
    carousels.forEach(carousel => {
        const products = carousel.querySelectorAll('.product-card');
        if(products.length) {
            const AlignPrices = initAlignPricesInOneLine();
            AlignPrices.apply(Array.from(products), products.length);
        }

        const swiperSlider = new Swiper(carousel, {
            speed: 600,
            observer: true,
            observeParents: true,
            scrollbar: {
                el: carousel.querySelector('.carousel__navigation .swiper-scrollbar'),
                draggable: true
            },
            navigation: {
                nextEl: carousel.querySelector('.carousel__navigation .slider-btn.right'),
                prevEl: carousel.querySelector('.carousel__navigation .slider-btn.left'),
            },
            pagination: {
                el: carousel.querySelector('.carousel__navigation .slider-pagination'),
                type: 'custom',
                renderCustom: function (swiper, current, total) {
                    let currentValue = current > 9 ? current : '0' + current;
                    let currentTotal = total > 9 ? total : '0' + total;
                    return currentValue + '/' + currentTotal;
                }
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                    //autoHeight: true,
                    freeMode: false,
                },
                768: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    freeMode: true,
                }
            },
        })
    })
}

const carouselsTabs = document.querySelectorAll('[data-carousel-tabs]');
if (carouselsTabs.length) {
    carouselsTabs.forEach(carouselTabs => {
        const triggers = carouselTabs.querySelectorAll('[data-action="show-carousel-tab"]');
        const tabs = carouselTabs.querySelectorAll('[data-carousel-tab-content]');

        triggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                if (trigger.classList.contains('active')) return;

                const currentIndex = trigger.getAttribute('data-index');
                if (!currentIndex) return;

                carouselTabs.style.minHeight = carouselTabs.clientHeight + 'px';

                setTimeout(() => carouselTabs.style.minHeight = 'auto',600)

                triggers.forEach(t => {
                    const index = t.getAttribute('data-index');
                    if (!index) return;

                    if (index === currentIndex) {
                        t.classList.add('active');
                    } else {
                        t.classList.remove('active');
                    }
                })

                tabs.forEach(tab => {
                    const index = tab.getAttribute('data-index');
                    if (!index) return;

                    if (index === currentIndex) {
                        
                        setTimeout(() => {
                            tab.classList.remove('exit', 'active');
                            tab.classList.add('show', 'enter');
                            setTimeout(() => tab.classList.add('active'), 1)
                            
                        }, 600)
                    } else {
                        tab.classList.remove('enter', 'active')
                        tab.classList.add('exit');
                        setTimeout(() => tab.classList.add('active'), 1)
                        setTimeout(() => {
                            tab.classList.remove('show')
                        }, 600)
                    }

                    
                    // if (index === currentIndex) {
                        
                    //     setTimeout(() => {
                    //         tab.classList.remove('exit', 'active');
                    //         tab.classList.add('show');
                    //         target.style.transitionProperty = 'opacity';
                    //         target.style.transitionDuration = 300 + 'ms';
                    //         tab.style.opacity = 0;
                    //         tab.style.opacity = 1;
                    //     }, 300)
                    // } else {
                    //     tab.classList.add('exit', 'active');
                    //     setTimeout(() => {
                    //         tab.classList.remove('show')
                    //     }, 300)
                    // }
                })
            })
        })
    })
}