<?php

$id = get_the_ID();

?>

<?php if( have_rows('content', $id) ): ?>

    <?php while( have_rows('content', $id) ): the_row(); ?>

        <?php get_template_part('templates/sections/' . get_row_layout()); ?>

    <?php endwhile; ?>

<?php endif; ?>

<section class="home-intro">
    <div class="home-intro__slider swiper" data-slider="home-intro">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="home-intro__img ibg">
                        <picture>
                            <source srcset="img/photo/home-intro-desk.jpg" media="(min-width: 768px)">
                            <img src="img/photo/home-intro-mob.jpg" alt="img">
                        </picture>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="home-intro__img ibg">
                        <picture>
                            <source srcset="img/photo/home-intro-desk.jpg" media="(min-width: 768px)">
                            <img src="img/photo/home-intro-mob.jpg" alt="img">
                        </picture>
                    </div>
                </div>
            </div>
            <div class="slider-buttons container">
                <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
            </div>
        </div>
        <div class="swiper-scrollbar slider-scrollbar"></div>
    </div>
    <div class="home-intro__bottom container">
        <h2 class="title-2">твій шлях до бездоганної шкіри</h2>
    </div>
</section>

<div class="top-space-60 top-space-md-170">
    <div class="carousel">
        <div class="container">
            <div class="carousel__head">
                <div class="carousel__category-info">
                    <div class="category-links">
                        <h2 class="category-links__title title-2"><a href="#">бестселери</a></h2>
                        <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#">Волосся</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Тіло</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Обличчя</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Макіяж</a>
                                </div>
                            </div>
                            <div class="swiper-scrollbar slider-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper" data-slider="carousel">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product-card" data-product-card>
                            <div class="product-card__head">
                                <div class="product-card__labels">
                                </div>
                                <a href="#" class="product-card__img">
                                    <img src="img/photo/product-card-img-1.png" alt="">
                                </a>
                                <button class="product-card__like-button active"></button>
                            </div>
                            <div class="product-card__body">
                                <div class="product-card__title"><a href="#">zein obagi</a></div>
                                <div class="product-card__text">
                                    <div class="product-card__text-1">
                                        Скраб відлущувальний
                                    </div>
                                    <div class="product-card__text-2">
                                        Zo Skin Health Exfoliating Polish
                                    </div>
                                </div>
                                <div class="product-card__price" data-index="0">
                                    <div class="product-card__price-current">2 299 ₴</div>
                                </div>
                                <div class="product-card__price show" data-index="1">
                                    <div class="product-card__price-current">3 299 ₴</div>
                                </div>
                                <div class="product-card__price" data-index="2">
                                    <div class="product-card__price-current">4 299 ₴</div>
                                </div>
                            </div>
                            <div class="product-card__footer">
                                <form>
                                    <div class="product-card__option">
                                        <label class="product-card__option-item" disabled>
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                            <div class="product-card__option-item-value">
                                                100 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option checked
                                                   data-index="1">
                                            <div class="product-card__option-item-value">
                                                290 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                            <div class="product-card__option-item-value">
                                                490 г
                                            </div>
                                        </label>
                                    </div>
                                    <button class="product-card__btn-to-basket button-primary dark w-100">
                                        додати до кошика
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide hide-in-mobile">
                        <div class="carousel__category-info">
                            <div class="category-links">
                                <h2 class="category-links__title title-2"><a href="#">бестселери</a></h2>
                                <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a href="#">Волосся</a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a href="#">Тіло</a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a href="#">Обличчя</a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a href="#">Макіяж</a>
                                        </div>
                                    </div>
                                    <div class="swiper-scrollbar slider-scrollbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card" data-product-card>
                            <div class="product-card__head">
                                <div class="product-card__labels">
                                    <div class="product-card-label">-25%</div>
                                </div>
                                <a href="#" class="product-card__img">
                                    <img src="img/photo/product-card-img-2.png" alt="">
                                </a>
                                <button class="product-card__like-button"></button>
                            </div>
                            <div class="product-card__body">
                                <div class="product-card__title"><a href="#">rare paris</a></div>
                                <div class="product-card__text">
                                    <div class="product-card__text-1">
                                        Заспокійлива маска для обличчя
                                    </div>
                                    <div class="product-card__text-2">
                                        Zo Skin Health Exfoliating Polish
                                    </div>
                                </div>
                                <div class="product-card__price" data-index="0">
                                    <div class="product-card__price-current">2 299 ₴</div>
                                    <div class="product-card__price-old">5 299 ₴</div>
                                </div>
                                <div class="product-card__price show" data-index="1">
                                    <div class="product-card__price-current">3 299 ₴</div>
                                    <div class="product-card__price-old">5 299 ₴</div>
                                </div>
                                <div class="product-card__price" data-index="2">
                                    <div class="product-card__price-current">4 299 ₴</div>
                                    <div class="product-card__price-old">6 299 ₴</div>
                                </div>
                            </div>
                            <div class="product-card__footer">
                                <form>
                                    <div class="product-card__option">
                                        <label class="product-card__option-item" disabled>
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                            <div class="product-card__option-item-value">
                                                100 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option checked
                                                   data-index="1">
                                            <div class="product-card__option-item-value">
                                                290 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                            <div class="product-card__option-item-value">
                                                490 г
                                            </div>
                                        </label>
                                    </div>
                                    <button class="product-card__btn-to-basket button-primary dark w-100">
                                        додати до кошика
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card" data-product-card>
                            <div class="product-card__head">
                                <div class="product-card__labels">
                                    <div class="product-card-label">YOS choice</div>
                                </div>
                                <a href="#" class="product-card__img">
                                    <img src="img/photo/product-card-img-3.png" alt="">
                                </a>
                                <button class="product-card__like-button"></button>
                            </div>
                            <div class="product-card__body">
                                <div class="product-card__title"><a href="#">zein obagi</a></div>
                                <div class="product-card__text">
                                    <div class="product-card__text-1">
                                        Скраб відлущувальний
                                    </div>
                                    <div class="product-card__text-2">
                                        Zo Skin Health Exfoliating Polish
                                    </div>
                                </div>
                                <div class="product-card__price" data-index="0">
                                    <div class="product-card__price-current">2 299 ₴</div>
                                </div>
                                <div class="product-card__price show" data-index="1">
                                    <div class="product-card__price-current">3 299 ₴</div>
                                </div>
                                <div class="product-card__price " data-index="2">
                                    <div class="product-card__price-current">4 299 ₴</div>
                                </div>
                                <div class="product-card__price " data-index="3">
                                    <div class="product-card__price-current">5 299 ₴</div>
                                </div>
                            </div>
                            <div class="product-card__footer">
                                <form>
                                    <div class="product-card__option">
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                            <div class="product-card__option-item-value">
                                                100 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option checked
                                                   data-index="1">
                                            <div class="product-card__option-item-value">
                                                290 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item" disabled>
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                            <div class="product-card__option-item-value">
                                                490 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="3">
                                            <div class="product-card__option-item-value">
                                                690 г
                                            </div>
                                        </label>
                                    </div>
                                    <button class="product-card__btn-to-basket button-primary dark w-100">
                                        додати до кошика
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card" data-product-card>
                            <div class="product-card__head">
                                <div class="product-card__labels">
                                </div>
                                <a href="#" class="product-card__img">
                                    <img src="img/photo/product-card-img-1.png" alt="">
                                </a>
                                <button class="product-card__like-button active"></button>
                            </div>
                            <div class="product-card__body">
                                <div class="product-card__title"><a href="#">zein obagi</a></div>
                                <div class="product-card__text">
                                    <div class="product-card__text-1">
                                        Скраб відлущувальний
                                    </div>
                                    <div class="product-card__text-2">
                                        Zo Skin Health Exfoliating Polish
                                    </div>
                                </div>
                                <div class="product-card__price" data-index="0">
                                    <div class="product-card__price-current">2 299 ₴</div>
                                    <div class="product-card__price-old">5 299 ₴</div>
                                </div>
                                <div class="product-card__price show" data-index="1">
                                    <div class="product-card__price-current">3 299 ₴</div>
                                    <div class="product-card__price-old">5 299 ₴</div>
                                </div>
                                <div class="product-card__price" data-index="2">
                                    <div class="product-card__price-current">4 299 ₴</div>
                                    <div class="product-card__price-old">6 299 ₴</div>
                                </div>
                            </div>
                            <div class="product-card__footer">
                                <form>
                                    <div class="product-card__option">
                                        <label class="product-card__option-item" disabled>
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                            <div class="product-card__option-item-value">
                                                100 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option checked
                                                   data-index="1">
                                            <div class="product-card__option-item-value">
                                                290 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                            <div class="product-card__option-item-value">
                                                490 г
                                            </div>
                                        </label>
                                    </div>
                                    <button class="product-card__btn-to-basket button-primary dark w-100">
                                        додати до кошика
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card" data-product-card>
                            <div class="product-card__head">
                                <div class="product-card__labels">
                                    <div class="product-card-label">-25%</div>
                                </div>
                                <a href="#" class="product-card__img">
                                    <img src="img/photo/product-card-img-2.png" alt="">
                                </a>
                                <button class="product-card__like-button"></button>
                            </div>
                            <div class="product-card__body">
                                <div class="product-card__title"><a href="#">rare paris</a></div>
                                <div class="product-card__text">
                                    <div class="product-card__text-1">
                                        Заспокійлива маска для обличчя
                                    </div>
                                    <div class="product-card__text-2">
                                        Zo Skin Health Exfoliating Polish
                                    </div>
                                </div>
                                <div class="product-card__price" data-index="0">
                                    <div class="product-card__price-current">2 299 ₴</div>
                                    <div class="product-card__price-old">5 299 ₴</div>
                                </div>
                                <div class="product-card__price show" data-index="1">
                                    <div class="product-card__price-current">3 299 ₴</div>
                                    <div class="product-card__price-old">5 299 ₴</div>
                                </div>
                                <div class="product-card__price" data-index="2">
                                    <div class="product-card__price-current">4 299 ₴</div>
                                    <div class="product-card__price-old">6 299 ₴</div>
                                </div>
                            </div>
                            <div class="product-card__footer">
                                <form>
                                    <div class="product-card__option">
                                        <label class="product-card__option-item" disabled>
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                            <div class="product-card__option-item-value">
                                                100 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option checked
                                                   data-index="1">
                                            <div class="product-card__option-item-value">
                                                290 г
                                            </div>
                                        </label>
                                        <label class="product-card__option-item">
                                            <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                            <div class="product-card__option-item-value">
                                                490 г
                                            </div>
                                        </label>
                                    </div>
                                    <button class="product-card__btn-to-basket button-primary dark w-100">
                                        додати до кошика
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel__navigation">
                    <div class="slider-navigations">
                        <div class="swiper-scrollbar slider-scrollbar"></div>
                        <div class="slider-buttons">
                            <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                            <div class="slider-pagination"></div>
                            <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel__footer">
                <a href="#" class="button-primary light w-100">БІЛЬШЕ</a>
            </div>
        </div>
    </div>
</div>

<div class="top-space-140 top-space-md-120">
    <div class="banner">
        <div class="container">
            <div class="banner__body">
                <div class="banner__text-content">
                    <div class="category-links">
                        <h2 class="title-2"><a href="#">категорії</a></h2>
                        <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#">Волосся</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Тіло</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Обличчя</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Макіяж</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Аксесуари <span class="link-label">Coming soon</span></a>
                                </div>
                            </div>
                            <div class="swiper-scrollbar slider-scrollbar"></div>
                        </div>
                    </div>
                </div>
                <div class="banner__img ibg">
                    <picture>
                        <source srcset="img/photo/category-banner-desk.jpg" media="(min-width: 768px)" >
                        <img src="img/photo/category-banner-mob.jpg" alt="img">
                    </picture>
                </div>
            </div>
            <div class="banner__footer">
                <a href="#" class="button-primary light w-100">ПЕРЕЙТИ</a>
            </div>
        </div>
    </div>
</div>

<div class="top-space-140 top-space-md-150">
    <div class="carousel" data-carousel-tabs>
        <div class="container">
            <div class="carousel__head">
                <div class="carousel__category-info">
                    <div class="category-links">
                        <h2 class="category-links__title title-2">
                            <div class="carousel__tab-trigger active" data-action="show-carousel-tab" data-index="0">новинки</div>
                            <div class="carousel__tab-trigger" data-action="show-carousel-tab" data-index="1">у тренді</div>
                        </h2>
                        <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#">Волосся</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Тіло</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Обличчя</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">Макіяж</a>
                                </div>
                            </div>
                            <div class="swiper-scrollbar slider-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel__tab-content show" data-carousel-tab-content data-index="0">
                <div class="swiper" data-slider="carousel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-1.png" alt="">
                                    </a>
                                    <button class="product-card__like-button active"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">zein obagi</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Скраб відлущувальний
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                    </div>
                                    <div class="product-card__price" data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                        <div class="product-card-label">-25%</div>
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-2.png" alt="">
                                    </a>
                                    <button class="product-card__like-button"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">rare paris</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Заспокійлива маска для обличчя
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price" data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                        <div class="product-card__price-old">6 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-info">
                            <div class="carousel__category-info">
                                <div class="category-links">
                                    <h2 class="category-links__title title-2">
                                        <div class="carousel__tab-trigger active" data-action="show-carousel-tab" data-index="0">новинки</div>
                                        <div class="carousel__tab-trigger" data-action="show-carousel-tab" data-index="1">у тренді</div>
                                    </h2>
                                    <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="#">Волосся</a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#">Тіло</a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#">Обличчя</a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#">Макіяж</a>
                                            </div>
                                        </div>
                                        <div class="swiper-scrollbar slider-scrollbar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                        <div class="product-card-label">YOS choice</div>
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-3.png" alt="">
                                    </a>
                                    <button class="product-card__like-button"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">zein obagi</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Скраб відлущувальний
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                    </div>
                                    <div class="product-card__price " data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                    </div>
                                    <div class="product-card__price " data-index="3">
                                        <div class="product-card__price-current">5 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="3">
                                                <div class="product-card__option-item-value">
                                                    690 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-1.png" alt="">
                                    </a>
                                    <button class="product-card__like-button active"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">zein obagi</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Скраб відлущувальний
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price" data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                        <div class="product-card__price-old">6 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                        <div class="product-card-label">-25%</div>
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-2.png" alt="">
                                    </a>
                                    <button class="product-card__like-button"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">rare paris</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Заспокійлива маска для обличчя
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price" data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                        <div class="product-card__price-old">6 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel__navigation">
                        <div class="slider-navigations">
                            <div class="swiper-scrollbar slider-scrollbar"></div>
                            <div class="slider-buttons">
                                <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                                <div class="slider-pagination"></div>
                                <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel__footer">
                    <a href="#" class="button-primary light w-100">БІЛЬШЕ</a>
                </div>
            </div>
            <div class="carousel__tab-content" data-carousel-tab-content data-index="1">
                <div class="swiper" data-slider="carousel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-1.png" alt="">
                                    </a>
                                    <button class="product-card__like-button active"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">zein obagi</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Скраб відлущувальний
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                    </div>
                                    <div class="product-card__price" data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                        <div class="product-card-label">YOS choice</div>
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-3.png" alt="">
                                    </a>
                                    <button class="product-card__like-button"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">zein obagi</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Скраб відлущувальний
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                    </div>
                                    <div class="product-card__price " data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                    </div>
                                    <div class="product-card__price " data-index="3">
                                        <div class="product-card__price-current">5 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="3">
                                                <div class="product-card__option-item-value">
                                                    690 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-info">
                            <div class="carousel__category-info">
                                <div class="category-links">
                                    <h2 class="category-links__title title-2">
                                        <div class="carousel__tab-trigger active" data-action="show-carousel-tab" data-index="0">новинки</div>
                                        <div class="carousel__tab-trigger" data-action="show-carousel-tab" data-index="1">у тренді</div>
                                    </h2>
                                    <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="#">Волосся</a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#">Тіло</a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#">Обличчя</a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#">Макіяж</a>
                                            </div>
                                        </div>
                                        <div class="swiper-scrollbar slider-scrollbar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                        <div class="product-card-label">-25%</div>
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-2.png" alt="">
                                    </a>
                                    <button class="product-card__like-button"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">rare paris</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Заспокійлива маска для обличчя
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price" data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                        <div class="product-card__price-old">6 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-card" data-product-card>
                                <div class="product-card__head">
                                    <div class="product-card__labels">
                                    </div>
                                    <a href="#" class="product-card__img">
                                        <img src="img/photo/product-card-img-1.png" alt="">
                                    </a>
                                    <button class="product-card__like-button active"></button>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__title"><a href="#">zein obagi</a></div>
                                    <div class="product-card__text">
                                        <div class="product-card__text-1">
                                            Скраб відлущувальний
                                        </div>
                                        <div class="product-card__text-2">
                                            Zo Skin Health Exfoliating Polish
                                        </div>
                                    </div>
                                    <div class="product-card__price" data-index="0">
                                        <div class="product-card__price-current">2 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price show" data-index="1">
                                        <div class="product-card__price-current">3 299 ₴</div>
                                        <div class="product-card__price-old">5 299 ₴</div>
                                    </div>
                                    <div class="product-card__price" data-index="2">
                                        <div class="product-card__price-current">4 299 ₴</div>
                                        <div class="product-card__price-old">6 299 ₴</div>
                                    </div>
                                </div>
                                <div class="product-card__footer">
                                    <form>
                                        <div class="product-card__option">
                                            <label class="product-card__option-item" disabled>
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                                                <div class="product-card__option-item-value">
                                                    100 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option checked
                                                       data-index="1">
                                                <div class="product-card__option-item-value">
                                                    290 г
                                                </div>
                                            </label>
                                            <label class="product-card__option-item">
                                                <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                                                <div class="product-card__option-item-value">
                                                    490 г
                                                </div>
                                            </label>
                                        </div>
                                        <button class="product-card__btn-to-basket button-primary dark w-100">
                                            додати до кошика
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel__navigation">
                        <div class="slider-navigations">
                            <div class="swiper-scrollbar slider-scrollbar"></div>
                            <div class="slider-buttons">
                                <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                                <div class="slider-pagination"></div>
                                <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel__footer">
                    <a href="#" class="button-primary light w-100">БІЛЬШЕ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top-space-140 top-space-md-100">
    <div class="carousel">
        <div class="container">
            <div class="carousel__head">
                <div class="carousel__category-info">
                    <div class="category-links">
                        <h2 class="category-links__title title-2"><a href="#">Добірки</a></h2>
                    </div>
                </div>
            </div>
            <div class="swiper" data-slider="carousel">
                <div class="swiper-wrapper">

                    <div class="swiper-slide hide-in-mobile">
                        <div class="carousel__category-info">
                            <div class="category-links">
                                <h2 class="category-links__title title-2"><a href="#">Добірки</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="article-carp-prview">
                            <div class="article-carp-prview__img ibg">
                                <a href="#">
                                    <img src="img/photo/article-preview-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-carp-prview__text">
                                <div class="article-carp-prview__title">
                                    <a href="#">Мікробіом шкіри: що про нього треба знати</a>
                                </div>
                                <div class="article-carp-prview__btn">
                                    <a href="#" class="button-link"><span>детальніше</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="article-carp-prview">
                            <div class="article-carp-prview__img ibg">
                                <a href="#">
                                    <img src="img/photo/article-preview-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-carp-prview__text">
                                <div class="article-carp-prview__title">
                                    <a href="#">Кислоти в складі косметичних засобів як джерело вічної молодості</a>
                                </div>
                                <div class="article-carp-prview__btn">
                                    <a href="#" class="button-link"><span>детальніше</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="article-carp-prview">
                            <div class="article-carp-prview__img ibg">
                                <a href="#">
                                    <img src="img/photo/article-preview-3.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-carp-prview__text">
                                <div class="article-carp-prview__title">
                                    <a href="#">5 нових засобів, які ви могли пропустити</a>
                                </div>
                                <div class="article-carp-prview__btn">
                                    <a href="#" class="button-link"><span>детальніше</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="article-carp-prview">
                            <div class="article-carp-prview__img ibg">
                                <a href="#">
                                    <img src="img/photo/article-preview-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-carp-prview__text">
                                <div class="article-carp-prview__title">
                                    <a href="#">Мікробіом шкіри: що про нього треба знати</a>
                                </div>
                                <div class="article-carp-prview__btn">
                                    <a href="#" class="button-link"><span>детальніше</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="article-carp-prview">
                            <div class="article-carp-prview__img ibg">
                                <a href="#">
                                    <img src="img/photo/article-preview-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-carp-prview__text">
                                <div class="article-carp-prview__title">
                                    <a href="#">Кислоти в складі косметичних засобів як джерело вічної молодості</a>
                                </div>
                                <div class="article-carp-prview__btn">
                                    <a href="#" class="button-link"><span>детальніше</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="article-carp-prview">
                            <div class="article-carp-prview__img ibg">
                                <a href="#">
                                    <img src="img/photo/article-preview-3.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-carp-prview__text">
                                <div class="article-carp-prview__title">
                                    <a href="#">5 нових засобів, які ви могли пропустити</a>
                                </div>
                                <div class="article-carp-prview__btn">
                                    <a href="#" class="button-link"><span>детальніше</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel__navigation">
                    <div class="slider-navigations">
                        <div class="swiper-scrollbar slider-scrollbar"></div>
                        <div class="slider-buttons">
                            <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                            <div class="slider-pagination"></div>
                            <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top-space-140 top-space-md-150">
    <section class="ticker-logos swiper" data-slider="ticker-logos">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-1.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-2.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-3.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-4.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-5.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-1.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-2.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-3.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-4.png" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#" class="ticker-logo">
                    <img src="img/photo/ticker-logo-5.png" alt="">
                </a>
            </div>
        </div>
    </section>
