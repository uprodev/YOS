<?php

$tabs = get_sub_field('tabs');
$categories_product = get_sub_field('categories_product');

?>

<div class="top-space-140 top-space-md-150">
    <div class="carousel" data-carousel-tabs>
        <div class="container">
            <div class="carousel__head">
                <div class="carousel__category-info">
                    <div class="category-links">
                        <?php if($tabs):
                            $i=0;?>
                            <h2 class="category-links__title title-2">
                                <?php foreach($tabs as $tab):?>
                                    <div class="carousel__tab-trigger <?= $i==0?'active':'';?>" data-action="show-carousel-tab" data-index="<?= $i;?>"><?= $tab['name'];?></div>
                                <?php $i++; endforeach;?>
                            </h2>
                        <?php endif;?>
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
            <?php if($tabs):
                $t=0;
                foreach($tabs as $tab):
                    $prods = $tab['products'];?>
                    <div class="carousel__tab-content <?= $t==0?'show':'';?>" data-carousel-tab-content data-index="<?= $t;?>">
                        <?php if( $prods ):
                            $pr=1; ?>
                            <div class="swiper" data-slider="carousel">
                                <div class="swiper-wrapper">

                                    <?php foreach( $prods as $post):setup_postdata($post); ?>
                                        <?php if($pr==3):?>
                                            <div class="swiper-slide category-info">
                                                <div class="carousel__category-info">
                                                    <div class="category-links">
                                                        <h2 class="category-links__title title-2">
                                                            <?php $v=0;
                                                            foreach($tabs as $tab):?>
                                                                <div class="carousel__tab-trigger <?= $v==0?'active':'';?>" data-action="show-carousel-tab" data-index="<?= $v;?>"><?= $tab['name'];?></div>
                                                                <?php $v++; endforeach;?>
                                                        </h2>
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
                                        <?php else:?>
                                            <div class="swiper-slide">
                                                <?php wc_get_template_part( 'content', 'product' );?>
                                            </div>
                                        <?php endif;?>
                                    <?php $pr++; endforeach; wp_reset_postdata(); $pr=1;?>
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
                        <?php endif; ?>

                        <?php $link = $tab['link'];

                        if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <div class="carousel__footer">
                                <a class="button-primary light w-100" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php $t++; endforeach;
            endif;?>
        </div>
    </div>
</div>
