<?php

$id = get_the_ID();

?>

<?php if( have_rows('heroes', $id) ): ?>

    <?php while( have_rows('heroes', $id) ): the_row(); ?>

        <?php get_template_part('templates/sections/heroes/' . get_row_layout()); ?>

    <?php endwhile; ?>

<?php endif; ?>

<?php if( have_rows('content', $id) ): ?>

    <?php while( have_rows('content', $id) ): the_row(); ?>

        <?php get_template_part('templates/sections/' . get_row_layout()); ?>

    <?php endwhile; ?>

<?php endif; ?>