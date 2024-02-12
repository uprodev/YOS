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

//    print_r($variations);
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

?>

<div class="product-card<?= $product->is_in_stock()?'':' product-card--not-in-stock';?>"  data-product-card>
    <div class="product-card__head">
        <div class="product-card__labels">

            <?php if ($product->is_type('variable')):
                if ( $product->is_on_sale() ) :
                    $v=0;
                    foreach ($variations as  $variation):

                        $price = $variation['display_regular_price'];
                        $sale = $variation['display_price'];

                        $perc = round(($price-$sale)*100/$price);
                            if($perc!=0):?>

                        <div class="product-card-label product-card-label-perc<?= $q==$v?' show':'';?>" data-index="<?= $v;?>">-<?= $perc;?>%</div>

                    <?php endif; $v++; endforeach;

                endif;

            elseif($product->is_type('simple')):

                if ( $product->is_on_sale() ) :
                    $price = $product->display_price;
                    $sale = $product->sale_price;

                    $perc = round(($price-$sale)*100/$price);?>

                    <div class="product-card-label">-<?= $perc;?>%</div>

                <?php endif;

            endif;?>

            <?= $choise?'<div class="product-card-label">'.__('YOS choice', 'yos').'</div>':'';?>
        </div>
        <a href="<?php the_permalink();?>" class="product-card__img">
            <img src="<?php the_post_thumbnail_url();?>" alt="<?= strip_tags(get_the_title());?>">
        </a>

        <button class="add_to_fav <?= is_favorite($product->get_id()) ?> product-card__like-button" data-liked="<?= is_favorite($product->get_id()) ?>" data-user_id="<?= get_current_user_id() ?>" data-product_id="<?= $product->get_id() ?>"></button>
    </div>
    <div class="product-card__body">
        <?php if($brand):?>
            <div class="product-card__title"><a href="<?= get_term_link($brand[0]->term_id);?>"><?= $brand[0]->name;?></a></div>
        <?php endif;?>
        <div class="product-card__text">
            <div class="product-card__text-1">
                <?php the_title();?>
            </div>
            <?php if(get_field('seria')):?>
                <div class="product-card__text-2">
                    <?php the_field('seria');?>
                </div>
            <?php endif;?>
        </div>
        <?php if ($product->is_type('variable')):
            if (isset($variations_attr['pa_volumes'])):
                $i=0;
                foreach ($variations as  $variation):?>
                    <div class="product-card__price <?= $q==$i?'show':'';?>" data-index="<?= $i;?>">
                        <div class="product-card__price-current"><?= $variation['price_html'];?></div>
                    </div>
                <?php $i++;
                endforeach;
            endif;
        elseif($product->is_type('simple')):?>
            <div class="product-card__price show">
                <div class="product-card__price-current"><?php woocommerce_template_loop_price();?></div>
            </div>
        <?php endif;?>
    </div>
    <?php if($product->is_in_stock()):?>

        <div class="product-card__footer">
            <form>
                <?php if ($product->is_type('variable')):
                    if (isset($variations_attr['pa_volumes'])): ?>
                        <div class="product-card__option">
                            <?php $p=0;
                            foreach ($variations as  $variation):

                                $sl = get_term_by('slug', $variation['attributes']['attribute_pa_volumes'] , 'pa_volumes');

                                ?>
                                    <label class="product-card__option-item <?= $q==$p?'show-variation':'';?>" data-ind="<?= $p;?>" data-vario="<?= $variation['variation_id'];?>" <?= $variation['is_in_stock']==0?'disabled':'';?>>
                                        <input type="radio" name="card-id-1" <?= $q==$p?'checked':'';?> data-product-card-option data-index="<?= $p;?>">
                                        <div class="product-card__option-item-value">
                                            <?= $sl->name;?>
                                        </div>
                                    </label>

                                <?php $p++; endforeach;
                            ?>
                        </div>
                    <?php endif;
                endif;?>
                <?php if ($product->is_type('variable')):
                    $h=0;
                    foreach ($variations as  $variation):
                        if($h==$q):?>
                        <input type="hidden" value="<?= $variation['variation_id'];?>" name="var_id">
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
            <a href="#popup-notify-availability" data-popup="open-popup" class="button-primary dark"><?= __('повідомити про наявність', 'yos');?></a>
        </div>

    <?php endif;?>

</div>
