<?php

$trends = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => -1,
]);
$t = 1;
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

                        <?php if($t==2):?>

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

                        <?php endif;?>

                        <div class="swiper-slide">
                            <?php wc_get_template_part( 'content', 'product' );?>
                        </div>
                    <?php $t++; endwhile; wp_reset_postdata();?>
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
