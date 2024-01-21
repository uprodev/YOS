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
    $default_attributes = get_field('_default_attributes' );
    $variations_attr = ($product->get_variation_attributes());
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
                        <h2 class="product-main-info__title title-2"><?= $brand[0]->name;?></h2>
                        <?php woocommerce_template_single_title();?>
                        <?php if(get_field('seria')):?>
                            <div class="product-main-info__text mt-0"><?php the_field('seria');?></div>
                        <?php endif;?>
                        <?php if( $product->get_sku()):?>
                            <div class="product-main-info__articul"><?= __('Артикул:', 'yos');?> <?= $product->get_sku(); ?></div>
                        <?php endif;?>
                        <div class="product-actions">

                            <?php woocommerce_template_single_rating();?>

                            <?php if ( !empty($variations_attr['pa_volumes'])):?>
                                <div class="product-actions__option">
                                    <div class="product-actions__option-head">
                                        <div class="product-actions__option-title"><?= __('Виберіть об’єм:', 'yos');?></div>

                                        <div class="product-actions__option-text stock">
                                            <?= $product->is_in_stock()?__('Є в наявності', 'yos'):__('Немає в наявності', 'yos');?>
                                        </div>
                                    </div>
                                    <div class="product-actions__option-items">
                                        <?php foreach ($variations as  $variation) {
                                            $volumes[] = $variation['attributes']['attribute_pa_volumes'];
                                        }

                                        $volumes = array_unique($volumes);

                                        if ($volumes):
                                            foreach ($volumes as $variation):
                                                $volume = get_term_by('slug', $variation , 'pa_volumes');?>

                                                <div class="product-actions__option-item volume-item" data-volumes="<?= $volume->slug ?>" >
                                                    <label class="product-option">
                                                        <input type="radio" name="volume" <?= $default_attributes['pa_volumes'] == $volume->slug ? 'checked' : '' ?>>
                                                        <div class="product-option__value">
                                                            <?= $volume->name ?>
                                                        </div>
                                                    </label>
                                                </div>
                                            <?php endforeach;
                                        endif;?>
                                    </div>
                                </div>
                            <?php endif;?>
                            <?php if (!empty($variations_attr['pa_color'])):?>
                                <div class="product-actions__option colors">
                                <div class="product-actions__option-head">
                                    <div class="product-actions__option-title"><?= __('Виберіть колір:', 'yos');?></div>
                                    <div class="product-actions__option-text">
                                        They Met In Argentina
                                    </div>
                                </div>
                                <div class="product-actions__option-items">
                                    <?php foreach ($variations as  $variation) {
                                        $colors[] = $variation['attributes']['attribute_pa_color'];
                                    }

                                    $colors = array_unique($colors);

                                    if ($colors){
                                        foreach ($colors as  $variation) {
                                            $color = get_term_by('slug', $variation , 'pa_color');

                                            $c = get_field('color', 'pa_color_'.$color->term_id);

                                            if($c):?>

                                            <div class="product-actions__option-item color-item" data-color="<?= $color->slug ?>">
                                                <label class="product-option-color" style="color: <?= $c;?>" <?= $default_attributes['pa_color'] == $color->slug ? 'checked' : '' ?>>
                                                    <input type="radio" name="color">
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
                                                </label>
                                            </div>

                                        <?php endif; }

                                    }?>
                                </div>
                            </div>
                            <?php endif;?>

                            <div class="product-actions__price">
                                <div class="product-actions__price-row">
                                    <div class="product-actions__price-current">1 995 ₴</div>
                                </div>
                                <div class="product-actions__price-row">
                                    <div class="product-actions__price-old">4 999 ₴</div>
                                    <div class="product-actions__price-profit">-34%</div>
                                </div>
                            </div>

                            <?php if($consultation):?>
                                <div class="product-actions__have-a-consultation">
                                    <div class="product-main-info__text">
                                        <?php the_field('consultation_text');?>
                                    </div>
                                    <label class="checkbox-radio">
                                        <input type="checkbox" name="consultation"
                                               data-action="toggle-button-as-disabled-by-id" data-id="add-to-basket">
                                        <div class="checkbox-radio__square"></div>
                                        <div class="checkbox-radio__text"><?php the_field('consultation_input_text');?></div>
                                    </label>
                                </div>
                            <?php endif;?>

                            <div class="product-actions__footer">
                                <button <?= $consultation?'disabled':'';?> data-target="toggle-button-as-disabled-by-id" data-id="add-to-basket" class="product-actions__buy button-primary dark add-cart" data-product_id="<?= get_the_ID();?>"><?= __('додати до кошика', 'yos');?></button>
                                <button class="product-actions__like"></button>
                                <!-- class="product-actions__like active" -->

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
                            <h3 class="mb-0"><?= $brand[0]->name;?></h3>
                            <p class="text-4 mt-1"><?= get_field('seria')?get_field('seria').' — ':'';?><?php the_title();?></p>
                            <?= $product->get_description();?>
                        </div>
                    </div>
                </div>
                <div class="product__col-2">
                    <?php if($info):?>
                        <div class="product__features">
                            <ul class="product__spoller spoller" data-spoller>
                                <?php foreach ($info as $in):?>
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
                                <?php endforeach;?>
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

