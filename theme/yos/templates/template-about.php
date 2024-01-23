<?php

/*

Template Name: About

*/

$img = get_field('image_mob');

get_header();

?>

<main class="_page about-page">
    <div class="head-height-compensation"></div>
    <?php get_template_part('parts/header/categories-menu');?>
    <section class="about">
        <div class="container">
            <h2 class="about__title title-2">
                <?php the_title();?>
            </h2>
        </div>
        <div class="about__body">
            <div class="about__img ibg">
                <picture>
                    <source srcset="<?php the_post_thumbnail_url();?>" media="(min-width: 768px)">
                    <img src="<?= $img['url'];?>" alt="img">
                </picture>
            </div>
            <div class="about__content">
                <div class="container">
                    <div class="text-content last-no-margin">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer();