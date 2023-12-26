const tickerLogosSections = document.querySelectorAll('[data-slider="ticker-logos"]');
if (tickerLogosSections.length) {
    tickerLogosSections.forEach(tickerLogosSection => {
        const swiperSlider = new Swiper(tickerLogosSection, {
            speed: 6000,
            autoplay: {
                delay: 1,
            },
            loop: true,

            breakpoints: {
                320: {
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                    grid: {
                        rows: 2,
                    },
                },
                768: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    grid: {
                        rows: 1,
                    },
                },
            },
        })
    })
}