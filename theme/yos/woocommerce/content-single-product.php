<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 */

defined( 'ABSPATH' ) || exit;

global $product;



/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$info = get_field('info');
$image = get_field('image');
$image_m = get_field('image_mob');
$consultation = get_field('consultation');

$brand = get_the_terms(get_the_ID(), 'pa_brand');

if ($product->is_type( 'variable' )) {
    $variations = ($product->get_available_variations());
    $default_attributes = $product->get_default_attributes();
    $variations_attr = ($product->get_variation_attributes());

    foreach($product->get_available_variations() as $variation_values ){
        foreach($variation_values['attributes'] as $key => $attribute_value ){
            $attribute_name = str_replace( 'attribute_', '', $key );
            $default_value = $product->get_variation_default_attribute($attribute_name);
            if( $default_value == $attribute_value ){
                $is_default_variation = true;
            } else {
                $is_default_variation = false;
                break;
            }
        }
        if( $is_default_variation ){
            $variation_id = $variation_values['variation_id'];
            break;
        }
    }
    if( $is_default_variation ){
        $default_variation = wc_get_product($variation_id);
        $price = $default_variation->get_price();
    }
}

$choise = get_field('yos_choise', get_the_ID());

?>
<section class="product" data-product>
    <div class="container">
        <div class="product__body">
            <div class="product__row">
                <div class="product__col-1">
                    <?php woocommerce_breadcrumb();?>
                    <div class="product__images">
                        <div class="product-card__labels">
                            <?= $choise?'<div class="product-card-label product-card-label--secondary">'.__('YOS choice', 'yos').'</div>':'';?>
                            <?php if ($product->is_type('variable')):
                                if ( $default_variation &&  $default_variation->is_on_sale() ) :


                                    $price = $default_variation->regular_price;
                                    $sale = $default_variation  ->sale_price;

                                    $perc = round(($price-$sale)*100/$price); ?>

                                    <div class="product-card-label <?= $perc > 0 ? 'show' : '' ?>"  >-<?= $perc;?>%</div>

                                <?php

                                endif;

                            elseif($product->is_type('simple')):

                                if ( $product->is_on_sale() ) :
                                    $price = $product->regular_price;
                                    $sale = $product->sale_price;

                                    $perc = round(($price-$sale)*100/$price);?>

                                    <div class="product-card-label">-<?= $perc;?>%</div>

                                <?php endif;

                            endif;?>
                        </div>

                        <?php woocommerce_show_product_images();?>

                    </div>
                </div>
                <div class="product__col-2">

                    <div class="product__main-info product-main-info">
                        <?php if($brand):?>
                            <h2 class="product-main-info__title title-2"><a href="<?= get_term_link($brand[0]->term_id);?>"><?= $brand[0]->name;?></a></h2>
                        <?php endif;?>
                        <?php woocommerce_template_single_title();?>
                        <?php if(get_field('seria')):?>
                            <div class="product-main-info__text mt-0"><?php the_field('seria');?></div>
                        <?php endif;?>

                        <div class="product-main-info__articul" style="display: <?= !$product->get_sku() ? 'none' : ''; ?>"><?= __('Артикул:', 'yos');?> <span class="_sku"><?= $product->get_sku(); ?></span></div>


                        <div class="product-actions">

                            <?php woocommerce_template_single_rating();?>

                            <?php if ($product->is_type('simple0')):?>
