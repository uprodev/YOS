<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<section class="basket">
    <div class="container">
        <div class="basket__head">
            <a href="<?= wc_get_page_permalink( 'shop' ) ?>" class="basket__link-to-shopping button-link">
                <span class="icon-chevrone-left"><?= __('продовжити покупки', 'yos');?></span>
            </a>

            <h2 class="basket__title title-2">
                <?php the_title();?>
                <span class="basket-qty">(<?= WC()->cart->get_cart_contents_count();?>)</span>
            </h2>
        </div>
            <?php do_action( 'woocommerce_before_cart_table' ); ?>
            <div class="basket__body">
                <div class="basket__main">
                    <ul class="basket__list">
                        <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                        /**
                         * Filter the product name.
                         *
                         * @since 2.1.0
                         * @param string $product_name Name of the product in the cart.
                         * @param array $cart_item The product in the cart.
                         * @param string $cart_item_key Key for the product in the cart.
                         */
                        $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                            $brand = get_the_terms($product_id, 'pa_brand');?>
                            <li data-ids="<?= $product_id;?>">
                                <div class="product-card-sm">
                                    <div class="product-card-sm__left">
                                        <button class="product-card-sm__btn-remove" data-cart_item_key="<?= esc_attr( $cart_item_key );?>"><span class="icon-close"></span></button>

                                        <a href="<?php echo esc_url( $product_permalink ); ?>" class="product-card-sm__img">
                                            <?php echo $thumbnail;?>
                                        </a>
                                    </div>
                                    <div class="product-card-sm__right">
                                        <div class="product-card-sm__title"><a href="<?= get_term_link($brand[0]->term_id);?>"><?= $brand[0]->name;?></a></div>
                                        <div class="product-card-sm__text">
                                            <div class="product-card-sm__text-1">
                                                <?php echo wp_kses_post( $product_name ); ?>
                                            </div>
                                            <div class="product-card-sm__text-2">
                                                <?php the_field('seria', $product_id);?>
                                            </div>
                                        </div>
                                        <div class="product-card-sm__group">
                                            <div class="product-card-sm__quantity">
                                                <div class="product-card-sm__quantity-label"><?= __('Кількість:', 'yos');?></div>
                                                <div class="quantity" data-key="<?= esc_attr( $cart_item_key );?>" data-quantity>
                                                    <button class="quantity__btn minus"><span class="icon-square-minus"></span></button>
                                                    <input type="text" value="<?=  $cart_item['quantity'];?>" class="quantity__value">
                                                    <button class="quantity__btn plus"><span class="icon-square-plus"></span></button>
                                                </div>
                                            </div>
                                            <div class="product-card-sm__price">
                                                <?= $_product->get_price_html();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
                <div class="basket__side cart-collaterals cart-totals   woocommerce-cart-form">
                    <?php woocommerce_cart_totals() ?>
                </div>
            </div>

    </div>
</section>

