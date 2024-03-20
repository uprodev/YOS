<?php

/*
 Template Name: Offert Page
*/

get_header();

?>

    <main class="_page faq-page">
        <div class="head-height-compensation"></div>
        <?php get_template_part('parts/header/categories-menu');?>
        <section class="faq faq--second">
            <div class="container">
                <h2 class="faq__title title-2"><?php the_title();?></h2>
                <div class="faq__inner" data-tabs>
                    <div class="faq__side">
                    </div>
                    <div class="faq__body">

                        <?php if( have_rows('content') ): ?>

                            <div class="faq__content">
                                <div class="text-content last-no-margin">

                                    <?php while( have_rows('content') ): the_row(); ?>
                                        <?php if( get_row_layout() == 'text' ): ?>
                                            <?php the_sub_field('tekst'); ?>
                                        <?php elseif( get_row_layout() == 'list' ):
                                            $list = get_sub_field('list');
                                            $i = 1;
                                            ?>
                                            <ul class="product__spoller spoller" data-spoller>
                                                <?php foreach ($list as $li):
                                                    $punkts = $li['punkty'];
                                                ?>
                                                    <li>
                                                        <div class="spoller__item-title" data-spoller-trigger>
                                                            <?= $i;?>. <?= $li['zagolovok'];?>
                                                        </div>
                                                        <div class="spoller__item-colapse-content">
                                                            <?php if($punkts):?>
                                                                <div class="text-content last-no-margin">
                                                                    <ol>
                                                                        <?php foreach($punkts as $punkt):?>
                                                                            <li>
                                                                                <?= $punkt['punkt'];?>
                                                                            </li>
                                                                        <?php endforeach;?>
                                                                    </ol>
                                                                </div>
                                                            <?php endif;?>
                                                        </div>
                                                    </li>
                                                <?php $i++; endforeach;?>

                                            </ul>
                                        <?php endif; ?>
                                    <?php endwhile; ?>

                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    </main>


<?php get_footer();