</div>

<div class="top-space-140 top-space-md-150">
    <div class="special-offers carousel">
        <div class="container">
            <div class="carousel__head">
                <div class="carousel__category-info">
                    <div class="category-links">
                        <h2 class="title-2"><a href="#">спеціальні пропозиції</a></h2>
                    </div>
                </div>
            </div>
            <div class="swiper" data-slider="carousel">
                <div class="swiper-wrapper">
                    <div class="swiper-slide hide-in-mobile">
                        <div class="special-offers__banner ibg">
                            <img src="img/photo/special-offer-img-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <h2 class="special-offers__title title-2"><a href="#">спеціальні пропозиції</a></h2>
                        <div class="special-offer-card">
                            <div class="special-offer-card__row-1">
                                <div class="special-offer-card__text">
                                    Повнорозмірний продукт для рук у подарунок
                                    при купівлі PRODUCT BRAND від 5 000 ₴.
                                </div>
                                <a href="#" class="button-link"><span>детальніше</span></a>
                            </div>
                            <div class="special-offer-card__row-2">
                                <div class="special-offer-card__img ibg">
                                    <img src="img/photo/special-offer-img-2.jpg" alt="">
                                </div>
                                <div class="special-offer-card__text">
                                    Повнорозмірний продукт для рук у подарунок
                                    при купівлі PRODUCT BRAND від 5 000 ₴.
                                </div>
                                <a href="#" class="button-link"><span>детальніше</span></a>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="special-offer-card">
                            <div class="special-offer-card__row-1"></div>
                            <div class="special-offer-card__row-2">
                                <div class="special-offer-card__img ibg">
                                    <img src="img/photo/special-offer-img-3.jpg" alt="">
                                </div>
                                <div class="special-offer-card__text">
                                    Безкоштовна доставка замовлень Новою
                                    Поштою по Україні на суму від 2 000 ₴.
                                </div>
                                <a href="#" class="button-link"><span>детальніше</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide hide-in-mobile">
                        <div class="special-offers__banner ibg">
                            <img src="img/photo/special-offer-img-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <h2 class="special-offers__title title-2"><a href="#">спеціальні пропозиції</a></h2>
                        <div class="special-offer-card">
                            <div class="special-offer-card__row-1">
                                <div class="special-offer-card__text">
                                    Повнорозмірний продукт для рук у подарунок
                                    при купівлі PRODUCT BRAND від 5 000 ₴.
                                </div>
                                <a href="#" class="button-link"><span>детальніше</span></a>
                            </div>
                            <div class="special-offer-card__row-2">
                                <div class="special-offer-card__img ibg">
                                    <img src="img/photo/special-offer-img-2.jpg" alt="">
                                </div>
                                <div class="special-offer-card__text">
                                    Повнорозмірний продукт для рук у подарунок
                                    при купівлі PRODUCT BRAND від 5 000 ₴.
                                </div>
                                <a href="#" class="button-link"><span>детальніше</span></a>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="special-offer-card">
                            <div class="special-offer-card__row-1"></div>
                            <div class="special-offer-card__row-2">
                                <div class="special-offer-card__img ibg">
                                    <img src="img/photo/special-offer-img-3.jpg" alt="">
                                </div>
                                <div class="special-offer-card__text">
                                    Безкоштовна доставка замовлень Новою
                                    Поштою по Україні на суму від 2 000 ₴.
                                </div>
                                <a href="#" class="button-link"><span>детальніше</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel__navigation">
                    <div class="slider-navigations">
                        <div class="swiper-scrollbar slider-scrollbar"></div>
                        <div class="slider-buttons">
                            <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                            <div class="slider-pagination"></div>
                            <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top-space-140 top-space-md-150">
    <div class="image-full-width">
        <img src="img/photo/phrase.png" alt="">
    </div>
