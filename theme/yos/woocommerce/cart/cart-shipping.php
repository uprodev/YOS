<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.3.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="checkout-form__row" data-da=".other-recipient,992,last">
    <div class="checkout-form__col">
        <h2 class="checkout-form__title"><?= __('спосіб доставки', 'yos');?></h2>
        <?php if ( $available_methods ) : ?>
            <div class="checkbox-radio-list" id="shipping_method">
                <?php foreach ( $available_methods as $method ) : ?>
                    <label class="checkbox-radio" for="shipping_method_<?= $index;?>_<?= esc_attr( sanitize_title( $method->id ) );?>">
                    <?php if ( 1 < count( $available_methods ) ) {
                        printf( '<input  type="checkbox" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ) ); // WPCS: XSS ok.
                    } else {
                        printf( '<input readonly type="checkbox" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" checked/>', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ) ); // WPCS: XSS ok.
                    }
                    ?>

                        <div class="checkbox-radio__square"></div>
                        <div class="checkbox-radio__text"><?= wc_cart_totals_shipping_method_label( $method );?></div>
                    </label>

                    <?php do_action( 'woocommerce_after_shipping_rate', $method, $index );?>

                <?php endforeach; ?>
            </div>
        <?php endif;?>
        <div class="checkout-form__fields">

            <?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
            <?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>
            <!--
                Если нужно обновить селекты, есть метод
                window.select.updateAll();
             -->
<!--            <div class="checkout-form__field">-->
<!--                <div class="select-wrap">-->
<!--                    <select name="cities" class="_select" required>-->
<!--                        <option value="" selected>Місто</option>-->
<!--                        <option value="1">Івано-Франківськ</option>-->
<!--                        <option value="2">Вінниця</option>-->
<!--                        <option value="3">Дніпро</option>-->
<!--                        <option value="4">Донецьк</option>-->
<!--                        <option value="5">Житомир</option>-->
<!--                        <option value="6">Запоріжжя</option>-->
<!--                        <option value="7">Київ</option>-->
<!--                        <option value="8">Кропивницький</option>-->
<!--                        <option value="9">Луганськ</option>-->
<!--                        <option value="10">Луцьк</option>-->
<!--                        <option value="11">Львів</option>-->
<!--                        <option value="12">Миколаїв</option>-->
<!--                        <option value="13">Одеса</option>-->
<!--                        <option value="14">Полтава</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="checkout-form__field">-->
<!--                <div class="select-wrap disabled">-->
<!--                    <select name="post" class="_select" required>-->
<!--                        <option value="" selected>Відділення</option>-->
<!--                        <option value="1">Відділення 1</option>-->
<!--                        <option value="2">Відділення 2</option>-->
<!--                        <option value="3">Відділення 3</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>


