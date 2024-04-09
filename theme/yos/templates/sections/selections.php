<?php

$title = get_sub_field('title');
$selection = get_sub_field('selection');

?>

<div class="top-space-80 top-space-md-150">
    <div class="carousel articles-preview-carousel">
        <div class="container">
            <div class="carousel__head">
                <?php if($title):?>
                    <div class="carousel__category-info">
                        <div class="category-links">
                            <h2 class="asd category-links__title title-2"><a href="<?php the_permalink(256) ?>"><?= $title;?></a></h2>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="carousel__slider" data-slider="carousel">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php if($title):?>
                            <div class="swiper-slide hide-in-mobile">
                                <div class="carousel__category-info">
                                    <div class="category-links">
                                        <h2 class="category-links__title title-2"><a href="<?php the_permalink(256) ?>"><?= $title;?></a></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                        <?php if($selection):
                            foreach( $selection as $post): setup_postdata($post); ?>

                                <div class="swiper-slide">
                                    <?php get_template_part('parts/article');?>
                                </div>

                            <?php endforeach; wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
                <div class="carousel__navigation">
                    <div class="slider-buttons">
                        <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                        <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
                    </div>
                    <div class="slider-navigations">
                        <div class="swiper-scrollbar slider-scrollbar"></div>
                        <div class="slider-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