</div>

<div class="top-space-140 top-space-md-150">
    <div class="instagram">
        <div class="container">
            <div class="instagram__head">
                <div class="instagram__category-info">
                    <div class="category-links">
                        <h2 class="category-links__title title-2"><a href="#">instagram</a></h2>
                        <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#">#yos.skincare</a>
                                </div>
                            </div>
                            <div class="swiper-scrollbar slider-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper" data-slider="instagram">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="instagram-card">
                            <div class="instagram-card__img ibg">
                                <img src="img/photo/instagram-1.png" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="instagram-card">
                            <div class="instagram-card__img ibg">
                                <img src="img/photo/instagram-2.png" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide hide-in-mobile">
                        <div class="category-links">
                            <h2 class="category-links__title title-2"><a href="#">instagram</a></h2>
                            <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="#">#yos.skincare</a>
                                    </div>
                                </div>
                                <div class="swiper-scrollbar slider-scrollbar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="instagram-card">
                            <div class="instagram-card__img ibg">
                                <img src="img/photo/instagram-3.png" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="instagram-card">
                            <div class="instagram-card__img ibg">
                                <img src="img/photo/instagram-4.png" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="instagram-card">
                            <div class="instagram-card__img ibg">
                                <img src="img/photo/instagram-5.png" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
