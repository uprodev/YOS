const homeIntro = document.querySelector('[data-slider="home-intro"]');
if(homeIntro) {
    const swiperSlider = new Swiper(homeIntro.querySelector('.swiper'), {
        slidesPerView: 1,
        speed: 600,
        scrollbar: {
            el: homeIntro.querySelector('.swiper-scrollbar'),
        },
        navigation: {
            nextEl: homeIntro.querySelector('.slider-btn.right'),
            prevEl: homeIntro.querySelector('.slider-btn.left'),
        },
    })
}