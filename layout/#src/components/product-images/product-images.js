const productImages = document.querySelector('[data-product-images]');
if (productImages) {
    const thumbsSlider = new Swiper(productImages.querySelector('[data-slider="product-images-thumbs"]'), {
        slidesPerView: 'auto',
        freeMode: true,
        direction: 'vertical',
        observer: true,
        observeParents: true,
        slideToClickedSlide: true,
        navigation: {
            nextEl: productImages.querySelector('.product-images__btn.bottom'),
            prevEl: productImages.querySelector('.product-images__btn.top'),
        },
    })
    const mainSlider = new Swiper(productImages.querySelector('[data-slider="product-images-main"]'), {
        effect: document.documentElement.clientWidth < 992 ? 'slide' : 'fade',
        speed: 400,
        slidesPerView: 1,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        slideToClickedSlide: true,
        thumbs: {
            swiper: thumbsSlider,
        },
        scrollbar: {
            el: productImages.querySelector('[data-slider="product-images-main"] .swiper-scrollbar'),
        }
    })
}