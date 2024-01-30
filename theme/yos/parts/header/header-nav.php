<?php

$offer = get_field('offer', 'options');

if($offer):?>

    <a href="" class="top-offer" data-top-offer>
        <div class="top-offer__inner container">
            <div class="top-offer__text">
                <?= $offer;?>
            </div>
            <button class="top-offer__close" data-action="close-top-offer">
                <span class="icon-close"></span>
            </button>
        </div>
    </a>

<?php endif;?>

<div class="header__nav header-desk">
    <div class="header-desk__body container header-actions">
        <?php wp_nav_menu([
            'theme_location' => 'top-menu',
            'container' => false,
            'menu_class' => 'header-actions__left',
        ]);?>
        <div class="header-actions__logo">
            <a href="<?= get_home_url();?>">
                <?php $logo = get_field('logo', 'options');?>
                <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>">
            </a>
        </div>
        <div class="header-actions__right">
            <div class="header-actions__item">
                <button data-action="show-search-by-id" data-id="descktop-search">
                    <?= __('пошук', 'yos');?>
                </button>
                <div class="main-search" data-main-search data-id="descktop-search">
                    <?php echo do_shortcode('[fibosearch]'); ?>
<!--                    <form role="search" method="get" class="woocommerce-product-search" action="--><?php //echo esc_url( home_url( '/' ) ); ?><!--">-->
<!--                        <input type="hidden" name="post_type" value="product" />-->
<!--                        <div class="main-search__inner">-->
<!--                            <input type="search" id="woocommerce-product-search-field---><?php //echo isset( $index ) ? absint( $index ) : 0; ?><!--" class="search-field input" placeholder="--><?//= __('Що ви шукаєте?', 'yos');?><!--" value="--><?php //echo get_search_query(); ?><!--" name="s" />-->
<!--                            <button class="main-search__btn">-->
<!--                                <span class="icon-search"></span>-->
<!--                            </button>-->
<!--                            <button type="submit" value="--><?php //echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?><!--" class="--><?php //echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?><!-- main-search__btn-close"><span class="icon-close-thin"></span></button>-->
<!--                        </div>-->
<!--                    </form>-->
                </div>
            </div>
            <?php $languages = icl_get_languages('skip_missing=1');

            if(1 < count($languages)):?>

                <div class="header-actions__item">
                    <div class="language">
                        <?php foreach($languages as $l){

                            if($l['active']){
                                echo '<div class="language__current">'.$l['translated_name'].'</div>';
                            }
                        }?>
                        <ul class="language__list">
                            <?php foreach($languages as $l){

                                if(!$l['active']){
                                    echo '<li><a href="'.$l['url'].'">'.$l['translated_name'].'</a></li>';
                                }
                            }?>

                        </ul>
                    </div>
                </div>
            <?php endif;?>

            <div class="header-actions__item">
                <a href="#">
                    <?= __('кабінет', 'yos');?>
                </a>
            </div>
            <div class="header-actions__item">
                <button class="basket-count<?php if ( WC()->cart->is_empty() ){echo ' disable';}?>" data-action="open-side-basket"><?= WC()->cart->get_cart_contents_count();?></button>
            </div>
        </div>
    </div>
</div>

<div class="header__nav header-mob">
    <div class="header-mob__body container header-actions">
        <div class="header-actions__left">
            <div class="header-actions__item">
                <button data-action="open-mobile-menu">
                    <img class="img-svg" src="<?= get_template_directory_uri();?>/img/icons/burger.svg" alt="">
                </button>
            </div>
            <div class="header-actions__item">
                <button data-action="show-search-by-id" data-id="mob-search">
                    <img class="img-svg" src="<?= get_template_directory_uri();?>/img/icons/search.svg" alt="">
                </button>
            </div>
        </div>
        <div class="header-actions__logo">
            <a href="<?= get_home_url();?>">
                <?php $logo = get_field('logo', 'options');?>
                <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>">
            </a>
        </div>
        <div class="header-actions__right">
            <div class="header-actions__item">
                <a href="#">
                    <img class="img-svg" src="<?= get_template_directory_uri();?>/img/icons/user.svg" alt="">
                </a>
            </div>
            <div class="header-actions__item">
                <button class="basket-count<?php if ( WC()->cart->is_empty() ){echo ' disable';}?>" data-action="open-side-basket"><?= WC()->cart->get_cart_contents_count();?></button>
            </div>
        </div>
    </div>
    <div class="main-search" data-main-search data-id="mob-search">
        <?php echo do_shortcode('[fibosearch]'); ?>
    </div>
</div>