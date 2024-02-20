<?php

/*

Template Name: Brands

*/

$top = get_field('top');

$alpha = range("a","z");

get_header();

?>

    <main class="_page brands-page">
        <div class="head-height-compensation"></div>
        <?php get_template_part('parts/header/categories-menu');?>

        <section class="brands" data-brands>
            <div class="container">

                <div class="brands__best">
                    <h2 class="brands__title title-2"><?php the_title();?></h2>
                    <div class="brands__best-body">
                        <?php if($top):?>
                            <ul class="brands__best-list">
                                <?php foreach($top as $tb):?>
                                    <li>
                                        <a href="<?= get_term_link($tb);?>"><?= get_term( $tb )->name;?></a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </div>
                </div>

                <div class="brands__nav">
                    <div class="swiper" data-slider="brands-nav">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <button data-action="filter-by-letter" data-letter="#">
                                    #
                                </button>
                            </div>
                            <?php foreach ($alpha as $letr):?>
                                <div class="swiper-slide">
                                    <button data-action="filter-by-letter" data-letter="<?= $letr;?>">
                                        <?= $letr;?>
                                    </button>
                                </div>
                            <?php endforeach;?>

                        </div>
                    </div>
                </div>

                <div class="brands__search">
                    <div class="input-wrap" data-input>

                        <input type="text" class="input" placeholder="enter">
                        <span class="input-label"><?= __('Пошук брендів', 'yos');?></span>


                    </div>
                </div>

                <ul class="brands__list">

                    <?php foreach ($alpha as $letr):
                        $terms = get_terms( array(
                            'taxonomy' => 'pa_brand',
                            '__first_letter' => $letr,
                            'hide_empty' => false
                        ) );
                        ?>

                        <li data-letter="<?= $letr;?>">
                        <div class="brands__letter"><?= $letr;?></div>
                        <?php if($terms):?>
                            <ul class="brands__list-block">
                                <?php foreach($terms as $term):
                                    $label = get_field('label', 'pa_brand_'.$term->term_id);?>

                                    <li>
                                        <a href="<?= get_term_link($term->term_id);?>" class="brands__list-block-item"><?= $term->name;?> <?= $label?'<span>'.$label.'</span>':'';?></a>
                                    </li>

                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </li>

                    <?php endforeach;?>

                </ul>
            </div>
        </section>

    </main>


<?php get_footer();
