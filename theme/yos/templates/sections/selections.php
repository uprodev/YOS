<?php

$title = get_sub_field('title');
$selection = get_sub_field('selection');

?>

<div class="top-space-140 top-space-md-150">
    <div class="special-offers carousel">
        <div class="container">
            <div class="carousel__head">
                <?php if($title):?>
                    <div class="carousel__category-info">
                        <div class="category-links">
                            <h2 class="category-links__title title-2"><?= $title;?></h2>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="swiper" data-slider="carousel">
                <div class="swiper-wrapper">
                    <div class="swiper-slide big-card">
                        <div class="special-offer-card" data-special-offer-card>
                            <div class="special-offer-card__img ibg">
                                <img src="img/photo/special-offer-img-1.jpg" alt="">
                            </div>
                            <div class="special-offer-card__text-content">
                                <h2 class="special-offers__title title-2"><a href="#">спеціальні пропозиції</a></h2>
                                <div class="special-offer-card__text" data-truncate-string="120">
                                    Безкоштовна доставка
                                    замовлень Новою Поштою по Україні на суму від 2 000 ₴.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa sint fugiat corrupti natus delectus excepturi doloribus non minima, ad quam.
                                </div>
                                <a href="#" class="button-link" data-action="show-full-text-by-index" data-index="0">
                                    <span>детальніше</span>
                                </a>
                                <div class="special-offer-card__full-text" data-index="0">
                                    <div class="special-offer-card__text text-content last-no-margin">
                                        <p>
                                            Повнорозмірний продукт для рук у подарунок
                                            при купівлі PRODUCT BRAND від 5 000 ₴.
                                        </p>
                                        <p>
                                            При наявності акційного товару. Ціни на сайті
                                            вказані з урахуванням знижки. В акції беруть
                                            участь товари, що доставляються зі складу в
                                            Україні.
                                        </p>
                                        <ul>
                                            <li>
                                                * кількість подарунків обмежена
                                            </li>
                                            <li>
                                                * до закінчення акції залишилось 2 дні
                                            </li>
                                        </ul>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                    </div>

                                    <a href="#" class="button-link"
                                       data-action="hide-full-text-by-index"><span>закрити</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="special-offer-card" data-special-offer-card>
                            <div class="special-offer-card__img ibg">
                                <img src="img/photo/special-offer-img-2.jpg" alt="">
                            </div>
                            <div class="special-offer-card__text-content">
                                <div class="special-offer-card__text" data-truncate-string="120">
                                    Повнорозмірний продукт для рук у подарунок
                                    при купівлі PRODUCT BRAND від 5 000 ₴.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic provident temporibus voluptas, molestiae quae nemo in quaerat! Magnam, beatae quidem.
                                </div>
                                <a href="#" class="button-link" data-action="show-full-text-by-index" data-index="0">
                                    <span>детальніше</span>
                                </a>
                                <div class="special-offer-card__full-text" data-index="0">
                                    <div class="special-offer-card__text text-content last-no-margin">
                                        <p>
                                            Повнорозмірний продукт для рук у подарунок
                                            при купівлі PRODUCT BRAND від 5 000 ₴.
                                        </p>
                                        <p>
                                            При наявності акційного товару. Ціни на сайті
                                            вказані з урахуванням знижки. В акції беруть
                                            участь товари, що доставляються зі складу в
                                            Україні.
                                        </p>
                                        <ul>
                                            <li>
                                                * кількість подарунків обмежена
                                            </li>
                                            <li>
                                                * до закінчення акції залишилось 2 дні
                                            </li>
                                        </ul>
                                    </div>

                                    <a href="#" class="button-link"
                                       data-action="hide-full-text-by-index"><span>закрити</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="special-offer-card" data-special-offer-card>
                            <div class="special-offer-card__img ibg">
                                <img src="img/photo/special-offer-img-3.jpg" alt="">
                            </div>
                            <div class="special-offer-card__text-content">
                                <div class="special-offer-card__text" data-truncate-string="120">
                                    Безкоштовна доставка замовлень Новою
                                    Поштою по Україні на суму від 2 000 ₴.
                                </div>
                                <a href="#" class="button-link" data-action="show-full-text-by-index" data-index="0">
                                    <span>детальніше</span>
                                </a>
                                <div class="special-offer-card__full-text" data-index="0">
                                    <div class="special-offer-card__text text-content last-no-margin">
                                        <p>
                                            Повнорозмірний продукт для рук у подарунок
                                            при купівлі PRODUCT BRAND від 5 000 ₴.
                                        </p>
                                        <p>
                                            При наявності акційного товару. Ціни на сайті
                                            вказані з урахуванням знижки. В акції беруть
                                            участь товари, що доставляються зі складу в
                                            Україні.
                                        </p>
                                        <ul>
                                            <li>
                                                * кількість подарунків обмежена
                                            </li>
                                            <li>
                                                * до закінчення акції залишилось 2 дні
                                            </li>
                                        </ul>
                                    </div>

                                    <a href="#" class="button-link"
                                       data-action="hide-full-text-by-index"><span>закрити</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide big-card">
                        <div class="special-offer-card" data-special-offer-card>
                            <div class="special-offer-card__img ibg">
                                <img src="img/photo/special-offer-img-1.jpg" alt="">
                            </div>
                            <div class="special-offer-card__text-content">
                                <div class="special-offer-card__text" data-truncate-string="120">
                                    Безкоштовна доставка
                                    замовлень Новою Поштою по Україні на суму від 2 000 ₴.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa sint fugiat corrupti natus delectus excepturi doloribus non minima, ad quam.
                                </div>
                                <a href="#" class="button-link" data-action="show-full-text-by-index" data-index="0">
                                    <span>детальніше</span>
                                </a>
                                <div class="special-offer-card__full-text" data-index="0">
                                    <div class="special-offer-card__text text-content last-no-margin">
                                        <p>
                                            Повнорозмірний продукт для рук у подарунок
                                            при купівлі PRODUCT BRAND від 5 000 ₴.
                                        </p>
                                        <p>
                                            При наявності акційного товару. Ціни на сайті
                                            вказані з урахуванням знижки. В акції беруть
                                            участь товари, що доставляються зі складу в
                                            Україні.
                                        </p>
                                        <ul>
                                            <li>
                                                * кількість подарунків обмежена
                                            </li>
                                            <li>
                                                * до закінчення акції залишилось 2 дні
                                            </li>
                                        </ul>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum accusantium eum
                                            animi reprehenderit atque magni itaque incidunt! Laborum, quod eius?
                                        </p>
                                    </div>

                                    <a href="#" class="button-link"
                                       data-action="hide-full-text-by-index"><span>закрити</span></a>
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