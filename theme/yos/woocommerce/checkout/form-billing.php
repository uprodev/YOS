<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
    <div class="checkout-form__col">
        <div class="checkout-form__fields">
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="text" class="input" name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name" required>
                    <span class="input-label"><?= __('Прізвище', 'yos');?></span>
                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="text" class="input" name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name" required>
                    <span class="input-label"><?= __('Ім’я', 'yos');?></span>
                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="text" class="input" name="billing_mid_name" id="billing_mid_name" placeholder="" value="" autocomplete="given-name" required>
                    <span class="input-label"><?= __('По-батькові', 'yos');?></span>
                </div>
            </div>
            <input type="hidden" name="billing_country" id="billing_country" value="UA" autocomplete="off">
        </div>
    </div>
    <div class="checkout-form__col">
        <div class="checkout-form__fields">
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="email" class="input" name="billing_email" id="billing_email" placeholder="" value="" autocomplete="email username" required>
                    <span class="input-label"><?= __('Електронна адреса', 'yos');?></span>
                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>
                    <input type="text" class="input" name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel" data-mask="+380 (99) 999 99 99"  required>
                    <span class="input-label"><?= __('Телефонний номер', 'yos');?></span>
                </div>
            </div>
        </div>
    </div>
</div>


