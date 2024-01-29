<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
    <main class="_page catalog-page">
        <div class="head-height-compensation"></div>
    <section class="catalog">
        <div class="container">
            <div class="catalog__inner">
                <div class="catalog__head">
                    <div class="catalog__head-col-1"></div>
                    <div class="catalog__head-col-2">
                        <div class="catalog__head-row catalog__head-row--selected-filters-and-sort">
                            <div class="catalog__products-selected-filters d-none0">
                                <div class="selected-filters">
                                    <?= do_shortcode('[br_filter_single filter_id=450]') ?>
                                </div>
                            </div>
                            <div class="catalog__products-sort-by">
                                <div class="sort-by">

                                    <?php woocommerce_catalog_ordering() ?>

                                    <div class="sort-by__title">сортувати за</div>
                                    <ul class="sort-by__list">
                                        <li>
                                            <label class="checkbox-radio">
                                                <input type="radio" name="sort-by-desktop" checked>
                                                <div class="checkbox-radio__square"></div>
                                                <div class="checkbox-radio__text">Вибір YOS</div>
                                            </label>

                                        </li>
                                        <li>
                                            <label class="checkbox-radio">
                                                <input type="radio" name="sort-by-desktop" >
                                                <div class="checkbox-radio__square"></div>
                                                <div class="checkbox-radio__text">Нові надходження</div>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-radio">
                                                <input type="radio" name="sort-by-desktop" >
                                                <div class="checkbox-radio__square"></div>
                                                <div class="checkbox-radio__text">Ціна (менша до більшої)</div>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-radio">
                                                <input type="radio" name="sort-by-desktop" >
                                                <div class="checkbox-radio__square"></div>
                                                <div class="checkbox-radio__text">Ціна (більша до меншої)</div>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="catalog__body">
                    <div class="catalog__filter">
                        <button class="catalog__mobile-open-filter-button button-primary light"
                                data-action="open-filter">ФІЛЬТР
                            (<span>0</span>)
                        </button>

                        <h2 class="catalog__category-title title-2" data-da=".catalog__head-col-1,992,first">Волосся</h2>

                        <div class="filter" data-filter>
                            <button class="filter__btn-close" data-action="close-filter">
                                <span class="icon-close-thin"></span>
                            </button>
                            <div class="filter__scroll-container">
                                <div class="filter__sort-by">
                                    <div class="sort-by">
                                        <div class="sort-by__title">сортувати за</div>
                                        <ul class="sort-by__list">
                                            <li>
                                                <label class="checkbox-radio">
                                                    <input type="radio" name="sort-by" checked>
                                                    <div class="checkbox-radio__square"></div>
                                                    <div class="checkbox-radio__text">Вибір YOS</div>
                                                </label>

                                            </li>
                                            <li>
                                                <label class="checkbox-radio">
                                                    <input type="radio" name="sort-by" >
                                                    <div class="checkbox-radio__square"></div>
                                                    <div class="checkbox-radio__text">Нові надходження</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-radio">
                                                    <input type="radio" name="sort-by" >
                                                    <div class="checkbox-radio__square"></div>
                                                    <div class="checkbox-radio__text">Ціна (менша до більшої)</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-radio">
                                                    <input type="radio" name="sort-by" >
                                                    <div class="checkbox-radio__square"></div>
                                                    <div class="checkbox-radio__text">Ціна (більша до меншої)</div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="filter__form">
                                    <div class="filter__row">
                                        <div class="filter__title">фільтр</div>
                                    <?= do_shortcode('[br_filters_group group_id=409]') ?>
                                    </div>
                                </div>

                                <form style="display: none1" action="/" class="filter__form">
                                    <div class="filter__row">
                                        <div class="filter__title">фільтр</div>
                                        <div class="filter__selected-filters d-none">
                                            <div class="selected-filters"></div>
                                        </div>

                                        <ul class="filter__spoller spoller" data-spoller>
                                            <li>
                                                <div class="spoller__item-title active" data-spoller-trigger>
                                                    Статус
                                                </div>
                                                <div class="spoller__item-colapse-content" style="display: block;">
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">В наявності</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    За стікером / наліпка
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Sale</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">New</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Yos choice</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Must have</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Активні інгредієнти
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <div class="filter__block-search">
                                                        <div class="input-wrap" data-input>

                                                            <input type="text" class="input" >
                                                            <span class="input-label">Пошук</span>


                                                        </div>
                                                    </div>

                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Вітамін С</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Ретинол</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Саліцилова кислота</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Вагітність
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="radio" name="pregnancy">
                                                                <div class="filter-checkbox-radio__text">Так</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="radio" name="pregnancy">
                                                                <div class="filter-checkbox-radio__text">Ні</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="radio" name="pregnancy">
                                                                <div class="filter-checkbox-radio__text">Після консультації з лікарем</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Країна виробництва
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Австралия</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Великобритания</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Германия</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Израиль</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Испания</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Италия</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Канада</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Корея</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">США</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Франция</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Швейцария</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Япония</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Швеция</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title active" data-spoller-trigger>
                                                    Ціна
                                                </div>
                                                <div class="spoller__item-colapse-content" style="display: block;">
                                                    <div class="price-range" data-range data-min="0" data-max="50000" data-start="650" data-end="30000" data-step="50">
                                                        <div class="price-range__values">
                                                            <input type="text" class="price-range__input price-range__input--start" data-mask="9{*} ₴">
                                                            <input type="text" class="price-range__input price-range__input--end" data-mask="9{*} ₴">
                                                        </div>
                                                        <div class="price-range__slider"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title active" data-spoller-trigger>
                                                    Бренд
                                                </div>
                                                <div class="spoller__item-colapse-content" style="display: block;">
                                                    <div class="filter-brands" data-filter-brands>
                                                        <div class="filter-brands__search">
                                                            <div class="filter-brands__search-input">
                                                                <div class="input-wrap" data-input>

                                                                    <input type="text" class="input" >
                                                                    <span class="input-label">Пошук брендів</span>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="filter-brands__list">
                                                            <li data-letter="a">
                                                                <div class="filter-brands__letter">a</div>
                                                                <ul class="filter__block">
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                acqua di parma
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                aesop
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                augustinus bader
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                aveda
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                aurelia london
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                ameliorate
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li data-letter="b">
                                                                <div class="filter-brands__letter">b</div>
                                                                <ul class="filter__block">
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                benefit cosmetics
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                byoma
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                byredo
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                bobbi brown
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                baxter of california
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                boy smells
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li data-letter="c">
                                                                <div class="filter-brands__letter">c</div>
                                                                <ul class="filter__block">
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                comfort zone
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="filter-checkbox-radio">
                                                                            <input type="checkbox">
                                                                            <div class="filter-checkbox-radio__text">
                                                                                colorescience
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Об'єм
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <div class="filter__block-search">
                                                        <div class="input-wrap" data-input>

                                                            <input type="text" class="input" >
                                                            <span class="input-label">Пошук</span>


                                                        </div>
                                                    </div>
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">20г</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">100г</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">250г</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">480г</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">1л</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Стать
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Для дітей</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Для жінок</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Для чоловіків</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Тип продукту
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <div class="filter__block-search">
                                                        <div class="input-wrap" data-input>

                                                            <input type="text" class="input" >
                                                            <span class="input-label">Пошук</span>


                                                        </div>
                                                    </div>
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Бальзам</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Блиск</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Гель</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Скраб</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Диски</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Емульсія</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Крем</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Сироватка</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Маска</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Масло</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Мило</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Проблема/Потреба
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <div class="filter__block-search">
                                                        <div class="input-wrap" data-input>

                                                            <input type="text" class="input" >
                                                            <span class="input-label">Пошук</span>


                                                        </div>
                                                    </div>
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Антиоксидантний захист</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Блиск</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Випадіння</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Відновлення</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Відтінковий ефект</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Глибоке очищення</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Ексфоліація</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Еластичність</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Живлення</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Захист кольору</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Зволоження</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Ламкість</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Легке розчісування</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Лупа</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Лущення</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Обєм</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Охолодження</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Очищення</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Пористість</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Посилення завитка</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Посічені кінчеки</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Пошкоджене волосся</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Пружність</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Розгладження</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Свербіж</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Стайлінг</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Себорея</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Стимуляція росту</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Сухість</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Термозахист</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Ущільнення</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Фіксація</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Чутливість</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Структура волосся
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Пофорбованні</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Кучеряві</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Пористі</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Тонкі</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Щільні</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Середні</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Густота волосся
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Густі</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Рідки</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Середні</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="spoller__item-title" data-spoller-trigger>
                                                    Тип шкіри голови
                                                </div>
                                                <div class="spoller__item-colapse-content">
                                                    <ul class="filter__block">
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Жирна</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Суха</div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="filter-checkbox-radio">
                                                                <input type="checkbox">
                                                                <div class="filter-checkbox-radio__text">Нормальна</div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <button disabled type="reset" class="filter__reset button-link">
                                        <span>зняти всі фільтри</span>
                                    </button>
                                </form>



                            </div>
                        </div>
                    </div>
                    <div class="catalog__products">
                        <ul class="catalog__products-list">
                            <?php while ( have_posts() ) {
                            the_post();

                            /**
                            * Hook: woocommerce_shop_loop.
                            */
                            do_action( 'woocommerce_shop_loop' );?>
                            <li><?php wc_get_template_part( 'content', 'product' );?></li>


                            <?php }?>
                        </ul>
                        <div class="catalog__prodducts-footer">
                            <?php do_action( 'woocommerce_after_shop_loop' );?>
