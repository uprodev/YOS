const tickerLogosSections = document.querySelectorAll('[data-ticker-logos]');
if (tickerLogosSections.length) {
    tickerLogosSections.forEach(tickerLogosSection => {
        const sliderLtr = tickerLogosSection.querySelector('.swiper[dir="ltr"]');
        const sliderRtl = tickerLogosSection.querySelector('.swiper[dir="rtl"]');
        
        const options = {
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
        }
        
        

        if(document.documentElement.clientWidth < 992) {
            new Swiper(sliderRtl, options);
        } else {
            sliderLtr.firstElementChild.append(...sliderRtl.firstElementChild.children)
        }

        new Swiper(sliderLtr, options);
    })
}