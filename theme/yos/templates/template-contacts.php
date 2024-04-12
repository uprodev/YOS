<?php

/*

Template Name: Contact

*/

$img = get_field('image_mob');

get_header();

?>

    <main class="_page contacts-page">
        <div class="head-height-compensation d-lg-none"></div>
        <?php //get_template_part('parts/header/categories-menu');?>
        <section class="contacts">
            <div class="container">
                <h2 class="contacts__title" data-da=".contacts__info,768,last"><?php the_title();?></h2>
            </div>
            <div class="contacts__img ibg">
                <picture>
                    <source srcset="<?php the_post_thumbnail_url();?>" media="(min-width: 768px)">
                    <img src="<?= $img['url'];?>" alt="img">
                </picture>
            </div>
            <div class="contacts__info">
                <?php the_content();?>
                <?php if(get_field('phone')):?>
                    <p class="">
                        <a href="tel:+<?= phone_clear(get_field('phone'));?>" class="button-link button-link--line"><span><?php the_field('phone');?></span></a>
                    </p>
                <?php endif;?>
                <?php if(get_field('social_network')):
                    foreach (get_field('social_network') as $soc):?>
                        <p class="button-link button-link--line">
                            <a href="<?= $soc['link'];?>" target="_blank" class="button-link button-link--line"><span><?= $soc['name'];?></span></a>
                        </p>
                    <br>
                    <?php endforeach;
                endif;?>
                <?php the_field('address') ?>
            </div>
        </section>
    </main>

<?php get_footer();
