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
                    <form action="<?= home_url( '/' ) ?>">
                        <div class="main-search__inner">
                            <input type="text" class="input" name="s" placeholder="<?= __('Що ви шукаєте?', 'yos');?>">
                            <button class="main-search__btn">
                                <span class="icon-search"></span>
                            </button>
                            <button type="button" class="main-search__btn-close">
                                <span class="icon-close-thin"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="header-actions__item">
                <div class="language">
                    <div class="language__current">
                        українська
                    </div>
                    <ul class="language__list">
                        <li>
                            <a href="#">english</a>
                        </li>
                    </ul>
                </div>
            </div>
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
        <form action="<?= home_url( '/' ) ?>">
            <div class="main-search__inner">
                <input type="text" class="input" name="s" placeholder="<?= __('Що ви шукаєте?', 'yos');?>">
                <button class="main-search__btn">
                    <span class="icon-search"></span>
                </button>
                <button type="button" class="main-search__btn-close">
                    <span class="icon-close-thin"></span>
                </button>
            </div>
        </form>
    </div>
</div>