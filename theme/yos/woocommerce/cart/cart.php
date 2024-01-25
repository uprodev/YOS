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
                <div class="basket__side">
                    <?php if ( wc_coupons_enabled() ) { ?>

                        <div class="basket__side-row">
                            <div class="basket__side-promotional-code">
                                <div class="promotional-code">
                                    <button class="promotional-code__title button-link"
                                            data-collapse="promotional-code"><span><?= __('маєте промокод?', 'yos');?></span></button>
                                    <div class="promotional-code__body" data-collapse-target="promotional-code">
                                        <input type="text" name="coupon_code" class="input" id="code_coupon" value="" />
                                        <button class="button-primary light w-100" name="apply_coupon_code"><?= __('застосувати', 'yos');?></button>

                                        <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php $addit_prod = recently_viewed_products();

                    if($addit_prod):
                        $_prod =  wc_get_product( $addit_prod );
                        $br = get_the_terms($addit_prod, 'pa_brand');?>
                        <div class="basket__side-row recently-row">
                            <h4 class="basket__side-title title-4"><?= __('додати до замовлення', 'yos');?></h4>

                            <div class="basket__side-offer">
                                <div class="product-card-sm">
                                    <div class="product-card-sm__left">
                                        <a href="<?= get_permalink($addit_prod);?>" class="product-card-sm__img">
                                            <img src="<?= get_the_post_thumbnail_url($addit_prod, 'thumb');?>" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card-sm__right">
                                        <div class="product-card-sm__title"><a href="<?= get_term_link($br[0]->term_id);?>"><?= $br[0]->name;?></a></div>
                                        <div class="product-card-sm__text">
                                            <div class="product-card-sm__text-1">
                                                <?= get_the_title($addit_prod);?>
                                            </div>
                                            <div class="product-card-sm__text-2">
                                                <?php the_field('seria', $addit_prod);?>
                                            </div>
                                        </div>
                                        <div class="product-card-sm__price">
                                            <?= $_prod->get_price_html();?>
                                        </div>
                                        <div class="product-card-sm__btn-add">
                                            <a href="#" data-product_id="<?= $addit_prod;?>" class="button-primary dark button-primary--sm w-100 add-cart addit-add" ><?= __('додати', 'yos');?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                    <div class="basket__side-row">
                        <div class="side-basket__payment-info">
                            <div class="side-basket__payment-info-row">
                                <span><?= __('Знижка за системою лояльності', 'yos');?></span>
                                <span class="text-nowrap">-60 ₴</span>
                            </div>
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
                    </div>

                    <div class="basket__side-row">
                        <a href="<?= wc_get_checkout_url();?>" class="button-primary dark w-100"><?= __('перейти далі', 'yos');?></a>
                    </div>

                    <?php $sub = WC()->cart->subtotal;

                    if($sub<2000):

                        $ost = 2000-$sub;
                        $ost_html = number_format($ost, 2, ',', ' ') . ' '.get_woocommerce_currency_symbol();
                        $percent = round(($ost*100)/2000);
                        $percent_bar = 100-$percent;

                        ?>

                        <div class="basket__side-row">
                            <div class="side-basket__free-shipping">
                                <div class="side-basket__free-shipping-head">
                                    <span><?= __('До безкоштовної доставки залишилось:', 'yos');?></span>
                                    <span class="text-nowrap"><?= $ost_html;?></span>
                                </div>
                                <div class="side-basket__free-shipping-line">
                                    <div class="line-track">
                                        <div class="line" style="width: <?= $percent_bar;?>%;"></div>
                                    </div>
                                </div>
                                <div class="side-basket__free-shipping-total">
                                    <span class="text-nowrap">0 ₴</span>
                                    <span class="text-nowrap">2 000 ₴</span>
                                </div>
                            </div>
                        </div>

                    <?php endif;?>
                </div>
            </div>

    </div>
</section>

