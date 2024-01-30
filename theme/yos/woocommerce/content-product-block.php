<?php
global $product;

$brand = get_the_terms(get_the_ID(), 'pa_brand');
?>
<li>
    <div class="product-card-sm">
        <div class="product-card-sm__left">

            <a href="<?php the_permalink(); ?>" class="product-card-sm__img">
                <img src="<?php the_post_thumbnail_url();?>" alt="<?= strip_tags(get_the_title()); ?>">
            </a>
        </div>
        <div class="product-card-sm__right">
            <div class="product-card-sm__title"><a href="<?= get_term_link($brand[0]->term_id);?>"><?= $brand[0]->name;?></a></div>
            <div class="product-card-sm__text">
                <div class="product-card-sm__text-1">
                    <?php the_title(); ?>
                </div>
                <div class="product-card-sm__text-2">
                    <?php the_field('seria');?>
                </div>
            </div>
            <div class="product-card-sm__group">
                <div class="product-card-sm__price">
                    <?php woocommerce_template_loop_price();?>
                </div>
            </div>
        </div>
    </div>
</li>
