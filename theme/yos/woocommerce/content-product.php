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
//if($_COOKIE['wish']){
//
//    $arr = explode(',',$_COOKIE['wish']);
//
//    $wish = array_unique($arr);
//
//}

if ($product->is_type( 'variable' )) {
    $variations = ($product->get_available_variations());
    $variations_attr = ($product->get_variation_attributes());
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

$brand = get_the_terms(get_the_ID(), 'brand');

?>

<div class="product-card" data-product-card>
    <div class="product-card__head">
        <div class="product-card__labels">
        </div>
        <a href="<?php the_permalink();?>" class="product-card__img">
            <img src="<?php the_post_thumbnail_url();?>" alt="">
        </a>
        <button class="product-card__like-button active"></button>
    </div>
    <div class="product-card__body">
        <div class="product-card__title"><a href="<?= get_term_link($brand[0]->term_id);?>"><?= $brand[0]->name;?></a></div>
        <div class="product-card__text">
            <div class="product-card__text-1">
                <?php the_title();?>
            </div>
            <div class="product-card__text-2">
                Zo Skin Health Exfoliating Polish
            </div>
        </div>
        <?php if (isset($variations_attr['pa_volumes'])):
            $i=0;
            foreach ($variations as  $variation):?>
                <div class="product-card__price <?= $q==$i?'show':'';?>" data-index="<?= $i;?>">
                    <div class="product-card__price-current"><?= $variation['price_html'];?></div>
                </div>
            <?php $i++;
            endforeach; endif;?>
    </div>
    <div class="product-card__footer">
        <form>
            <?php if (isset($variations_attr['pa_volumes'])): ?>
                <div class="product-card__option">
                    <?php $p=0;
                    foreach ($variations as  $variation):

                        $sl = get_term_by('slug', $variation['attributes']['attribute_pa_volumes'] , 'pa_volumes');

                        ?>
                            <label class="product-card__option-item" data-vario="<?= $variation['variation_id'];?>" <?= $variation['is_in_stock']==0?'disabled':'';?>>
                                <input type="radio" name="card-id-1" <?= $q==$p?'checked':'';?> data-product-card-option data-index="<?= $p;?>">
                                <div class="product-card__option-item-value">
                                    <?= $sl->name;?>
                                </div>
                            </label>

                        <?php $p++; endforeach;
                    ?>
                </div>
            <?php endif;?>
            <button class="product-card__btn-to-basket button-primary dark w-100" data-product_id="<?= get_the_ID();?>">
                додати до кошика
            </button>
        </form>
    </div>
</div>
