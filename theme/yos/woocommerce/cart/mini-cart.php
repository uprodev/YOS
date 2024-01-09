<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

    <div class="side-basket__container">
        <button class="side-basket__close-btn" data-action="close-side-basket"><span class="icon-close-thin"></span></button>
        <div class="side-basket__head">
            <?= __('ваш кошик', 'yos');?> <span>(<?= WC()->cart->get_cart_contents_count();?>)</span>
        </div>
        <div class="side-basket__scroll-container">
            <ul class="side-basket__products-list">
                <?php do_action( 'woocommerce_before_mini_cart_contents' );

                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                            /**
                             * This filter is documented in woocommerce/templates/cart/cart.php.
                             *
                             * @since 2.1.0
                             */
                            $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                            $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                            $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
                    <li>
                        <div class="product-card-sm">
                            <div class="product-card-sm__left">
                                <button class="product-card-sm__btn-remove"><span class="icon-close"></span></button>
                                <a href="<?php echo esc_url( $product_permalink ); ?>" class="product-card-sm__img">
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

                            <li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                                <?php
                                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    'woocommerce_cart_item_remove_link',
                                    sprintf(
                                        '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                        /* translators: %s is the product name */
                                        esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
                                        esc_attr( $product_id ),
                                        esc_attr( $cart_item_key ),
                                        esc_attr( $_product->get_sku() )
                                    ),
                                    $cart_item_key
                                );
                                ?>
                                <?php if ( empty( $product_permalink ) ) : ?>
                                    <?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                <?php else : ?>
                                    <a href="<?php echo esc_url( $product_permalink ); ?>">
                                        <?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                                <?php endif; ?>
                                <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </li>
                <?php }
                    }

                do_action( 'woocommerce_mini_cart_contents' );
                ?>
            </ul>

            <div class="side-basket__payment-info">
                <div class="side-basket__payment-info-row">
                    <span><?= __('Знижка за системою лояльності', 'yos');?></span>
                    <span class="text-nowrap">-60 ₴</span>
                </div>
                <div class="side-basket__payment-info-row">
                    <span><?= __('Інші знижки', 'yos');?></span>
                    <span class="text-nowrap">0 ₴</span>
                </div>
                <div class="side-basket__payment-info-row">
                    <span><?= __('Доставка', 'yos');?></span>
                    <span><?= __('За тарифами перевізника', 'yos');?></span>
                </div>
                <div class="side-basket__payment-info-row side-basket__payment-info-row--total">
                    <span><?= __('всього до сплати', 'yos');?></span>
                    <span class="text-nowrap">4 098 ₴</span>
                </div>
            </div>

            <div class="side-basket__to-checkout">
                <a href="#" class="button-primary dark w-100"><?= __('перейти далі', 'yos');?></a>
            </div>

            <div class="side-basket__free-shipping">
                <div class="side-basket__free-shipping-head">
                    <span><?= __('До безкоштовної доставки залишилось:', 'yos');?></span>
                    <span class="text-nowrap">1 230 ₴</span>
                </div>
                <div class="side-basket__free-shipping-line">
                    <div class="line-track">
                        <div class="line" style="width: 40%;"></div>
                    </div>
                </div>
                <div class="side-basket__free-shipping-total">
                    <span class="text-nowrap">0 ₴</span>
                    <span class="text-nowrap">2 000 ₴</span>
                </div>
            </div>
        </div>
    </div>



	<p class="woocommerce-mini-cart__total total">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
	</p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
