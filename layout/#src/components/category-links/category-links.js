const categoryLinksElements = document.querySelectorAll('[data-slider="category-links-list"]');
if (categoryLinksElements.length) {
    categoryLinksElements.forEach(categoryLinks => {
        const slider = categoryLinks;
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
    })
}