<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
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

?>

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

<?php
$addit_prod = get_field('cart_item', 'option') ? get_field('cart_item', 'option')[0] : recently_viewed_products()  ;



if($addit_prod):
    $_prod =  wc_get_product( $addit_prod );
    $br = get_the_terms($addit_prod, 'pa_brand');

     if ($_prod->is_type( 'variable' )) {
         $default_attributes = $_prod->get_default_attributes();
         $count_variations = (count( $variations[0]['attributes'] ?? []));

         $prefixed_slugs = array_map( function( $pa_name ) {
             return 'attribute_'. $pa_name;
         }, array_keys( $default_attributes ) );
         $default_attributes_var = array_combine( $prefixed_slugs, $default_attributes );
         $variations_json = wp_json_encode( $variations );
         $variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
        $data_store   = new WC_Product_Data_Store_CPT();
        $variation_id = $data_store->find_matching_product_variation(
            new WC_Product( $addit_prod),$default_attributes_var
        );
         if ($variation_id)
             $default_variation = new WC_Product_Variation($variation_id);
     }
    ?>
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
                    <?php if($br):?>
                        <div class="product-card-sm__title"><a href="<?= get_permalink($addit_prod);?>"><?= $br[0]->name;?></a></div>
                    <?php endif;?>
                    <div class="product-card-sm__text">
                        <div class="product-card-sm__text-1">
                            <a href="<?= get_permalink($addit_prod);?>"><?= get_the_title($addit_prod);?></a>
                        </div>
                        <div class="product-card-sm__text-2">
                            <?php the_field('seria', $addit_prod);?>
                        </div>
                    </div>
                    <div class="product-card-sm__price">
                        <?php if ($_prod->is_type( 'variable' )) {
                            if($default_variation && $default_variation->get_price_html())
                                echo $default_variation->get_price_html();
                        }else {
                            echo $_prod->get_price_html();
                        }
                        ?>
                    </div>
                    <div class="product-card-sm__btn-add">
                        <a href="#" class="button-primary dark button-primary--sm w-100 add-cart" <?= $_prod->is_type('variable')?'data-variation_id="'.$variation_id.'"':'';?> data-product_id="<?= $_prod->get_id() ?>"><?= __('додати', 'yos');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>



    <div class="basket__side-row">
        <div class="side-basket__payment-info">

            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
            <div class="side-basket__payment-info-row coupon-row" <?= WC()->cart->get_applied_coupons()?'':'style="display:none;"';?>>
                <span><?= __('Промокод', 'yos');?> <?= $code; ?></span>

                <span class="text-nowrap" >
                    <?php wc_cart_totals_coupon_html( $coupon ); ?>
                </span>
            </div>
            <?php endforeach; ?>

            <div class="side-basket__payment-info-row">
                <span><?= __('Доставка', 'yos');?></span>
                <span><?= $sub>=$sum_del?__('Безкоштовно', 'yos'):__('За тарифами перевізника', 'yos');?></span>
            </div>
            <div class="side-basket__payment-info-row side-basket__payment-info-row--total">
                <span><?= __('всього до сплати', 'yos');?></span>
                <span class="text-nowrap cart-sub"><?php wc_cart_totals_order_total_html(); ?></span>
            </div>
        </div>
    </div>

    <div class="basket__side-row ">
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
                        <div class="line" style="width: <?= $percent_bar;?>%;"></div>
                </div>
            </div>
            <div class="side-basket__free-shipping-total">
                <span class="text-nowrap">0  <?= get_woocommerce_currency_symbol();?></span>
                <span class="text-nowrap"><?= number_format($sum_del, 0, '', ' ') . ' '.get_woocommerce_currency_symbol();?></span>
            </div>
        </div>
    </div>

    <div class="basket__side-row">
        <a href="<?= wc_get_checkout_url();?>" class="button-primary dark w-100"><?= __('оформити замовлення', 'yos');?></a>
    </div>
