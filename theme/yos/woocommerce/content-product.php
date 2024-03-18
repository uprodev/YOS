    <?php
    /**
     * The template for displaying product content within loops
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

    // Ensure visibility.
    if ( empty( $product ) || ! $product->is_visible() ) {
        return;
    }
    if($_COOKIE['wish']){

        $arr = explode(',',$_COOKIE['wish']);

        $wish = array_unique($arr);

    }

    if ($product->is_type( 'variable' )) {
        $variations = ($product->get_available_variations());
        $variations_attr = ($product->get_variation_attributes());
        $default_attributes = $product->get_default_attributes();

        $prefixed_slugs = array_map( function( $pa_name ) {
            return 'attribute_'. $pa_name;
        }, array_keys( $default_attributes ) );
        $default_attributes_var = array_combine( $prefixed_slugs, $default_attributes );
        $variations_json = wp_json_encode( $variations );
        $variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
        $data_store   = new WC_Product_Data_Store_CPT();
        $variation_id = $data_store->find_matching_product_variation(
            new WC_Product( get_the_ID()),$default_attributes_var
        );
        if ($variation_id)
            $default_variation = new WC_Product_Variation($variation_id);


    }

    if (isset($variations_attr['pa_volumes'])){
        $q = 0;
        foreach ($variations as  $variation){
            if($variation['is_in_stock'] == 1){
                break;
            }
            $q++;
        }
    }

    $brand = get_the_terms(get_the_ID(), 'pa_brand');
    $choise = get_field('yos_choise', get_the_ID());

    $average = $product->get_average_rating();
    ?>

    <div class="product-card<?= $product->is_in_stock()?'':' product-card--not-in-stock';?>"  data-product-card>
        <div class="product-card__head">
            <div class="product-card__labels">

                <?php if ($product->is_type('variable')):
                    if ( $default_variation &&  $default_variation->is_on_sale() ) :


                        $price = $default_variation->regular_price;
                        $sale = $default_variation  ->sale_price;

                        $perc = round(($price-$sale)*100/$price); ?>

                            <div class="product-card-label product-card-label-perc <?= $perc > 0 ? 'show' : '' ?>"  >-<?= $perc;?>%</div>

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

                <?= $choise?'<div class="product-card-label product-card-label--secondary">'.__('YOS choice', 'yos').'</div>':'';?>
            </div>
            <a href="<?php the_permalink();?>" class="product-card__img">
                <img src="<?php the_post_thumbnail_url();?>" alt="<?= strip_tags(get_the_title());?>">
            </a>

            <button class="add_to_fav <?= is_favorite($product->get_id()) ?> product-card__like-button" data-liked="<?= is_favorite($product->get_id()) ?>" data-user_id="<?= get_current_user_id() ?>" data-product_id="<?= $product->get_id() ?>"></button>
        </div>
        <div class="product-card__body">
            <div class="product-card__rating">
                <div class="rating" style="--value:<?= $average;?>">
                    <div class="rating__stars rating__stars-1">
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                    </div>
                    <div class="rating__stars rating__stars-2">
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                        <div class="rating__    star">
                            <span class="icon-star"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($brand):?>
                <div class="product-card__title"><a href="<?php the_permalink();?>"><?= $brand[0]->name;?></a></div>
            <?php endif;?>
            <div class="product-card__text">
                <div class="product-card__text-1">
                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                </div>
                <?php if(get_field('seria')):?>
                    <div class="product-card__text-2">
                        <a href="<?php the_permalink();?>"><?php the_field('seria');?></a>
                    </div>
                <?php endif;?>
            </div>
            <?php if ($product->is_type('variable')): ?>

                    <div class="product-card__price <?= $q==$i?'show':'';?>" data-index="<?= $i;?>">
                        <div class="product-card__price-current">

                            <?php


                            if($default_variation && $default_variation->get_price_html())
                                echo $default_variation->get_price_html();
                            else
                                woocommerce_template_loop_price()
                            ?></div>
                    </div>


                <?php
                endif;
            if ($product->is_type('simple')):?>
                <div class="product-card__price show">
                    <div class="product-card__price-current"><?php woocommerce_template_loop_price();?></div>
                </div>
            <?php endif;?>
        </div>
        <?php if($product->is_in_stock()):?>

            <div class="product-card__footer">
                <form class="loop-variation" data-product_id="<?php the_id() ?>" data-variations="<?= esc_html($variations_attr) ?>">
                    <?php
                    if ($product->is_type('variable')):

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

                                                <?php if ($is_color) { ?>
                                                    <div class="product-actions__option-text color-label"></div>
                                                <?php } else { ?>

                                                    <?=  get_term_by('slug', $default_attributes[$attribute_name], $attribute_name)->name ?>
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

                                                        <div class="product-actions__option-item var-item <?= $is_color ? 'color' : 'volume' ?>-item" data-<?= $is_color ? 'color' : 'volumes' ?>="<?= $term->slug ?>" >
                                                            <label class="product-option<?= $is_color ? '-color' : '' ?>" style="color: <?= $c;?>">
                                                                <input data-label="<?= $term->name ?>" type="radio" name="attribute_<?= $term->taxonomy ?>" <?= $variation && $count != 1 ? ($default_attributes[$term->taxonomy] == $term->slug ? 'checked' : '') : 'checked' ?> value="<?= $term->slug ?>">
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
                                    }

                            }
                        }


                    endif;?>
                    <?php if ($product->is_type('variable')):
                        $h=0;
                        foreach ($variations as  $variation):
                            if($h==$q):?>
                                <input type="hidden" value="<?= $variation['variation_id'];?>">
                            <?php endif;
                            $h++; endforeach;
                    endif;?>
                    <button class="product-card__btn-to-basket button-primary dark w-100 add-cart" data-variation_id="" data-product_id="<?= get_the_ID();?>">
                        <?= __('додати до кошика', 'yos');?>
                    </button>
                </form>


            </div>

        <?php else:?>

            <div class="product-card__footer">
                <a href="#popup-notify-availability" data-product="<?php the_title() ?>" data-product_id="<?php the_id()  ?>" data-popup="open-popup" class="button-primary dark btn-avaliable">повідомити про наявність</a>
            </div>

        <?php endif;?>

    </div>
