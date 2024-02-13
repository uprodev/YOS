<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>


<div class="checkout__side-basket woocommerce-checkout-review-order-table">
    <div class="side-basket__head">
        <?= __('ваш кошик', 'yos');?>
        <span class="basket-qty">(<?= WC()->cart->get_cart_contents_count();?>)</span>
    </div>
    <div class="side-basket__scroll-container">
        <ul class="side-basket__products-list">
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
                                <?php if($brand):?>
                                    <div class="product-card-sm__title"><a href="<?= get_term_link($brand[0]->term_id);?>"><?= $brand[0]->name;?></a></div>
                                <?php endif;?>
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
                                            <a class="quantity__btn minus"><span class="icon-square-minus"></span></a>
                                            <input type="text" value="<?=  $cart_item['quantity'];?>" class="quantity__value">
                                            <a class="quantity__btn plus"><span class="icon-square-plus"></span></a>
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

        <div class="side-basket__payment-info">
            <!--                        <div class="side-basket__payment-info-row">-->
            <!--                            <span>--><?php //__('Знижка за системою лояльності', 'yos');?><!--</span>-->
            <!--                            <span class="text-nowrap">-60 ₴</span>-->
            <!--                        </div>-->
            <div class="side-basket__payment-info-row coupon-row" <?= WC()->cart->get_coupons()?'':'style="display:none;"';?>>
                <span><?= __('Інші знижки', 'yos');?></span>
                <span class="text-nowrap" >
                                    -<?= WC()->cart->get_cart_discount_total();?>₴
                                </span>
            </div>
            <div class="side-basket__payment-info-row">
                <span><?= __('Доставка', 'yos');?></span>
                <span><?= __('За тарифами перевізника', 'yos');?></span>
            </div>
            <div class="side-basket__payment-info-row side-basket__payment-info-row--total">
                <span><?= __('всього до сплати', 'yos');?></span>
                <span class="text-nowrap cart-sub"><?php wc_cart_totals_order_total_html(); ?></span>
            </div>
        </div>

        <div class="side-basket__to-checkout">
            <button type="submit" class="button-primary dark w-100" name="woocommerce_checkout_place_order" id="place_order" value="<?= __('оформити замовлення', 'yos');?>" data-value="<?= __('підтвердити замовлення', 'yos');?>"><?= __('оформити замовлення', 'yos');?></button>
            <div class="side-basket__text">
                <?= __('Підтверджуючи замовлення, Ви приймаєте умови угоди', 'yos');?>
            </div>
        </div>
    </div>
</div>
