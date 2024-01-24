<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="checkout-form__row">
    <div class="checkout-form__col other-recipient">
        <div class="checkbox-radio-list">
            <label class="checkbox-radio">
                <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" data-collapse="other-recipient" value="1" />
                <div class="checkbox-radio__square"></div>
                <div class="checkbox-radio__text"><?= __('Отримувач інша особа', 'yos');?></div>
            </label>
        </div>

        <div class="checkout-form__fields" data-collapse-target="other-recipient">
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="text" class="input" name="shipping_last_name" id="shipping_last_name" placeholder="" value="" autocomplete="family-name" required>
                    <span class="input-label"><?= __('Прізвище', 'yos');?></span>
                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="text" class="input" name="shipping_first_name" id="shipping_first_name" placeholder="" value="" autocomplete="given-name" required>
                    <span class="input-label"><?= __('Ім’я', 'yos');?></span>
                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="text" class="input" name="shipping_mid_name" id="shipping_mid_name" placeholder="" value="" autocomplete="given-name" required>
                    <span class="input-label"><?= __('По-батькові', 'yos');?></span>
                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="text" class="input" name="shipping_phone" id="shipping_phone" placeholder="" value="" autocomplete="tel" data-mask="+380 (99) 999 99 99"  required>
                    <span class="input-label"><?= __('Телефонний номер', 'yos');?></span>
                </div>
            </div>
            <input type="hidden" name="shipping_country" id="shipping_country" value="UA" autocomplete="off">
        </div>
    </div>
    <div class="checkout-form__col mt">

        <h2 class="checkout-form__title"><?= __('спосіб оплати', 'yos');?></h2>

        <?php wc_get_template( 'checkout/payment.php');?>

        <h2 class="checkout-form__title"><?= __('коментар', 'yos');?></h2>
        <div class="checkout-form__fields">
            <div class="checkout-form__field">
                <div class="textarea-wrap" data-textarea>
                    <textarea class="textarea" name="order_comments" id="order_comments"></textarea>
                    <span class="textarea-label"><?= __('Текст повідомлення', 'yos');?></span>
                </div>
            </div>
        </div>
    </div>
</div>
