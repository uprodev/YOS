<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$post_thumbnail_id = $product->get_image_id();

?>

<div class="product-images__thumbs swiper" data-slider="product-images-thumbs">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="product-images__thumbs-img">
                <img src="<?= wp_get_attachment_image_src( $post_thumbnail_id, 'thumb' )[0] ?>" alt="">
            </div>
        </div>
        <?php if ( $attachment_ids && $product->get_image_id() ) {
            foreach ( $attachment_ids as $attachment_id ) {?>
                <div class="swiper-slide">
                    <div class="product-images__thumbs-img">
                        <img src="<?=wp_get_attachment_image_src( $attachment_id, 'large' )[0];?>" alt=""/>
                    </div>
                </div>
            <?php }
        }?>
    </div>
    <button class="product-images__btn top"><span class="icon-chevron-up"></span></button>
    <button class="product-images__btn bottom"><span class="icon-chevron-down"></span></button>
</div>
