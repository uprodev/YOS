<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */


if ( wc_get_page_id( 'shop' ) > 0 ) : ?>

    <section class="basket woocommerce-cart-form">
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

            <div class=" basket__body shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                <div class="basket__main">
                    <p class="return-to-shop">

                        <?php do_action( 'woocommerce_cart_is_empty' ); ?>
                        <a class="button-primary dark" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                            <?php
                            /**
                             * Filter "Return To Shop" text.
                             *
                             * @since 4.6.0
                             * @param string $default_text Default text.
                             */
                            echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
                            ?>
                        </a>
                    </p>
                </div>

            </div>

        </div>
    </section>


<?php endif; ?>
