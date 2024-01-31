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

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="catalog__body">
                    <div class="catalog__filter">
                        <button class="catalog__mobile-open-filter-button button-primary light"
                                data-action="open-filter">ФІЛЬТР
<!--                            (<span>0</span>)-->
                        </button>

                        <h2 class="catalog__category-title title-2" data-da=".catalog__head-col-1,992,first">
                            <?php woocommerce_page_title(); ?>
                        </h2>

                        <div class="filter" data-filter>
                            <button class="filter__btn-close" data-action="close-filter">
                                <span class="icon-close-thin"></span>
                            </button>
                            <div class="filter__scroll-container">
                                <div class="filter__sort-by">
                                    <div class="sort-by">
                                        <?php woocommerce_catalog_ordering() ?>

                                        <form id="custom-sorting" class="woocommerce-ordering">

                                            <ul class="sort-by__list">
                                                <li>
                                                    <label class="checkbox-radio">
                                                        <input type="radio" name="orderby" checked="" value="popularity">
                                                        <div class="checkbox-radio__square"></div>
                                                        <div class="checkbox-radio__text">Вибір YOS</div>
                                                    </label>

                                                </li>
                                                <li>
                                                    <label class="checkbox-radio">
                                                        <input type="radio" name="orderby" value="date">
                                                        <div class="checkbox-radio__square"></div>
                                                        <div class="checkbox-radio__text">Нові надходження</div>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-radio">
                                                        <input type="radio" name="orderby" value="price">
                                                        <div class="checkbox-radio__square"></div>
                                                        <div class="checkbox-radio__text">Ціна (менша до більшої)</div>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-radio">
                                                        <input type="radio" name="orderby" value="price-desc">
                                                        <div class="checkbox-radio__square"></div>
                                                        <div class="checkbox-radio__text">Ціна (більша до меншої)</div>
                                                    </label>
                                                </li>
                                            </ul>

                                       </form>
                                    </div>
                                </div>


                                <div class="filter__form">
                                    <div class="filter__row">
                                        <div class="filter__title">фільтр</div>

                                        <div class="filter__selected-filters">
                                            <div class="selected-filters">
                                                <?= do_shortcode('[br_filter_single filter_id=511]') ?>
                                            </div>
                                        </div>


                                        <?= do_shortcode('[br_filters_group group_id=409]') ?>
                                    </div>
                                </div>





                            </div>
                            <?= do_shortcode('[br_filter_single filter_id=553]') ?>
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
