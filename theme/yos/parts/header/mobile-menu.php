<?php $menu = get_field('menu', 'options'); ?>

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
                <?php echo do_shortcode('[fibosearch]'); ?>
            </div>
        </div>

        <div class="mobile-menu__body">
            <div class="mobile-menu__main-layer">
                <div class="mobile-menu__row">
                    <ul class="mobile-menu__list">
                        <?php foreach ($menu as $m) {
                            $i++;
                            $red = $m['color_red'];
                            $link = $m['main_item'];
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <?php if (empty($m['categories_menu']['column_1'])) {

                                    ?>
                                <li <?= $red?'class="text-color-warning"':'';?>><a href="<?= $link_url ?>"><?= $link_title ?></a></li>
                            <?php } else { ?>
                                <li ><button data-action="show-layer-by-id" data-id="layer-<?= $i ?>"><?= $link_title ?></button></li>
                            <?php } ?>
                        <?php } ?>

                    </ul>
                </div>
                <div class="mobile-menu__row">
                    <ul class="mobile-menu__list text-color-secondary">
                        <li><a href="#">запитання й відповіді</a></li>
                        <li><a href="#">про нас</a></li>
                        <li><a href="#">контакти</a></li>
                    </ul>

                    <?php $languages = icl_get_languages('skip_missing=1');

                    if(1 < count($languages)):?>

                        <div class="mobile-menu__language">
                            <div class="mobile-menu__title" data-collapse="language"><?= __('мова', 'yos');?></div>
                            <ul class="mobile-menu__list" data-collapse-target="language">
                                <?php foreach($languages as $l):?>

                                    <li><a href="<?= $l['url'];?>" <?= $l['active']?'class="active"':'';?>><?= $l['translated_name' ];?></a></li>

                                <?php endforeach;?>
                            </ul>
                        </div>

                    <?php endif;?>

                </div>
            </div>
            <?php
            $i = 0;

            foreach ($menu as $m) {
                array_filter($m);
                $i++;
                $link = $m['main_item'];
                $link_title = $link['title'];

                if (empty($m['categories_menu']))
                    continue;

                ?>
                <div class="mobile-menu__layer" data-layer="layer-<?= $i ?>">
                    <button class="mobile-menu__layer-title" data-action="hide-layer"><?= $link_title ?></button>
                    <ul class="mobile-menu__list">

                        <?php
                            foreach ($m['categories_menu'] as $key=>$column) {

                                if (!empty($column['offer']))
                                    continue;

                                    if (!empty($column)  ) {
                                    foreach ($column as $term_id) {
                                        if (!is_int($term_id))
                                            continue;
                                        $term = get_term($term_id); ?>
                                        <li>

                                            <a href="<?=  get_term_link($term->term_id)  ?>" class="mobile-menu__list-title"><?= $term->name ?></a>

                                                <?php
                                                $terms_child = get_terms([
                                                    'hide_empty' => false,
                                                    'taxonomy' => 'product_cat',
                                                    'parent' => $term->term_id,
                                                    'orderby' => 'menu-order'
                                                ]);

                                                if ($terms_child) { ?>
                                                    <ul class="mobile-menu__sublist">
                                                        <?php foreach ($terms_child as $term_child) { ?>
                                                            <li>
                                                                <a href="<?=  get_term_link($term_child->term_id)  ?>"><?= $term_child->name ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>


                                    </li>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>



                    </ul>
                </div>
            <?php } ?>

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
