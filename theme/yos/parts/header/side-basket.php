<?php

?>

<div class="side-basket" data-side-basket>
    <!--
        Можно открыть/закрыть боковую корзину скриптами, есть два метода
        window.sideBasket.open();
        window.sideBasket.close();
    -->
    <div class="side-basket__container">
        <button class="side-basket__close-btn" data-action="close-side-basket"><span class="icon-close-thin"></span></button>
        <div class="side-basket__head">
            ваш кошик <span>(3)</span>
        </div>
        <div class="side-basket__scroll-container">
            <ul class="side-basket__products-list">
                <li>
                    <div class="product-card-sm">
                        <div class="product-card-sm__left">
                            <button class="product-card-sm__btn-remove"><span class="icon-close"></span></button>
                            <a href="#" class="product-card-sm__img">
                                <img src="img/photo/product-card-img-1.png" alt="">
                            </a>
                        </div>
                        <div class="product-card-sm__right">
                            <div class="product-card-sm__title"><a href="#">zein obagi</a></div>
                            <div class="product-card-sm__text">
                                <div class="product-card-sm__text-1">
                                    Exfoliating Polish, 65g
                                </div>
                                <div class="product-card-sm__text-2">
                                    Zo Skin Health
                                </div>
                            </div>
                            <div class="product-card-sm__group">
                                <div class="product-card-sm__quantity">
                                    <div class="product-card-sm__quantity-label">Кількість:</div>
                                    <div class="quantity" data-quantity>
                                        <button class="quantity__btn minus"><span class="icon-square-minus"></span></button>
                                        <input type="text" value="1" class="quantity__value">
                                        <button class="quantity__btn plus"><span class="icon-square-plus"></span></button>
                                    </div>
                                </div>
                                <div class="product-card-sm__price">
                                    <div class="product-card-sm__price-current">3 199 ₴</div>
                                    <div class="product-card-sm__price-old">7 299 ₴</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="product-card-sm">
                        <div class="product-card-sm__left">
                            <button class="product-card-sm__btn-remove"><span class="icon-close"></span></button>
                            <a href="#" class="product-card-sm__img">
                                <img src="img/photo/product-card-img-2.png" alt="">
                            </a>
                        </div>
                        <div class="product-card-sm__right">
                            <div class="product-card-sm__title"><a href="#">rare paris</a></div>
                            <div class="product-card-sm__text">
                                <div class="product-card-sm__text-1">
                                    Ecological Cellulose, 65g
                                </div>
                                <div class="product-card-sm__text-2">
                                    Tresor Solaire
                                </div>
                            </div>
                            <div class="product-card-sm__group">
                                <div class="product-card-sm__quantity">
                                    <div class="product-card-sm__quantity-label">Кількість:</div>
                                    <div class="quantity" data-quantity>
                                        <button class="quantity__btn minus"><span class="icon-square-minus"></span></button>
                                        <input type="text" value="1" class="quantity__value">
                                        <button class="quantity__btn plus"><span class="icon-square-plus"></span></button>
                                    </div>
                                </div>
                                <div class="product-card-sm__price">
                                    <div class="product-card-sm__price-current">299 ₴</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="side-basket__payment-info">
                <div class="side-basket__payment-info-row">
                    <span>Знижка за системою лояльності</span>
                    <span class="text-nowrap">-60 ₴</span>
                </div>
                <div class="side-basket__payment-info-row">
                    <span>Інші знижки</span>
                    <span class="text-nowrap">0 ₴</span>
                </div>
                <div class="side-basket__payment-info-row">
                    <span>Доставка</span>
                    <span>За тарифами перевізника</span>
                </div>
                <div class="side-basket__payment-info-row side-basket__payment-info-row--total">
                    <span>всього до сплати</span>
                    <span class="text-nowrap">4 098 ₴</span>
                </div>
            </div>

            <div class="side-basket__to-checkout">
                <a href="#" class="button-primary dark w-100">перейти далі</a>
            </div>

            <div class="side-basket__free-shipping">
                <div class="side-basket__free-shipping-head">
                    <span>До безкоштовної доставки
                        залишилось:</span>
                    <span class="text-nowrap">1 230 ₴</span>
                </div>
                <div class="side-basket__free-shipping-line">
                    <div class="line-track">
                        <div class="line" style="width: 40%;"></div>
                    </div>
                </div>
                <div class="side-basket__free-shipping-total">
                    <span class="text-nowrap">0 ₴</span>
                    <span class="text-nowrap">2 000 ₴</span>
                </div>
            </div>
        </div>
    </div>
</div>
