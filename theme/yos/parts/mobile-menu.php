<div class="mobile-menu" data-mobile-menu>
    <div class="mobile-menu__inner container">

        <div class="mobile-menu__head header-actions">
            <div class="header-actions__left">
                <div class="header-actions__item">
                    <a href="#popup-search" data-popup="open-popup">
                        <span class="icon-search"></span>
                    </a>
                </div>
            </div>
            <div class="header-actions__logo">
                <a href="#">
                    <img src="img/logo/yos-main-logo.png" alt="">
                </a>
            </div>
            <div class="header-actions__right">
                <div class="header-actions__item">
                    <button class="mobile-menu__close" data-action="close-mobile-menu">
                        <span class="icon-close-thin"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="mobile-menu__body">
            <div class="mobile-menu__row">
                <a href="#" class="mobile-menu__title">каталог</a>
                <ul class="mobile-menu__list">
                    <li><a href="#">запитання й відповіді</a></li>
                    <li><a href="#">про нас</a></li>
                    <li><a href="#">контакти</a></li>
                </ul>
            </div>
            <div class="mobile-menu__row">
                <div class="mobile-menu__title" data-collapse="language">мова</div>
                <!--
                        Атрибут "data-collapse" скрывает следующий лемент, который ниже.
                    -->
                <ul class="mobile-menu__list" data-collapse-target="language">
                    <li><a href="#" class="active">Українська</a></li>
                    <li><a href="#">English</a></li>
                </ul>
                <ul class="mobile-menu__list">
                    <li><a href="#">онлайн допомога</a></li>
                </ul>
            </div>
            <div class="mobile-menu__row">
                <a href="#" class="mobile-menu__title">новинки та акції</a>
            </div>
        </div>

        <div class="mobile-menu__footer">
            <!--
                Кабинет пока не делаем, этот елемент сделан на будущее
            -->
<!--            <div class="mobile-menu__title">кабінет</div>-->
<!---->
<!--            <div class="mobile-menu__cabinet-buttons">-->
<!--                <a href="#" class="button-primary dark w-100">увійти</a>-->
<!--                <a href="#" class="button-primary light w-100">зареєструватися</a>-->
<!--            </div>-->
        </div>
    </div>
</div>