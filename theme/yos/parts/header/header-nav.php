<?php

$offer = get_field('offer', 'options');

if($offer && !is_checkout()):

//    if(!$_COOKIE['Modal']):
        ?>

        <div class="top-offer" data-top-offer>
            <div class="top-offer__inner container">
                <div class="top-offer__text">
                    <?= $offer;?>
                </div>
                <button class="top-offer__close" data-action="close-top-offer">
                    <span class="icon-close"></span>
                </button>
            </div>
        </div>

    <?php
//

endif;?>

<div class="header__nav header-desk">
    <div class="header-desk__body container header-actions">
        <?php if (is_checkout()):?>
            <div class="header-actions__item">
                <a href="#" onclick="javascript:history.back(-1); return false;" class="chevron-left"><?= __('назад', 'yos');?></a>
            </div>
        <?php else:
            wp_nav_menu([
                'theme_location' => 'top-menu',
                'container' => false,
                'menu_class' => 'header-actions__left',
            ]);
        endif;?>
        <div class="header-actions__logo">
            <a href="<?= get_home_url();?>">
                <?php $logo = get_field('logo', 'options');?>
                <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>">
            </a>
        </div>
        <div class="header-actions__right">
            <?php if (!is_checkout()):?>
                <div class="header-actions__item">
                    <button data-action="show-search-by-id" data-id="descktop-search">
                        <?= __('пошук', 'yos');?>
                    </button>
                    <div class="main-search" data-main-search data-id="descktop-search">
                        <?php echo do_shortcode('[fibosearch]'); ?>
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

<!--                <div class="header-actions__item">-->
<!--                    <a href="#">-->
<!--                       //= __('кабінет', 'yos');?>-->
<!--                    </a>-->
<!--                </div>-->
                <div class="header-actions__item<?php if (is_cart() || is_checkout()){echo ' disable';}?>">
                    <button class="basket-count" data-action="open-side-basket"><?= WC()->cart->get_cart_contents_count();?></button>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>

<div class="header__nav header-mob">
    <div class="header-mob__body container header-actions">
        <div class="header-actions__left">
            <?php if(is_checkout()):?>
                <div class="header-actions__item">
                    <a onclick="javascript:history.back(-1); return false;" class="chevron-left"></a>
                </div>
            <?php else:?>
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
            <?php endif;?>
        </div>
        <div class="header-actions__logo">
            <a href="<?= get_home_url();?>">
                <?php $logo = get_field('logo', 'options');?>
                <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>">
            </a>
        </div>
        <div class="header-actions__right">
            <?php if(!is_checkout()):?>
<!--                <div class="header-actions__item">-->
<!--                    <a href="#">-->
<!--                        <img class="img-svg" src="//= get_template_directory_uri();/img/icons/user.svg" alt="">-->
<!--                    </a>-->
<!--                </div>-->
                <div class="header-actions__item<?php if (is_cart() || is_checkout()){echo ' disable';}?>">
                    <button class="basket-count" data-action="open-side-basket"><?= WC()->cart->get_cart_contents_count();?></button>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="main-search" data-main-search data-id="mob-search">
        <?php echo do_shortcode('[fibosearch]'); ?>
    </div>
</div>
