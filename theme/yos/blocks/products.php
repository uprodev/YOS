<?php
/**
 * Products
 *

 **/

$title = get_field( 'title' );
$prod = get_field( 'product_article' );

?>

<div class="article__products" id="products-2">
    <?php if($title):?>
        <div class="article__products-text text-content last-no-margin text-end">
            <p>
                <strong><?= $title;?></strong>
            </p>
        </div>
    <?php endif;?>
    <?php if($prod):?>
        <ul class="article__products-list">
            <?php foreach( $prod as $pid):
                $brand = get_the_terms($pid, 'pa_brand');
                $product = wc_get_product( $pid );
                $price = $product->get_price_html();
            ?>

                <li>
                    <div class="product-card-sm">
                        <div class="product-card-sm__left">

                            <a href="<?php get_the_permalink($pid); ?>" class="product-card-sm__img">
                                <img src="<?= get_the_post_thumbnail_url($pid);?>" alt="<?= strip_tags(get_the_title($pid)); ?>">
                            </a>
                        </div>
                        <div class="product-card-sm__right">
                            <div class="product-card-sm__title"><a href="<?= get_term_link($brand[0]->term_id);?>"><?= $brand[0]->name;?></a></div>
                            <div class="product-card-sm__text">
                                <div class="product-card-sm__text-1">
                                    <?= get_the_title($pid); ?>
                                </div>
                                <div class="product-card-sm__text-2">
                                    <?php the_field('seria', $pid);?>
                                </div>
                            </div>
                            <div class="product-card-sm__group">
                                <div class="product-card-sm__price">
                                    <?php if ($product->is_type( 'variable' )):
                                        $min_price = $product->get_variation_regular_price('min', true). ' '. get_woocommerce_currency_symbol();
                                        if($product->is_on_sale()):
                                            $min_sale = $product->get_variation_sale_price('min', true). ' '. get_woocommerce_currency_symbol();?>
                                            <div class="product-card-sm__price-current"><?= $min_sale;?></div>
                                            <div class="product-card-sm__price-old"><?= $min_price;?></div>
                                        <?php else:?>
                                            <div class="product-card-sm__price-current"><?= $min_price;?></div>
                                        <?php endif;?>
                                    <?php elseif($product->is_type( 'simple' )):
                                        if($product->is_on_sale()):?>
                                            <div class="product-card-sm__price-current"><?= $product->get_sale_price(). ' '. get_woocommerce_currency_symbol();?></div>
                                            <div class="product-card-sm__price-old"><?= $product->get_regular_price(). ' '. get_woocommerce_currency_symbol();?></div>
                                        <?php else:?>
                                            <div class="product-card-sm__price-current"><?= $price;?></div>
                                        <?php endif;?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            <?php endforeach;
            wp_reset_postdata(); ?>

        </ul>
    <?php endif;?>
</div>
