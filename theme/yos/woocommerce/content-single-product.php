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

?>
<section class="product" data-product>
    <div class="container">
        <div class="product__body">
            <div class="product__row">
                <div class="product__col-1">
                    <?php woocommerce_breadcrumb();?>
                    <?php woocommerce_show_product_images();?>
                </div>
                <div class="product__col-2">
                    <div class="product__main-info product-main-info">
                        <?php if($brand):?>
                            <h2 class="product-main-info__title title-2"><?= $brand[0]->name;?></h2>
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
                                        $terms = $attribute->get_data()['options'];
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

                                                    <?php if ($i == 1) { ?>
                                                        <div class="product-actions__option-text stock" data-instock="<?= __('Є в наявності', 'yos');?>" data-outofstock="<?= __('Немає в наявності', 'yos');?>">
                                                            <?= $product->is_in_stock()?__('Є в наявності', 'yos'):__('Немає в наявності', 'yos');?>
                                                        </div>
                                                    <?php } ?>

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
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <g clip-path="url(#clip0_1014_6192)">
                                                                                <path
                                                                                    d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12Z"
                                                                                    fill="currentColor" />
                                                                                <path class="border"
                                                                                      d="M23.75 12C23.75 5.51065 18.4893 0.25 12 0.25C5.51065 0.25 0.25 5.51065 0.25 12C0.25 18.4893 5.51065 23.75 12 23.75C18.4893 23.75 23.75 18.4893 23.75 12Z"
                                                                                      fill="white" stroke="#121212" stroke-width="0.5" />
                                                                                <path
                                                                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                                    fill="currentColor" />
                                                                                <path class="line" d="M20 3.5L3.5 20" stroke="#6A6B6E" />
                                                                            </g>
                                                                            <defs>
                                                                                <clipPath id="clip0_1014_6192">
                                                                                    <rect width="24" height="24" fill="white" />
                                                                                </clipPath>
                                                                            </defs>
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
                                } else { ?>

                                <div class="product-actions__option-text stock" data-instock="<?= __('Є в наявності', 'yos');?>" data-outofstock="<?= __('Немає в наявності', 'yos');?>">
                                    <?= $product->is_in_stock()?__('Є в наявності', 'yos'):__('Немає в наявності', 'yos');?>
                                </div>

                            <?php } ?>


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
                                    $price = $product->display_price;
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
