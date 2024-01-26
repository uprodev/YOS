<div class="mobile-menu" data-mobile-menu>
    <div class="mobile-menu__inner container">

        <div class="mobile-menu__head header-actions">
            <div class="header-actions__left">
                <div class="header-actions__item">
                    <button data-action="show-search-by-id" data-id="mobile-menu-search">
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
                    <button class="mobile-menu__close" data-action="close-mobile-menu">
                        <span class="icon-close-thin"></span>
                    </button>
                </div>
            </div>

            <div class="main-search" data-main-search data-id="mobile-menu-search">
                <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="hidden" name="post_type" value="product" />
                    <div class="main-search__inner">
                        <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field input" placeholder="<?= __('Що ви шукаєте?', 'yos');?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <button class="main-search__btn">
                            <span class="icon-search"></span>
                        </button>
                        <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" class="<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?> main-search__btn-close"><span class="icon-close-thin"></span></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mobile-menu__body">
            <div class="mobile-menu__main-layer">
                <div class="mobile-menu__row">
                    <ul class="mobile-menu__list">
                        <li><a href="#">бренди</a></li>
                        <li><button data-action="show-layer-by-id" data-id="layer-2">обличчя</button></li>
                        <li><button data-action="show-layer-by-id" data-id="layer-3">волосся</button></li>
                        <li><button data-action="show-layer-by-id" data-id="layer-4">тіло</button></li>
                        <li><button data-action="show-layer-by-id" data-id="layer-5">аксесуари</button></li>
                        <li><a href="#">набори</a></li>
                        <li><button data-action="show-layer-by-id" data-id="layer-6">wellness</button></li>
                        <li class="text-color-warning"><a href="#">sale</a></li>
                    </ul>
                </div>
                <div class="mobile-menu__row">
                    <ul class="mobile-menu__list text-color-secondary">
                        <li><a href="#">запитання й відповіді</a></li>
                        <li><a href="#">про нас</a></li>
                        <li><a href="#">контакти</a></li>
                    </ul>

                    <div class="mobile-menu__language">
                        <div class="mobile-menu__title" data-collapse="language">мова</div>
                        <!--
                                Атрибут "data-collapse" скрывает следующий лемент, который ниже.
                            -->
                        <ul class="mobile-menu__list" data-collapse-target="language">
                            <li><a href="#" class="active">Українська</a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-menu__layer" data-layer="layer-2">
                <button class="mobile-menu__layer-title" data-action="hide-layer">обличчя</button>
                <ul class="mobile-menu__list">
                    <li>
                        <a href="#" class="mobile-menu__list-title">Догляд за обличчям</a>

                        <ul class="mobile-menu__sublist">
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
                    <li>
                        <a href="#" class="mobile-menu__list-title">Область навколо очей</a>
                        <ul class="mobile-menu__sublist">
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
                        <a href="#" class="mobile-menu__list-title">Шия та декольте</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Брови та вії</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Губи</a>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu__layer" data-layer="layer-3">
                <button class="mobile-menu__layer-title" data-action="hide-layer">волосся</button>
                <ul class="mobile-menu__list">
                    <li>
                        <a href="#" class="mobile-menu__list-title">Шампуні</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Кондиціонери</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Маски</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Незмивний догляд</a>

                        <ul class="mobile-menu__sublist">
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
                        <a href="#" class="mobile-menu__list-title">Догляд за шкірою голови</a>

                        <ul class="mobile-menu__sublist">
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
                            <li>
                                <a href="#">Travel версії та мініатюри</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Сухі шампуні</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Стайлінг</a>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu__layer" data-layer="layer-4">
                <button class="mobile-menu__layer-title" data-action="hide-layer">тіло</button>
                <ul class="mobile-menu__list">
                    <li>
                        <a href="#" class="mobile-menu__list-title">Очищення</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Зволоження</a>
                        <ul class="mobile-menu__sublist">
                            <li>
                                <a href="#">Крем</a>
                            </li>
                            <li>
                                <a href="#">Лосьон</a>
                            </li>
                            <li>
                                <a href="#">Масло</a>
                            </li>
                            <li>
                                <a href="#">Батер</a>
                            </li>
                            <li>
                                <a href="#">Спреї</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Скраби та пілінги</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Для ванн</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Для рук</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Для ніг</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Дезодоранти</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">SPF та автозасмага</a>
                    </li>
                    <li>
                        <a href="#">Зубні пасти</a>
                    </li>
                    <li>
                        <a href="#">Ополіскувачі</a>
                    </li>
                    <li>
                        <a href="#">Спрей</a>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu__layer" data-layer="layer-5">
                <button class="mobile-menu__layer-title" data-action="hide-layer">аксесуари</button>
                <ul class="mobile-menu__list">
                    <li>
                        <a href="#" class="mobile-menu__list-title">Косметички</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Для лица</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Для волос</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Для тела</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Бьюти-гаджеты</a>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu__layer" data-layer="layer-6">
                <button class="mobile-menu__layer-title" data-action="hide-layer">health&care</button>
                <ul class="mobile-menu__list">
                    <li>
                        <a href="#" class="mobile-menu__list-title">Харчові добавки</a>
                    </li>
                    <li>
                        <a href="#" class="mobile-menu__list-title">Догляд за ротовою порожниною</a>
                        <ul class="mobile-menu__sublist">
                            <li>
                                <a href="#">Зубна щітка</a>
                            </li>
                            <li>
                                <a href="#">Зубна нитка</a>
                            </li>
                            <li>
                                <a href="#">Пасти та гелі</a>
                            </li>
                            <li>
                                <a href="#">Ополіскувач для порожнини рота</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mobile-menu__footer">
            <!--
                Кабинет пока не делаем, этот елемент сделан на будущее
            -->
            <div class="mobile-menu__title">кабінет</div>

            <div class="mobile-menu__cabinet-buttons">
                <a href="#" class="button-primary dark w-100">увійти</a>
                <a href="#" class="button-primary light w-100">зареєструватися</a>
            </div>
        </div>
    </div>
</div>