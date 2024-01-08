<?php

$trends = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => -1,
]);

?>

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
                    <?php while($trends->have_posts()): $trends->the_post();?>
                        <div class="swiper-slide">
                            <?php wc_get_template_part( 'content', 'product' );?>
                        </div>
                    <?php endwhile; wp_reset_postdata();?>
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