<!--                                <div class="product-actions__option">-->
<!--                                    <div class="product-actions__option-head">-->
<!--                                        <div class="product-actions__option-text stock">-->
<!--                                            --><?php //= $product->is_in_stock()?__('Є в наявності', 'yos'):__('Немає в наявності', 'yos');?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                            <?php endif;?>

                            <?php
                            $product_attributes = $product->get_attributes();
                            $product_attributes_keys = array_keys($product_attributes);
                            if (($key = array_search('pa_brand', $product_attributes_keys)) !== false) {
                                unset($product_attributes_keys[$key]);
                            }


                            if ($product_attributes && !empty($product_attributes_keys)) {
                                    foreach ( $product_attributes as $attribute_name => $attribute ) {
                                        $i++;
                                        $tax = get_taxonomy($attribute_name);
                                        $termsA = $attribute->get_data()['options'];
                                        $terms = get_terms([
                                            'taxonomy' => $attribute_name,
                                            'include' => $termsA,
                                            'fields' => 'ids',
                                            'orderby' => 'menu-order',
                                            'order' => 'ASC'
                                        ]);

                                        $variation = $attribute->get_variation();
                                        $visible = $attribute->get_visible();
                                        $is_color = $attribute_name == 'pa_color' ? true : false;

                                        if (!$visible || $attribute_name == 'pa_brand' || !$terms)
                                            continue;



                                        if ( $attribute ) {
                                            ?>
                                            <div class="product-actions__option <?= $is_color ? 'colors' : '' ?>">
                                                <div class="product-actions__option-head">
                                                    <div class="product-actions__option-title"><?= ($tax->labels->singular_name) ?>: </div>

                                                    <?php if ($is_color) { ?>
                                                        <div class="product-actions__option-text color-label"></div>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-actions__option-items">
                                                    <?php
                                                    if ($terms):
                                                        $count = count($terms);

                                                        foreach ($terms as $term_id):
                                                            $term = get_term($term_id);
                                                            $c = get_field('color', 'pa_color_'.$term->term_id) ;
                                                            ?>

                                                            <div class="product-actions__option-item <?= $is_color ? 'color' : 'volume' ?>-item" data-<?= $is_color ? 'color' : 'volumes' ?>="<?= $term->slug ?>" >
                                                                <label class="product-option<?= $is_color ? '-color' : '' ?>" style="color: <?= $c;?>">
                                                                    <input data-label="<?= $term->name ?>" type="radio" name="<?= $term->taxonomy ?>" <?= $variation && $count != 1 ? ($default_attributes[$term->taxonomy] == $term->slug ? 'checked' : '') : 'checked' ?> value="<?= $term->slug ?>">
                                                                    <?php if ($is_color) { ?>
                                                                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path class="border"
                                                                                  d="M4.5 1.46875H26.5C28.433 1.46875 30 3.03575 30 4.96875V26.9688C30 28.9017 28.433 30.4688 26.5 30.4688H4.5C2.567 30.4688 1 28.9017 1 26.9688V4.96875C1 3.03575 2.567 1.46875 4.5 1.46875Z"
                                                                                  stroke="#182A64" />
                                                                            <rect x="3" y="3.46875" width="25" height="25" rx="3"
                                                                                  fill="currentColor" />
                                                                            <path class="line" d="M4.5 27.5L26.5 4.5" stroke="#182A64"
                                                                                  stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                    <?php } else { ?>
                                                                        <div class="product-option__value">
                                                                            <?= $term->name ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </label>
                                                            </div>
                                                        <?php endforeach;
                                                    endif;?>
                                                </div>
                                            </div>
                                            <?php
                                        } else { ?>

                                            <?php
                                        }

                                    }
                                }?>
                            <div class="product-actions__stock-status">
                                <?= $product->is_in_stock()?__('Є в наявності', 'yos'):__('Немає в наявності', 'yos');?>
                            </div>


                            <?php if ($product->is_type('variable')):?>

                                <div class="product-actions__price" style="display: none;">
                                    <div class="product-actions__price-row">
                                        <div class="product-actions__price-current"></div>
                                    </div>
                                    <div class="product-actions__price-row price-sale">
                                        <div class="product-actions__price-old"></div>
                                        <div class="product-actions__price-profit"></div>
                                    </div>
                                </div>


                            <?php elseif($product->is_type('simple')):
                                if ( $product->is_on_sale() ) :
                                    $price = $product->regular_price;
                                    $sale = $product->sale_price;

                                    $perc = round(($price-$sale)*100/$price);?>
                                    <div class="product-actions__price">
                                        <div class="product-actions__price-row">
                                            <div class="product-actions__price-current"><?= $sale;?> ₴</div>
                                        </div>
                                        <div class="product-actions__price-row">
                                            <div class="product-actions__price-old"><?= $price;?> ₴</div>
                                            <div class="product-actions__price-profit">-<?= $perc;?>%</div>
                                        </div>
                                    </div>
                                <?php else:?>
                                    <div class="product-actions__price">
                                        <div class="product-actions__price-row">
                                            <div class="product-actions__price-current"><?php woocommerce_template_single_price();?></div>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <?php endif;?>

                            <?php if($consultation):?>
                                <div class="product-actions__have-a-consultation">
                                    <div class="product-main-info__text">
                                        <?= __ ('У цьому засобі багато активних інгредієнтів, тому для покупки потрібно проконсультуватися з косметологом.', 'yos') ?>
                                    </div>
                                    <label class="checkbox-radio">
                                        <input type="checkbox" name="consultation"
                                               data-action="toggle-button-as-disabled-by-id" data-id="add-to-basket">
                                        <div class="checkbox-radio__square"></div>
                                        <div class="checkbox-radio__text">
                                            <?= __ ('У мене вже була консультація', 'yos') ?>
                                        </div>
                                    </label>
                                </div>
                            <?php endif;?>

                            <div class="product-actions__footer">


                                <?php if ($product->is_in_stock()) { ?>
                                    <button <?= $consultation||!$product->is_in_stock()?'disabled':'';?> data-target="toggle-button-as-disabled-by-id" data-id="add-to-basket" class="product-actions__buy button-primary dark add-cart" data-product_id="<?= get_the_ID();?>"><?= __('додати до кошика', 'yos');?></button>
                                    <a style="display: none" href="#popup-notify-availability" data-product="<?php the_title() ?>" data-product_id="<?php the_id()  ?>" data-popup="open-popup" class="button-primary dark btn-avaliable btn-avaliable-var">повідомити про наявність</a>
                                <?php } else { ?>
                                    <a href="#popup-notify-availability" data-product="<?php the_title() ?>" data-product_id="<?php the_id()  ?>" data-popup="open-popup" class="button-primary dark btn-avaliable">повідомити про наявність</a>
                                <?php } ?>

                                <button class="add_to_fav <?= is_favorite($product->get_id()) ?> product-actions__like" data-liked="<?= is_favorite($product->get_id()) ?>" data-user_id="<?= get_current_user_id() ?>" data-product_id="<?= $product->get_id() ?>"></button>

                            </div>

                            <?php if( $product->is_type('variable')){
                                woocommerce_template_single_add_to_cart();
                            }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__row">
                <div class="product__col-1">
                    <div class="product__description">
                        <h2 class="product__description-title title-2">
                            <?= __('опис', 'yos');?>
                        </h2>
                        <div class="product__description-text text-content last-no-margin">

                           <?= $product->get_description();?>
                        </div>
                    </div>
                </div>
                <div class="product__col-2">
                    <?php if($info):?>
                        <div class="product__features">
                            <ul class="product__spoller spoller" data-spoller>
                                <?php foreach ($info as $in):
                                    if($in['text']):?>
                                        <li>
                                            <div class="spoller__item-title <?= $in['open']?'active':'';?>" data-spoller-trigger>
                                                <?= $in['title'];?>
                                            </div>
                                            <div class="spoller__item-colapse-content" <?= $in['open']?'style="display: block;"':'';?>>
                                                <div class="text-content last-no-margin">
                                                    <?= $in['text'];?>
                                                </div>
                                            </div>
                                        </li>
                                <?php endif; endforeach;?>
                            </ul>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php woocommerce_output_related_products();?>

<?php if($image):?>
    <div class="top-space-60 top-space-md-150">
        <div class="image-full-width">
            <picture>
                <source srcset="<?= $image;?>" media="(min-width: 768px)" >
                <img  src="<?= $image_m;?>" alt="img">
            </picture>
        </div>
    </div>
<?php endif;?>

<?php comments_template() ?>

<?php if ($_GET) {?>

        <script>
            jQuery(document).ready(function($){
                <?php

                foreach ($_GET as $key=>$value) {
                    $name_get = substr($key, 0, 10);
                    $name = substr($key, 10);

                    if ('attribute_' !== $name_get)
                        continue
                ?>
                    $('[name="<?= $name ?>"]').prop('checked', false)
                    $('[name="<?= $name ?>"][value="<?= $value  ?>"]').prop('checked', true)
                <?php } ?>
            })
        </script>

<?php }?>

<?php get_template_part('parts/popups'); ?>
