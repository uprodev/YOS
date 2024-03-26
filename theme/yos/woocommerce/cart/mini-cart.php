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

$sum_del = get_field('suma_bezkoshtovnoyi_dostavky', 'options');
$sub = WC()->cart->subtotal;

$ost = $sum_del-$sub;
$ost_html = number_format($ost, 0, '', ' ') . ' '.get_woocommerce_currency_symbol();
$percent = round(($ost*100)/$sum_del);
$percent_bar = 100-$percent;
if ($ost < 0)
    $percent_bar = 100;

do_action( 'woocommerce_before_mini_cart' ); ?>



    <div class="side-basket__container">
        <button class="side-basket__close-btn" data-action="close-side-basket"><span class="icon-close-thin"></span></button>
        <div class="side-basket__head">
            <?= __('ваш кошик', 'yos');?> <span class="count-side">(<?= WC()->cart->get_cart_contents_count();?>)</span>
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
                            $brand = get_the_terms($product_id, 'pa_brand');
				?>
                    <li data-ids="<?= $product_id;?>">
                        <div class="product-card-sm">
                            <div class="product-card-sm__left">
                                <button class="product-card-sm__btn-remove" data-cart_item_key="<?= esc_attr( $cart_item_key );?>"><span class="icon-close"></span></button>

                                <a href="<?= esc_url( $product_permalink ); ?>" class="product-card-sm__img">
                                    <?php echo $thumbnail;?>
                                </a>
                            </div>
                            <div class="product-card-sm__right">
                                <?php if($brand):?>
                                    <div class="product-card-sm__title"><a href="<?= esc_url( $product_permalink ); ?>"><?= $brand[0]->name;?></a></div>
                                <?php endif;?>
                                <div class="product-card-sm__text">
                                    <div class="product-card-sm__text-1">
                                        <a href="<?= esc_url( $product_permalink ); ?>"><?php echo wp_kses_post( $product_name ); ?></a>
                                    </div>
                                    <?php if(get_field('seria', $product_id)):?>
                                        <div class="product-card-sm__text-2">
                                            <a href="<?= esc_url( $product_permalink ); ?>"><?php the_field('seria', $product_id);?></a>
                                        </div>
                                    <?php endif;?>
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
                    }

                do_action( 'woocommerce_mini_cart_contents' );
                ?>
            </ul>
        </div>

        <?php if(wp_is_mobile()):?>
            <?php if ( wc_coupons_enabled() ) { ?>

                <div class="basket__side-row">
                    <div class="basket__side-promotional-code">
                        <div class="promotional-code">
                            <button class="promotional-code__title button-link"
                                    data-collapse="promotional-code"><span><?= __('маєте промокод?', 'yos');?></span></button>
                            <div class="promotional-code__body" data-collapse-target="promotional-code">
                                <input type="text" name="coupon_code" class="input" id="code_coupon" value="" />
                                <button class="button-primary light w-100" name="apply_coupon_code"><?= __('застосувати', 'yos');?></button>
                                <div class="promotional-code__text"></div>
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
                                    <img src="<?= get_the_post_thumbnail_url($addit_prod);?>" alt="">
                                </a>
                            </div>
                            <div class="product-card-sm__right">
                                <?php if($br):?>
                                    <div class="product-card-sm__title"><a href="<?= get_permalink($addit_prod);?>"><?= $br[0]->name;?></a></div>
                                <?php endif;?>
                                <div class="product-card-sm__text">
                                    <div class="product-card-sm__text-1">
                                        <a href="<?= get_permalink($addit_prod);?>"><?= get_the_title($addit_prod);?></a>
                                    </div>
                                    <div class="product-card-sm__text-2">
                                        <a href="<?= get_permalink($addit_prod);?>"><?php the_field('seria', $addit_prod);?></a>
                                    </div>
                                </div>
                                <div class="product-card-sm__price">
                                    <?= $_prod->get_price_html();?>

                                </div>
                                <div class="product-card-sm__btn-add">
                                    <?php if($_prod->is_type('variable')):  ?>
                                        <a  href="<?= get_permalink($addit_prod);?>"  class="button-primary dark button-primary--sm w-100" ><?= __('додати', 'yos');?></a>
                                    <?php else:?>
                                        <a href="#" data-product_id="<?= $addit_prod;?>" class="button-primary dark button-primary--sm w-100 add-cart" ><?= __('додати', 'yos');?></a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <?php endif;?>

        <div class="side-basket__payment-info">

            <div class="side-basket__payment-info-row coupon-row" <?= WC()->cart->get_applied_coupons()?'':'style="display:none;"';?>>
                    <span><?= __('Інші знижки', 'yos');?></span>
                    <span class="text-nowrap" >
                        -<?= WC()->cart->get_cart_discount_total();?>₴
                    </span>
                </div>
            <div class="side-basket__payment-info-row">
                <span><?= __('Доставка', 'yos');?></span>
                <span><?= $sub>=$sum_del?__('Безкоштовно', 'yos'):__('За тарифами перевізника', 'yos');?></span>
            </div>
            <div class="side-basket__payment-info-row side-basket__payment-info-row--total">
                <span><?= __('всього до сплати', 'yos');?></span>
                <span class="text-nowrap cart-sub"><?php wc_cart_totals_order_total_html(); ?></span>
            </div>
        </div>

        <div class="side-basket__free-shipping">
            <div class="side-basket__free-shipping-head">

                <?php if ($percent_bar < 100)
                {
                    echo '<span>'. __('До безкоштовної доставки <br>залишилось', 'yos') .'</span>';
                    ?>
                    <span class="text-nowrap"><?= $sub>=$sum_del?'0 '.get_woocommerce_currency_symbol():$ost_html;?></span>
                    <?php
                }
                else {
                    echo '<span>'. __('Вітаємо! Доставка за наш рахунок', 'yos') .'</span>';
                }
                ?>

            </div>
            <div class="side-basket__free-shipping-line">
                <div class="line-track">
                    <div class="line" style="width: <?= $percent_bar>=100?'100':$percent_bar;?>%;"></div>
                </div>
            </div>
            <div class="side-basket__free-shipping-total">
                <span class="text-nowrap">0  <?= get_woocommerce_currency_symbol();?></span>
                <span class="text-nowrap"><?= number_format($sum_del, 0, '', ' ') . ' '.get_woocommerce_currency_symbol();?></span>
            </div>
        </div>

        <div class="side-basket__to-checkout">
            <a href="<?= wp_is_mobile()?wc_get_checkout_url():wc_get_cart_url();?>" class="button-primary dark w-100"><?= __('перейти далі', 'yos');?></a>
        </div>



    </div>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
