<?php

$slider = get_sub_field('slider');
$title = get_sub_field('title');

?>

<section class="home-intro">
    <?php if(!empty($slider)):?>
        <div class="home-intro__slider swiper" data-slider="home-intro">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($slider as $slide):?>
                        <div class="swiper-slide">
                            <div class="home-intro__img ibg">
                                <picture>
                                    <source srcset="<?= $slide['image'];?>" media="(min-width: 768px)">
                                    <img src="<?= $slide['image_mob'];?>" alt="img">
                                </picture>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="slider-buttons container">
                    <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                    <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
                </div>
            </div>
            <div class="swiper-scrollbar slider-scrollbar"></div>
        </div>
    <?php endif;?>
    <?php if($title):?>
        <div class="home-intro__bottom container">
            <h2 class="title-2"><?= $title;?></h2>
        </div>
    <?php endif;?>
</section>
