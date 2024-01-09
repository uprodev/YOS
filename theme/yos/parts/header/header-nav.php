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
        <div class="header-actions__left">
            <div class="header-actions__item">
                <a href="#">каталог</a>
            </div>
            <div class="header-actions__item">
                <a href="#">запитання й відповіді</a>
            </div>
            <div class="header-actions__item">
                <a href="#">про нас</a>
            </div>
            <div class="header-actions__item">
                <a href="#">контакти</a>
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
                <a href="#popup-search" data-popup="open-popup">
                    <?= __('пошук', 'yos');?>
                </a>
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
                <a href="#popup-search" data-popup="open-popup">
                    <img class="img-svg" src="<?= get_template_directory_uri();?>/img/icons/search.svg" alt="">
                </a>
            </div>
        </div>
        <div class="header-actions__logo">
            <a href="#">
                <img src="<?= get_template_directory_uri();?>/img/logo/yos-main-logo.png" alt="">
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
</div>

<div class="header__categories container">
    <div class="categories" data-categories>
        <div class="categories__nav swiper" data-slider="header-mob-categories">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="0">
                    бренди
                </div>
                <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="1">
                    обличчя
                </div>
                <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="2">
                    волосся
                </div>
                <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="3">
                    <a href="#">тіло</a>
                </div>
                <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="4">
                    <a href="#">аксесуари</a>
                </div>
                <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="5">
                    <a href="#">набори</a>
                </div>
                <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="6">
                    <a href="#">health&care</a>
                </div>
                <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="7">
                    <a href="#">sale</a>
                </div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="categories__tab" data-category-tab data-index="0">
            <div class="categories__body container">
                <div class="categories__block">
                    <ul class="categories__list">
                        <li>
                            <a href="#" class="categories__list-title">бренди a — z</a>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">популярні бренди</a>

                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Medik8</a>
                                </li>
                                <li>
                                    <a href="#">ZO</a>
                                </li>
                                <li>
                                    <a href="#">Elemis</a>
                                </li>
                                <li>
                                    <a href="#">Hydrapeptide</a>
                                </li>
                                <li>
                                    <a href="#">Dermalogica</a>
                                </li>
                                <li>
                                    <a href="#">Rare Paris</a>
                                </li>
                                <li>
                                    <a href="#">Rated Green</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="categories__tab" data-category-tab data-index="1">
            <div class="categories__body container">

                <div class="categories__block">
                    <ul class="categories__list">
                        <li>
                            <a href="#" class="categories__list-title">Догляд за обличчям</a>

                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Очищення</a>
                                </li>
                                <li>
                                    <a href="#">Тонізація</a>
                                </li>
                                <li>
                                    <a href="#">Сироватки</a>
                                </li>
                                <li>
                                    <a href="#">Креми</a>
                                </li>
                                <li>
                                    <a href="#">Маски</a>
                                </li>
                                <li>
                                    <a href="#">Масло</a>
                                </li>
                                <li>
                                    <a href="#">Ексфоліанти</a>
                                </li>
                                <li>
                                    <a href="#">SPF</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="categories__block">
                    <ul class="categories__list">
                        <li>
                            <a href="#" class="categories__list-title">Область навколо очей</a>

                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Крема</a>
                                </li>
                                <li>
                                    <a href="#">Сироватки</a>
                                </li>
                                <li>
                                    <a href="#">Патчи</a>
                                </li>
                                <li>
                                    <a href="#">Гелі</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Шия та декольте</a>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Брови та вії</a>
                        </li>
                    </ul>
                </div>

                <div class="categories__block">
                    <ul class="categories__list">
                        <li>
                            <a href="#" class="categories__list-title">Догляд за обличчям</a>

                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Бальзами</a>
                                </li>
                                <li>
                                    <a href="#">Крема</a>
                                </li>
                                <li>
                                    <a href="#">Маски</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Автозасмага</a>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Спеціальні засоби</a>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Travel версії та мініатюри</a>
                        </li>
                    </ul>
                </div>

                <div class="categories__block">
                    <div class="category-offer-card">
                        <div class="category-offer-card__img ibg">
                            <img src="img/photo/offer-card.jpg" alt="">
                        </div>
                        <div class="category-offer-card__bottom">
                            <div class="category-offer-card__title">Догляд узимку</div>
                            <a href="#" class="button-link"><span>докладніше</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="categories__tab" data-category-tab data-index="2">
            <div class="categories__body container">

                <div class="categories__block">
                    <ul class="categories__list">
                        <li>
                            <a href="#" class="categories__list-title">Шампуні</a>
                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Термозахист</a>
                                </li>
                                <li>
                                    <a href="#">Масло</a>
                                </li>
                                <li>
                                    <a href="#">Крема</a>
                                </li>
                                <li>
                                    <a href="#">Ампули</a>
                                </li>
                                <li>
                                    <a href="#">Спреї</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Кондиціонери</a>
                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Термозахист</a>
                                </li>
                                <li>
                                    <a href="#">Масло</a>
                                </li>
                                <li>
                                    <a href="#">Крема</a>
                                </li>
                                <li>
                                    <a href="#">Ампули</a>
                                </li>
                                <li>
                                    <a href="#">Спреї</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Маски</a>
                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Термозахист</a>
                                </li>
                                <li>
                                    <a href="#">Масло</a>
                                </li>
                                <li>
                                    <a href="#">Крема</a>
                                </li>
                                <li>
                                    <a href="#">Ампули</a>
                                </li>
                                <li>
                                    <a href="#">Спреї</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Брови та вії</a>
                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Термозахист</a>
                                </li>
                                <li>
                                    <a href="#">Масло</a>
                                </li>
                                <li>
                                    <a href="#">Крема</a>
                                </li>
                                <li>
                                    <a href="#">Ампули</a>
                                </li>
                                <li>
                                    <a href="#">Спреї</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="categories__block">
                    <ul class="categories__list">
                        <li>
                            <a href="#" class="categories__list-title">Незмивний догляд</a>

                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Термозахист</a>
                                </li>
                                <li>
                                    <a href="#">Масло</a>
                                </li>
                                <li>
                                    <a href="#">Крема</a>
                                </li>
                                <li>
                                    <a href="#">Ампули</a>
                                </li>
                                <li>
                                    <a href="#">Спреї</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="categories__block">
                    <ul class="categories__list">
                        <li>
                            <a href="#" class="categories__list-title">Догляд за шкірою голови</a>

                            <ul class="categories__sublist">
                                <li>
                                    <a href="#">Скраби та пілінги</a>
                                </li>
                                <li>
                                    <a href="#">Маска для шкіри голови</a>
                                </li>
                                <li>
                                    <a href="#">Спрей</a>
                                </li>
                                <li>
                                    <a href="#">Лосьон</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="categories__block">
                    <ul class="categories__list">
                        <li>
                            <a href="#" class="categories__list-title">Сухі шампуні</a>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Стайлінг</a>
                        </li>
                        <li>
                            <a href="#" class="categories__list-title">Travel версії та мініатюри</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>