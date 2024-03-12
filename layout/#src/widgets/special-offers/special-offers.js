{
    const carousels = document.querySelectorAll('[data-slider="special-offers"]');
    if (carousels.length) {
        carousels.forEach(carousel => {
            const swiperSlider = new Swiper(carousel.querySelector('.swiper'), {
                speed: 600,
                observer: true,
                observeParents: true,
                scrollbar: {
                    el: carousel.querySelector('.carousel__navigation .swiper-scrollbar'),
                    draggable: true
                },
                navigation: {
                    nextEl: carousel.querySelector('.carousel__navigation .slider-btn.right'),
                    prevEl: carousel.querySelector('.carousel__navigation .slider-btn.left'),
                },
                pagination: {
                    el: carousel.querySelector('.carousel__navigation .slider-pagination'),
                    type: 'custom',
                    renderCustom: function (swiper, current, total) {
                        let currentValue = current > 9 ? current : '0' + current;
                        let currentTotal = total > 9 ? total : '0' + total;
                        return currentValue + '/' + currentTotal;
                    }
                },
                breakpoints: {
                    320: {
                        slidesPerView: 'auto',
                        spaceBetween: 0,
                        freeMode: true,
                    }
                },
            })
        })
    }
}