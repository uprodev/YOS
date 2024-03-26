const homeIntro = document.querySelector('[data-slider="home-intro"]');
if (homeIntro) {
    const swiperSlider = new Swiper(homeIntro.querySelector('.swiper'), {
        slidesPerView: 1,
        speed: 600,
        effect: "creative",
        creativeEffect: {
            prev: {
                translate: ["-20%", 0, -1],
            },
            next: {
                translate: ["100%", 0, 0],
            },
        },
        autoplay: {
            delay: 3000
        },
        loop: true,
        scrollbar: {
            el: homeIntro.querySelector('.swiper-scrollbar'),
            draggable: true,
        },
        navigation: {
            nextEl: homeIntro.querySelector('.slider-btn.right'),
            prevEl: homeIntro.querySelector('.slider-btn.left'),
        },
        breakpoints: {
            0: {
                autoHeight: true
            },
            768: {
                autoHeight: false
            }
        },
    })

    const scrollbar = homeIntro.querySelector('.swiper-scrollbar');
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
}