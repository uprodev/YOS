<?php

$title = get_sub_field('title');
$categories = get_sub_field('categories');
$link = get_sub_field('link');

?>

<div class="top-space-80 top-space-md-150">
    <div class="banner" data-banner >
        <div class="container">
            <div class="banner__body">
                <div class="banner__text-content">
                    <div class="category-links">
                        <h2 class="title-2"><?= $title;?></h2>
                        <?php if($categories):
                            $c=0;?>
                            <div class="category-links__list swiper" data-slider="category-links-list-banner" data-mobile="false">
                                <div class="swiper-wrapper">
                                    <?php foreach($categories as $cat):
                                        $name = get_term( $cat );
                                        $cs = get_field('coming_soon_label', 'product_cat_'.$cat);
                                    ?>

                                        <div class="swiper-slide" data-action="change-banner-image-by-index" data-index="<?= $c;?>">
                                            <a href="<?= get_term_link($cat);?>"><?= $name->name;?> <?= $cs?'<img src="'.get_template_directory_uri().'/img/icons/coming-soon.svg" class="coming-soon">':'';?></a>
                                        </div>

                                    <?php $c++; endforeach;?>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php if($categories):
                    $g=0;?>
                    <div class="banner__images">
                        <div class="swiper" data-slider="banner-images">
                            <div class="swiper-wrapper">
                                <?php foreach($categories as $cat):
                                    $img = get_field('image', 'product_cat_'.$cat);
                                    $img_mob = get_field('image_mob', 'product_cat_'.$cat);
                                ?>
                                    <div class="swiper-slide ibg" data-index="<?= $g;?>">
                                        <picture>
                                            <source srcset="<?= $img;?>" media="(min-width: 768px)" >
                                            <img src="<?= $img_mob;?>" alt="img">
                                        </picture>
                                        <div class="banner__footer">
                                            <a href="<?= get_term_link($cat);?>" class="button-primary light w-100"><?= __('ПЕРЕЙТИ', 'yos');?></a>
                                        </div>
                                    </div>
                                <?php $g++; endforeach;?>
                            </div>
                            <div class="swiper-scrollbar slider-scrollbar"></div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
