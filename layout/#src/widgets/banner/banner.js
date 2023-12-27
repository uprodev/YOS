const bannerImagesSliders = document.querySelectorAll('[data-slider="banner-images"]');
if (bannerImagesSliders.length) {
    bannerImagesSliders.forEach(bannerImagesSlider => {
        const swiperSlider = new Swiper(bannerImagesSlider, {
            effect: 'fade',
            observer: true,
            observeParents: true,
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 400,
            touchRatio: 0,
        });

        const parent = bannerImagesSlider.closest('[data-banner]');
        if(!parent) return;

        const triggers = parent.querySelectorAll('.category-links__list [data-action="change-banner-image-by-index"]');
        
        triggers.forEach(trigger => {
            const index = trigger.getAttribute('data-index');
            if(!index) return;

            trigger.addEventListener('mouseenter', () => {
                swiperSlider.slideTo(index);
            })
        })
    })
}