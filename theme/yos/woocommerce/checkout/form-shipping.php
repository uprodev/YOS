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
                <div class="checkbox-radio__text">Отримувач інша особа</div>
            </label>
        </div>

        <div class="checkout-form__fields" data-collapse-target="other-recipient">
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>


                    <input type="text" class="input" required>
                    <span class="input-label">Прізвище</span>

                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>


                    <input type="text" class="input" required>
                    <span class="input-label">Ім’я</span>

                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>


                    <input type="text" class="input" required>
                    <span class="input-label">По-батькові</span>

                </div>
            </div>
            <div class="checkout-form__field">
                <div class="input-wrap" data-input>


                    <input type="text" class="input" data-mask="+380 (99) 999 99 99" required>
                    <span class="input-label">Телефонний номер</span>

                </div>
            </div>
        </div>
    </div>
    <div class="checkout-form__col mt">
        <h2 class="checkout-form__title">спосіб оплати</h2>
        <div class="checkbox-radio-list">
            <label class="checkbox-radio">
                <input type="radio" name="payment" >
                <div class="checkbox-radio__square"></div>
                <div class="checkbox-radio__text">Банківська картка. Інтернет-платіж</div>
            </label>
            <label class="checkbox-radio">
                <input type="radio" name="payment" checked>
                <div class="checkbox-radio__square"></div>
                <div class="checkbox-radio__text">При отриманні</div>
            </label>
        </div>

        <h2 class="checkout-form__title">коментар</h2>
        <div class="checkout-form__fields">
            <div class="checkout-form__field">
                <div class="textarea-wrap" data-textarea>
                    <textarea class="textarea"></textarea>
                    <span class="textarea-label">Текст повідомлення</span>
                </div>
            </div>
        </div>
    </div>
</div>
