const banners = document.querySelectorAll('[data-banner]');
if (banners.length) {
    banners.forEach(banner => {
        const links = banner.querySelector('[data-slider="category-links-list-banner"]');
        const images = banner.querySelector('[data-slider="banner-images"]');
        const slider = links;
        let linksSlider;

        function mobileSlider() {
            if (document.documentElement.clientWidth <= 767 && slider.dataset.mobile == 'false') {
                linksSlider = new Swiper(slider, {
                    slidesPerView: 'auto',
                    //freeMode: true,
                    scrollbar: {
                        el: slider.querySelector('.swiper-scrollbar'),
                    },
                });

                slider.dataset.mobile = 'true';
            }

            if (document.documentElement.clientWidth > 767) {
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
            touchRatio: 0,
            // thumbs: {
            //     swiper: linksSlider,
            // },
        });

        if(linksSlider?.controller) {
            linksSlider.controller.control = swiperSlider
        }

        const triggers = banner.querySelectorAll('.category-links__list [data-action="change-banner-image-by-index"]');

        triggers.forEach(trigger => {
            const index = trigger.getAttribute('data-index');
            if (!index) return;

            trigger.addEventListener('mouseenter', () => {
                swiperSlider.slideTo(index);
            })
        })
    })
}
