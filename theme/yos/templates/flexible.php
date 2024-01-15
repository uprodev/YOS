<?php

$id = get_the_ID();

?>

<main class="_page<?= is_front_page()?' home-page':'';?>">

    <?php if( have_rows('content', $id) ): ?>

        <?php while( have_rows('content', $id) ): the_row(); ?>

            <?php get_template_part('templates/sections/' . get_row_layout()); ?>

        <?php endwhile; ?>

    <?php endif;?>

</main>
