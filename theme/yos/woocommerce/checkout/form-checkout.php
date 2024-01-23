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

do_action( 'woocommerce_before_checkout_form', $checkout );

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
                        <h2 class="checkout-form__head-title">оформлення замовлення</h2>
                        <a href="#" class="button-link"><span>є акаунт?</span></a>
                    </div>
                    <div class="checkout-form__head-right">
                        <a href="#" class="button-link"><span>продовжити покупки</span></a>
                    </div>
                </div>
                <div class="checkout-form__body">
                    <div class="checkout-form__row">
                        <div class="checkout-form__col">
                            <div class="checkout-form__fields">
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
                            </div>
                        </div>
                        <div class="checkout-form__col">
                            <div class="checkout-form__fields">
                                <div class="checkout-form__field">
                                    <div class="input-wrap" data-input>


                                        <input type="email" class="input" required>
                                        <span class="input-label">Електронна адреса</span>

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
                    </div>
                    <div class="checkout-form__row">
                        <div class="checkout-form__col other-recipient">
                            <div class="checkbox-radio-list">
                                <label class="checkbox-radio">
                                    <input type="checkbox" name="other" data-collapse="other-recipient">
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
                    <div class="checkout-form__row" data-da=".other-recipient,992,last">
                        <div class="checkout-form__col">
                            <h2 class="checkout-form__title">спосіб доставки</h2>
                            <div class="checkbox-radio-list">
                                <label class="checkbox-radio">
                                    <input type="radio" name="delivery-method" checked>
                                    <div class="checkbox-radio__square"></div>
                                    <div class="checkbox-radio__text">Нова Пошта Відділення</div>
                                </label>
                                <label class="checkbox-radio">
                                    <input type="radio" name="delivery-method" >
                                    <div class="checkbox-radio__square"></div>
                                    <div class="checkbox-radio__text">Нова Пошта Поштомат</div>
                                </label>
                                <label class="checkbox-radio">
                                    <input type="radio" name="delivery-method" >
                                    <div class="checkbox-radio__square"></div>
                                    <div class="checkbox-radio__text">Нова Пошта Кур’єр</div>
                                </label>
                            </div>
                            <div class="checkout-form__fields">
                                <!--
                                    Если нужно обновить селекты, есть метод
                                    window.select.updateAll();
                                 -->
                                <div class="checkout-form__field">
                                    <div class="select-wrap">
                                        <select name="cities" class="_select" required>
                                            <option value="" selected>Місто</option>
                                            <option value="1">Івано-Франківськ</option>
                                            <option value="2">Вінниця</option>
                                            <option value="3">Дніпро</option>
                                            <option value="4">Донецьк</option>
                                            <option value="5">Житомир</option>
                                            <option value="6">Запоріжжя</option>
                                            <option value="7">Київ</option>
                                            <option value="8">Кропивницький</option>
                                            <option value="9">Луганськ</option>
                                            <option value="10">Луцьк</option>
                                            <option value="11">Львів</option>
                                            <option value="12">Миколаїв</option>
                                            <option value="13">Одеса</option>
                                            <option value="14">Полтава</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="checkout-form__field">
                                    <div class="select-wrap disabled">
                                        <select name="post" class="_select" required>
                                            <option value="" selected>Відділення</option>
                                            <option value="1">Відділення 1</option>
                                            <option value="2">Відділення 2</option>
                                            <option value="3">Відділення 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout__side-basket">
                <div class="side-basket__head">
                    ваш кошик <span>(3)</span>
                </div>
                <div class="side-basket__scroll-container">
                    <ul class="side-basket__products-list">
                        <li>
                            <div class="product-card-sm">
                                <div class="product-card-sm__left">
                                    <button class="product-card-sm__btn-remove"><span
                                                class="icon-close"></span></button>
                                    <a href="#" class="product-card-sm__img">
                                        <img src="img/photo/product-card-img-1.png" alt="">
                                    </a>
                                </div>
                                <div class="product-card-sm__right">
                                    <div class="product-card-sm__title"><a href="#">zein obagi</a></div>
                                    <div class="product-card-sm__text">
                                        <div class="product-card-sm__text-1">
                                            Exfoliating Polish, 65g
                                        </div>
                                        <div class="product-card-sm__text-2">
                                            Zo Skin Health
                                        </div>
                                    </div>
                                    <div class="product-card-sm__group">
                                        <div class="product-card-sm__quantity">
                                            <div class="product-card-sm__quantity-label">Кількість:</div>
                                            <div class="quantity" data-quantity>
                                                <button class="quantity__btn minus"><span class="icon-square-minus"></span></button>
                                                <input type="text" value="1" class="quantity__value">
                                                <button class="quantity__btn plus"><span class="icon-square-plus"></span></button>
                                            </div>
                                        </div>
                                        <div class="product-card-sm__price">
                                            <div class="product-card-sm__price-current">3 199 ₴</div>
                                            <div class="product-card-sm__price-old">7 299 ₴</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product-card-sm">
                                <div class="product-card-sm__left">
                                    <button class="product-card-sm__btn-remove"><span
                                                class="icon-close"></span></button>
                                    <a href="#" class="product-card-sm__img">
                                        <img src="img/photo/product-card-img-2.png" alt="">
                                    </a>
                                </div>
                                <div class="product-card-sm__right">
                                    <div class="product-card-sm__title"><a href="#">rare paris</a></div>
                                    <div class="product-card-sm__text">
                                        <div class="product-card-sm__text-1">
                                            Ecological Cellulose, 65g
                                        </div>
                                        <div class="product-card-sm__text-2">
                                            Tresor Solaire
                                        </div>
                                    </div>
                                    <div class="product-card-sm__group">
                                        <div class="product-card-sm__quantity">
                                            <div class="product-card-sm__quantity-label">Кількість:</div>
                                            <div class="quantity" data-quantity>
                                                <button class="quantity__btn minus"><span class="icon-square-minus"></span></button>
                                                <input type="text" value="1" class="quantity__value">
                                                <button class="quantity__btn plus"><span class="icon-square-plus"></span></button>
                                            </div>
                                        </div>
                                        <div class="product-card-sm__price">
                                            <div class="product-card-sm__price-current">299 ₴</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="side-basket__payment-info">
                        <div class="side-basket__payment-info-row">
                            <span>Знижка за системою лояльності</span>
                            <span class="text-nowrap">-40 ₴</span>
                        </div>
                        <div class="side-basket__payment-info-row">
                            <span>Знижка -23%</span>
                            <span class="text-nowrap">-340 ₴</span>
                        </div>
                        <div class="side-basket__payment-info-row">
                            <span>Доставка</span>
                            <span>За тарифами перевізника</span>
                        </div>
                        <div class="side-basket__payment-info-row side-basket__payment-info-row--total">
                            <span>всього до сплати</span>
                            <span class="text-nowrap">4 098 ₴</span>
                        </div>
                    </div>

                    <div class="side-basket__to-checkout">
                        <button class="button-primary dark w-100">оформити замовлення</button>
                        <div class="side-basket__text">
                            Підтверджуючи замовлення, Ви приймаєте
                            умови угоди
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

</section>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
