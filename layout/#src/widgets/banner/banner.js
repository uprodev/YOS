const banners = document.querySelectorAll('[data-banner]');
if (banners.length) {
    banners.forEach(banner => {
        const links = banner.querySelector('[data-slider="category-links-list-banner"]');
        const images = banner.querySelector('[data-slider="banner-images"]');
        const slider = links;
        let linksSlider;

        function mobileSlider() {
            if (document.documentElement.clientWidth <= 991 && slider.dataset.mobile == 'false') {
                linksSlider = new Swiper(slider, {
                    slidesPerView: 'auto',
                    touchRatio: 0
                });

                slider.dataset.mobile = 'true';
            }

            if (document.documentElement.clientWidth > 991) {
                slider.dataset.mobile = 'false';

                if (slider.classList.contains('swiper-initialized')) {
                    linksSlider.destroy();
                }
            }
        }

        mobileSlider();

        window.addEventListener('resize', () => {
            mobileSlider();
        })

        const swiperSlider = new Swiper(images, {
            effect: 'fade',
            observer: true,
            observeParents: true,
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 400,
            slideToClickedSlide: true,
            scrollbar: {
                el: images.querySelector('.swiper-scrollbar'),
                draggable: true,
            },
            on: {
                init: () => {
                    linksSlider?.slides[0]?.classList.add('active');
                },
                slideChange: (e) => {
                    linksSlider?.slideTo(e.activeIndex);
                    linksSlider?.slides[e.activeIndex]?.classList.add('active');
                    linksSlider?.slides.forEach((slide, index) => {
                        if (index == e.activeIndex) return;
                        slide.classList.remove('active');
                    })
                }
            }
        });

        const scrollbar = images.querySelector('.swiper-scrollbar');
        if (!scrollbar) return;
        const clickLine = document.createElement('div');
        clickLine.className = 'click-line';
        scrollbar.append(clickLine);

        clickLine.addEventListener('pointerdown', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const countOfSlides = swiperSlider.slides.length;
            const step = clickLine.clientWidth / countOfSlides
            swiperSlider.slideTo(Math.floor(e.layerX / step));
        })

        const triggers = banner.querySelectorAll('.category-links__list [data-action="change-banner-image-by-index"]');

        triggers.forEach((trigger, i) => {
            if(i === 0) trigger.classList.add('active')

            const index = trigger.getAttribute('data-index');
            if (!index) return;

            trigger.addEventListener('mouseenter', () => {
                if (document.documentElement.clientWidth > 991.98) {
                    swiperSlider.slideTo(index);
                    trigger.classList.add('active');

                    triggers.forEach(t => {
                        if(t === trigger) return;
                        t.classList.remove('active');
                    })
                }
            })
        })
    })
}
