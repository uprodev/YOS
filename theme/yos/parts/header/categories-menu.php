<?php

$menu = get_field('menu', 'options');

if($menu):
    $i=0;

?>

<div class="categories " data-categories>
    <div class="categories__inner">
        <div class="container">
            <div class="categories__nav swiper" data-slider="header-mob-categories">
                <div class="swiper-wrapper">

                    <?php foreach ($menu as $m):
                        $red = $m['color_red'];
                        $link = $m['main_item'];

                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <div class="swiper-slide" data-action="show-category-tab-by-index" data-index="<?= $i;?>">
                                <a <?= $red?'class="text-color-warning"':'';?> href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                            </div>
                        <?php endif; ?>

                    <?php $i++; endforeach; $i=0;?>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>

    <?php foreach ($menu as $m):

        array_filter($m);

        if ($m['categories_menu']) {
            if (!empty($m['categories_menu']['column_1'])) { ?>

                <div class="categories__tab" data-category-tab data-index="<?= $i;?>">
                    <div class="categories__body container">

                        <?php

                        foreach ($m['categories_menu'] as $key=>$column) {
                             if (!empty($column['offer']))  { ?>
                                <div class="categories__block">

                                    <a href="<?= $column['offer']['url'] ?>" class="category-offer-card">
                                        <div class="category-offer-card__img ibg">
                                            <img src="<?= $column['image']['url'] ?>" alt="">
                                        </div>
                                        <div class="category-offer-card__bottom">
                                            <div class="category-offer-card__title"><?= $column['offer']['title'] ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php }  elseif (!empty($column)) { ?>

                                <div class="categories__block">
                                    <ul class="categories__list">
                                        <?php
                                        if (!empty($column)) {
                                            foreach ($column as $term_id) {
                                                $term = get_term($term_id);
                                                //echo $term_id;
                                                if (is_wp_error($term)) {
                                                    print_r($term_id);
                                                    continue;
                                                }

                                                ?>
                                                <li>
                                                    <a href="<?=  get_term_link($term->term_id)  ?>" class="categories__list-title"><?= $term->name ?></a>

                                                    <?php
                                                    $terms_child = get_terms([
                                                        'hide_empty' => false,
                                                        'taxonomy' => 'product_cat',
                                                        'parent' => $term->term_id,
                                                        'orderby' => 'menu-order'
                                                    ]);

                                                    if ($terms_child) { ?>
                                                        <ul class="categories__sublist">
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
                                    </ul>
                                </div>

                             <?php } ?>

                    <?php } ?>

                </div>
            </div>

            <?php } ?>
        <?php } ?>

    <?php $i++; endforeach;?>

</div>


<?php endif;
