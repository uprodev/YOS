const homeIntro = document.querySelector('[data-slider="home-intro"]');
if(homeIntro) {
    const swiperSlider = new Swiper(homeIntro.querySelector('.swiper'), {
        slidesPerView: 1,
        speed: 600,
        scrollbar: {
            el: homeIntro.querySelector('.swiper-scrollbar'),
            draggable: true,
        },
        navigation: {
            nextEl: homeIntro.querySelector('.slider-btn.right'),
            prevEl: homeIntro.querySelector('.slider-btn.left'),
        },
    })

    const scrollbar = homeIntro.querySelector('.swiper-scrollbar');
    if(!scrollbar) return;
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
}