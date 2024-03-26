const tickerLogosSections = document.querySelectorAll('[data-ticker-logos]');
if (tickerLogosSections.length) {
    tickerLogosSections.forEach(tickerLogosSection => {
        new Swiper(tickerLogosSection.querySelector('.swiper'), {
            speed: 6000,
            autoplay: {
                delay: 1,
                disableOnInteraction: false
            },
            centeredSlides: true,
            loop: true,
            freeMode: true,
            breakpoints: {
                0: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                }
            },
        });
    })
}