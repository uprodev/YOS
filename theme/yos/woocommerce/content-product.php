<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="product-card" data-product-card>
    <div class="product-card__head">
        <div class="product-card__labels">
        </div>
        <a href="<?php the_permalink();?>" class="product-card__img">
            <img src="<?php the_post_thumbnail_url();?>" alt="">
        </a>
        <button class="product-card__like-button active"></button>
    </div>
    <div class="product-card__body">
        <div class="product-card__title"><a href="<?php the_permalink();?>">zein obagi</a></div>
        <div class="product-card__text">
            <div class="product-card__text-1">
                <?php the_title();?>
            </div>
            <div class="product-card__text-2">
                Zo Skin Health Exfoliating Polish
            </div>
        </div>
        <div class="product-card__price" data-index="0">
            <div class="product-card__price-current">2 299 ₴</div>
        </div>
        <div class="product-card__price show" data-index="1">
            <div class="product-card__price-current">3 299 ₴</div>
        </div>
        <div class="product-card__price" data-index="2">
            <div class="product-card__price-current">4 299 ₴</div>
        </div>
    </div>
    <div class="product-card__footer">
        <form>
            <div class="product-card__option">
                <label class="product-card__option-item" disabled>
                    <input type="radio" name="card-id-1" data-product-card-option data-index="0">
                    <div class="product-card__option-item-value">
                        100 г
                    </div>
                </label>
                <label class="product-card__option-item">
                    <input type="radio" name="card-id-1" data-product-card-option checked
                           data-index="1">
                    <div class="product-card__option-item-value">
                        290 г
                    </div>
                </label>
                <label class="product-card__option-item">
                    <input type="radio" name="card-id-1" data-product-card-option data-index="2">
                    <div class="product-card__option-item-value">
                        490 г
                    </div>
                </label>
            </div>
            <button class="product-card__btn-to-basket button-primary dark w-100">
                додати до кошика
            </button>
        </form>
    </div>
</div>
