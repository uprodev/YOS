<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
<section class="checkout">

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

    <div class="container">
        <div class="checkout__inner">
            <div class="checkout__form checkout-form">
                <div class="checkout-form__head">
                    <div class="checkout-form__head-left">
                        <h2 class="checkout-form__head-title"><?php the_title();?></h2>
                        <a href="#" class="button-link"><span><?= __('є акаунт?', 'yos');?></span></a>
                    </div>
                    <div class="checkout-form__head-right">
                        <a href="<?= wc_get_page_permalink( 'shop' ) ?>" class="button-link">
                            <span><?= __('продовжити покупки', 'yos');?></span></a>
                    </div>
                </div>
                <div class="checkout-form__body">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>

                    <?php wc_cart_totals_shipping_html(); ?>


                </div>
            </div>

            <?php woocommerce_order_review(); ?>


        </div>
    </div>

</form>

</section>
