<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;

$items_count = count( $order->get_items() );
$discount = $order->get_discount_total();

$Timestamp = strtotime(date('j F Y'));
$TotalTimeStamp1 = strtotime('+ 2 days', $Timestamp);
$TotalTimeStamp2 = strtotime('+ 6 days', $Timestamp);
$date1 = date('j F', $TotalTimeStamp1);
$date2 = date('j F', $TotalTimeStamp2);

$ship = $order->get_shipping_to_display();
$adres = $order->get_shipping_address_1();
$city = $order->get_shipping_city();

$sum_del = get_field('suma_bezkoshtovnoyi_dostavky', 'options');
$sub = $order->get_formatted_order_total();
?>
<section class="order-info">
    <div class="container">
        <div class="order-info__body">
            <div class="order-info__left">
                <div class="order-info__head">
                    <h2 class="order-info__title">
                        <?= __('дякуємо!', 'yos');?>
                    </h2>
                    <div class="order-info__text">
                        <?= __('Ваше замовлення', 'yos');?> <?= $order->get_order_number(); ?> <?= __('було розміщено.', 'yos');?>
                    </div>
                </div>
                <h2 class="order-info__title">
                    <?= __('ваше замовлення', 'yos');?> <span>(<?= $items_count;?>)</span>
                </h2>
                <ul class="order-info__list basket__list">
                    <?php foreach ( $order->get_items() as $item_id => $item ):
                        $product_id = $item->get_product_id();
                        $product = $item->get_product();
                        $product_name = $item->get_name();
                        $quantity = $item->get_quantity();
                        $brand = get_the_terms($product_id, 'pa_brand');
                        ?>
                        <li>
                            <div class="product-card-sm">
                                <div class="product-card-sm__left">
                                    <a href="<?= get_permalink($product_id);?>" class="product-card-sm__img">
                                        <img src="<?= get_the_post_thumbnail_url($product_id, 'thumb');?>" alt="">
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
                                            <div class="product-card-sm__quantity-label"><?= __('Кількість:', 'yos');?> <?= $quantity;?></div>
                                        </div>
                                        <div class="product-card-sm__price">
                                            <?= $product->get_price_html();?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="order-info__right">
                <h2 class="order-info__title">
                    <?= __('інформація', 'yos');?>
                </h2>

                <div class="order-info__row">
                    <h4><?= __('дані одержувача', 'yos');?></h4>
                    <?php if ($order->get_shipping_first_name())      { ?>
                        <p><?= $order->get_shipping_first_name()   . ' '. $order->get_shipping_last_name(); ?></p>
                    <?php } else {  ?>

                        <p><?= $order->get_billing_first_name(). ' '.$order->get_billing_last_name();?></p>
                    <?php } ?>


                    <p><?= $order->get_shipping_phone() ? $order->get_shipping_phone() : $order->get_billing_phone();?></p>
                    <p><?= $order->get_billing_email();?></p>
                </div>

                <div class="order-info__row">
                    <h4><?= __('пункт видачі замовлення', 'yos');?></h4>
                    <p>
                        <?= $ship;?> <?= $adres?'— '.$adres:'';?><?= $city?', '.$city:'';?>
                    </p>
                    <p class="text-sm">
                        <?= __('Приблизна дата доставки:', 'yos');?>
                        <?= $date1 .' - '. $date2;?>
                    </p>
                </div>
                <div class="order-info__row">
                    <div class="side-basket__payment-info">
                        <!--                        <div class="side-basket__payment-info-row">-->
                        <!--                            <span>--><?//= __('Знижка за системою лояльності', 'yos');?><!--</span>-->
                        <!--                            <span class="text-nowrap">-40 ₴</span>-->
                        <!--                        </div>-->
                        <?php if($discount):?>
                            <div class="side-basket__payment-info-row">
                                <span><?= __('Знижка', 'yos');?></span>
                                <span class="text-nowrap">-<?= $order->get_discount_total();?> ₴</span>
                            </div>
                        <?php endif;?>
                        <div class="side-basket__payment-info-row">
                            <span><?= __('Доставка', 'yos');?></span>
                            <span><?= $sub>=$sum_del?__('Безкоштовно', 'yos'):__('За тарифами перевізника', 'yos');?></span>
                        </div>
                        <div class="side-basket__payment-info-row side-basket__payment-info-row--total">
                            <span><?= __('всього до сплати', 'yos');?></span>
                            <span class="text-nowrap"><?= $sub;?></span>

                        </div>
                    </div>
                </div>

                <div class="order-info__row">
                    <a href="<?= wc_get_page_permalink( 'shop' ) ?>" class="button-link"><span><?= __('продовжити покупки', 'yos');?></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
