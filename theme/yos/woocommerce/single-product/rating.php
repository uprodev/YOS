<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

    <div class="product-actions__stars">
        <a href="#reviews">
            <div class="rating" data-rating="<?= $average;?>">
                <div class="rating__stars rating__stars-1">
                    <div class="rating__star">
                        <span class="icon-star-full"></span>
                    </div>
                    <div class="rating__star">
                        <span class="icon-star-full"></span>
                    </div>
                    <div class="rating__star">
                        <span class="icon-star-full"></span>
                    </div>
                    <div class="rating__star">
                        <span class="icon-star-full"></span>
                    </div>
                    <div class="rating__star">
                        <span class="icon-star-full"></span>
                    </div>
                </div>
                <div class="rating__stars rating__stars-2">
                    <div class="rating__star">
                        <span class="icon-star"></span>
                    </div>
                    <div class="rating__star">
                        <span class="icon-star"></span>
                    </div>
                    <div class="rating__star">
                        <span class="icon-star"></span>
                    </div>
                    <div class="rating__star">
                        <span class="icon-star"></span>
                    </div>
                    <div class="rating__star">
                        <span class="icon-star"></span>
                    </div>
                </div>
            </div>
        </a>
    </div>

<?php endif; ?>