<!--                            <div class="pagination">-->
<!--                                <a href="#" class="button-link"><span>завантажити ще</span></a>-->
<!--                                <div class="pagination__fraction">01/13</div>-->
<!--                                <a href="#" class="pagination__btn left disabled"><span class="icon-arrow-left"></span></a>-->
<!--                                <a href="#" class="pagination__btn right"><span class="icon-arrow-right"></span></a>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="popup" id="popup-notify-availability">
        <div class="popup__body">
            <div class="popup__content">
                <button class="popup__close" data-popup="close-popup"><span class="icon-close-thin"></span></button>
                <div class="popup-notify-availability">
                    <div class="popup-notify-availability__title">
                        повідомити про наявність?
                    </div>
                    <div class="popup-notify-availability__text">
                        Залишіть будь ласка свій номер і ми зв'яжемося, коли товар з'явиться в наявності
                    </div>
                    <form action="" class="popup-notify-availability__form">
                        <div class="input-wrap" data-input>

                            <input type="text" class="input"  data-mask="+380 (99) 999 99 99">
                            <span class="input-label">Телефонний номер</span>


                        </div>
                        <button class="button-primary dark">залишити номер</button>
                    </form>
                </div>
            </div>
        </div>

        <!--
            После отправки формы нужно открыть следующий попап
            это можно сделать методом - window.popup.open('#popup-notify-availability-thank-you')
        -->
    </div>
    <div class="popup" id="popup-notify-availability-thank-you">
        <div class="popup__body">
            <div class="popup__content">
                <button class="popup__close" data-popup="close-popup"><span class="icon-close-thin"></span></button>
                <div class="popup-notify-availability popup-notify-availability--thank-you">
                    <div class="popup-notify-availability__title">
                        ваш номер надіслано
                    </div>
                    <div class="popup-notify-availability__text">
                        дякуємо!
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>

        <?php

get_footer();
