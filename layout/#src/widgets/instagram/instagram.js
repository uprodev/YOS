const instagramSliders = document.querySelectorAll('[data-slider="instagram"]');
if (instagramSliders.length) {
    instagramSliders.forEach(instagramSlider => {
        const swiperSlider = new Swiper(instagramSlider, {
            observer: true,
            observeParents: true,
            speed: 600,
            breakpoints: {
                320: {
                    slidesPerView: 'auto',
                    spaceBetween: 14,
                    freeMode: true,
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
