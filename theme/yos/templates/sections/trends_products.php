<?php

$mtxnm = get_sub_field('title');
$mtxnm_name = get_term( $mtxnm );

$categories_product = get_sub_field('categories_product');
$products_trend = get_sub_field('products_trend');
$link = get_sub_field('button');

$t = 1;
?>

<div class="top-space-60 top-space-md-170">
    <div class="carousel">
        <div class="container">
            <div class="carousel__head">
                <div class="carousel__category-info">
                    <div class="category-links">
                        <?php if( $mtxnm ):?>
                            <h2 class="category-links__title title-2"><a href="<?= get_term_link($mtxnm);?>"><?= $mtxnm_name->name;?></a></h2>
                        <?php endif; ?>
                        <?php if( $categories_product ):?>
                            <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                                <div class="swiper-wrapper">
                                    <?php foreach ($categories_product as $item):
                                        $item_name = get_term( $item );?>
                                        <div class="swiper-slide">
                                            <a href="<?= get_term_link($item);?>"><?= $item_name->name;?></a>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                                <div class="swiper-scrollbar slider-scrollbar"></div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="carousel__slider" data-slider="carousel">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php if( $products_trend ):
                            foreach( $products_trend as $post): setup_postdata($post);
                                if($t==2):?>
                                    <div class="swiper-slide hide-in-mobile">
                                        <div class="carousel__category-info">
                                            <div class="category-links">
                                                <?php if( $mtxnm ):?>
                                                    <h2 class="category-links__title title-2"><a href="<?= get_term_link($mtxnm);?>"><?= $mtxnm_name->name;?></a></h2>
                                                <?php endif; ?>
                                                <?php if( $categories_product ):?>
                                                    <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
                                                        <div class="swiper-wrapper">
                                                            <?php foreach ($categories_product as $item):
                                                                $item_name = get_term( $item );?>
                                                                <div class="swiper-slide">
                                                                    <a href="<?= get_term_link($item);?>"><?= $item_name->name;?></a>
                                                                </div>
                                                            <?php endforeach;?>
                                                        </div>
                                                        <div class="swiper-scrollbar slider-scrollbar"></div>
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;?>

                                <div class="swiper-slide">
                                    <?php wc_get_template_part( 'content', 'product' );?>
                                </div>

                            <?php $t++; endforeach; wp_reset_postdata(); ?>
                        <?php endif; ?>

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
            <?php if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="carousel__footer">
                    <a class="button-primary light w-100" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