<div class="top-space-60 top-space-md-150">
    <section class="product-reviews" id="reviews">
        <div class="container">
            <div class="product-reviews__inner">
                <div class="product-reviews__head">
                    <h2 class="product-reviews__title title-2">
                        відгуки покупців

                        <span>(2)</span>
                    </h2>
                    <div class="product-reviews__main-stars">
                        <div class="product-reviews__main-stars-row">
                            <div class="rating" data-rating="3.5">
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
                                    <div class="rating__star">
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
                            <div class="product-reviews__main-stars-value">
                                3.5
                            </div>
                        </div>
                        <div class="product-reviews__main-stars-row">
                            <div class="product-reviews__count">24 відгуки</div>
                        </div>
                    </div>
                    <div class="product-reviews__chart reviews-chart">
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                5 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: 80%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                4 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: 40%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                3 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: 0%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                2 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: 20%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                1 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-reviews__body">
                    <div class="product-reviews__add-comment">
                        <button class="product-reviews__add-comment-mobile-btn button-primary light"
                                data-action="opne-add-comment">
                            написати
                            відгук
                        </button>
                        <div class="add-comment" data-add-comment>
                            <button class="add-comment__btn-close" data-action="close-add-comment">
                                <span class="icon-close-thin"></span>
                            </button>
                            <div class="add-comment__scroll-container">
                                <div class="add-comment__title">
                                    ви можете залишити відгук або
                                    поставити питання
                                </div>
                                <div class="add-comment__subtitle">
                                    <div class="add-comment__text">
                                        Ви можете залишити відгук або поставити
                                        питання. Використовуйте цю форму для того, щоб
                                        залишити відгук про товар або поставити
                                        питання. Усі відгуки, які не стосуються товару,
                                        будуть видалені!
                                    </div>
                                    <div class="add-comment__text-sm">
                                        * залиште свій email, і ми надішлемо сповіщення одразу
                                        після того, як фахівець дасть відповідь на ваше
                                        запитання.
                                    </div>
                                </div>
                                <form action="/" class="add-comment__form">
                                    <div class="add-comment__form-fields">
                                        <div class="add-comment__form-field half-lg">
                                            <div class="input-wrap" data-input>


                                                <input type="text" class="input" required>
                                                <span class="input-label">Ім’я</span>

                                            </div>
                                        </div>
                                        <div class="add-comment__form-field half-lg">
                                            <div class="input-wrap" data-input>

                                                <input type="email" class="input" >
                                                <span class="input-label">Електронна адреса</span>


                                            </div>
                                        </div>
                                        <div class="add-comment__form-field">
                                            <div class="textarea-wrap" data-textarea>
                                                <textarea class="textarea"></textarea>
                                                <span class="textarea-label">Текст повідомлення</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-comment__form-stars">
                                        <div>Оцінка</div>
                                        <div class="set-stars" data-set-stars>
                                            <div class="set-stars__item">
                                                1
                                            </div>
                                            <div class="set-stars__item">
                                                2
                                            </div>
                                            <div class="set-stars__item">
                                                3
                                            </div>
                                            <div class="set-stars__item">
                                                4
                                            </div>
                                            <div class="set-stars__item">
                                                5
                                            </div>
                                            <input type="text" value="0">
                                        </div>
                                    </div>
                                    <div class="add-comment__form-footer">
                                        <button class="button-primary dark">написати відгук</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-reviews__comments">
                        <div class="product-comments">
                            <div class="product-comments__list">
                                <div class="comment">
                                    <div class="comment__head">
                                        <div class="comment__author-name">
                                            катерина
                                        </div>
                                        <div class="comment__author-status">
                                            Покупку підтверджено
                                        </div>
                                        <div class="comment__author-set-stars">
                                            <div class="rating" data-rating="5">
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
                                                    <div class="rating__star">
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
                                    </div>
                                    <div class="comment__body">
                                        <div class="comment__text">
                                            Брала відтінок Трансільванія, боялась, що буде надто віддавати фіолетовим, але
                                            все добре. Помада матова, приємна при нанесені, але запах мені не зрозумілий
                                            (кожному своє). Стійкість відносна, якщо не куштувати нічого при носці, або
                                            робити це з обережністю, то все добре. Мій відтінок наноситься чудово, зразу,
                                            без
                                            «комків» та потреби нашаровування
                                        </div>
                                        <div class="comment__footer">
                                            <div class="comment__date">
                                                30 листопада 2022
                                            </div>
                                            <button class="button-link comment__reply-btn"><span>відповісти</span></button>
                                        </div>
                                        <div class="comment__subcomments">
                                            <div class="comment">
                                                <div class="comment__head">
                                                    <div class="comment__author-name">
                                                        <img src="img/logo/yos-short-logo.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="comment__body">
                                                    <div class="comment__text">
                                                        КАТЕРИНА, в реальності кольори товарів
                                                        можуть відрізнятися від тих, які Ви
                                                        бачите на екрані - це залежить від
                                                        індивідуальних налаштувань Вашого
                                                        монітора. Також виробник продукції
                                                        залишає за собою право змінювати
                                                        комплектацію, технічні характеристики,
                                                        кольорову гаму товарів і т. Д. Без
                                                        попереднього повідомлення, тому партія
                                                        від партії може відрізнятись.
                                                    </div>
                                                    <div class="comment__footer">
                                                        <div class="comment__date">
                                                            30 листопада 2022
                                                        </div>
                                                        <button
                                                                class="button-link comment__reply-btn"><span>відповісти</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment">
                                                <div class="comment__head">
                                                    <div class="comment__author-name">
                                                        аліса
                                                    </div>
                                                </div>
                                                <div class="comment__body">
                                                    <div class="comment__text">
                                                        Екатерина, мабуть віддінки олівців nude
                                                        beige i nude truffle? Дуже гарний макіяж
                                                        губ!)
                                                    </div>
                                                    <div class="comment__footer">
                                                        <div class="comment__date">
                                                            31 листопада 2022
                                                        </div>
                                                        <button
                                                                class="button-link comment__reply-btn"><span>відповісти</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment">
                                    <div class="comment__head">
                                        <div class="comment__author-name">інна</div>
                                        <div class="comment__author-set-stars">
                                            <div class="rating" data-rating="3">
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
                                                    <div class="rating__star">
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
                                    </div>
                                    <div class="comment__body">
                                        <div class="comment__text">
                                            34 - Dubai
                                            Фотографією точчний відтінок важко передати, але, можливо, комусь буде
                                            корисно для приблизного розуміння.
                                            На губах приємна, майже не відчувається. Стійкість середня, але для мене це не
                                            проблема. Замовляла заради гарного кольору.
                                        </div>
                                        <div class="comment__footer">
                                            <div class="comment__date">
                                                29 жовтня 2022
                                            </div>
                                            <button class="button-link comment__reply-btn"><span>відповісти</span></button>
                                        </div>
                                        <div class="comment__subcomments">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-comments__footer">
                                <div class="pagination">
                                    <a href="#" class="button-link"><span>завантажити ще</span></a>
                                    <div class="pagination__fraction">01/13</div>
                                    <a href="#" class="pagination__btn left disabled"><span class="icon-arrow-left"></span></a>
                                    <a href="#" class="pagination__btn right"><span class="icon-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



