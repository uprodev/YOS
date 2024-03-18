<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
wp_reset_query();
$related_products_default = wc_get_related_products(get_the_id());
$product = new WC_Product(get_the_id());
$related_products = $product->get_upsell_ids(   );
$related_products = (!empty($related_products)) ? $related_products : $related_products_default;

if ( $related_products ) :

    $i=1;?>

    <div class="top-space-60 top-space-md-150">
        <div class="carousel">
            <div class="container">
                <div class="carousel__head">
                    <div class="carousel__category-info">
                        <div class="category-links">
                            <h2 class="category-links__title title-2"><?= __('часто купують разом', 'yos');?></h2>
                        </div>
                    </div>
                </div>
                <div class="carousel__slider" data-slider="carousel">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ( $related_products as $related_product_item ) : ?>

                                <?php
                                if (get_post($related_product_item)->post_parent > 0)
                                    $related_product = new WC_Product_Variation($related_product_item);
                                else
                                    $related_product = new WC_Product($related_product_item);

                                $post_object = get_post( $related_product->get_id() );
                                setup_postdata( $GLOBALS['post'] =& $post_object );?>

                                <?php if($i==2):?>

                                    <div class="swiper-slide hide-in-mobile">
                                        <div class="carousel__category-info">
                                            <div class="category-links">
                                                <h2 class="category-links__title title-2"><?= __('часто купують разом', 'yos');?></h2>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif;?>

                                <div class="swiper-slide">

                                    <?php wc_get_template_part( 'content', 'product' );?>

                                </div>

                            <?php $i++; endforeach; ?>

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
                <div class="carousel__footer">
                    <a href="<?= get_permalink(wc_get_page_id( 'shop' ));?>" class="button-primary light w-100"><?= __('БІЛЬШЕ', 'yos');?></a>
                </div>
            </div>
        </div>
    </div>

	<?php
endif;

wp_reset_postdata();
