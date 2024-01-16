<?php

/*

Template Name: FAQ

*/

$faqs = get_field('faqs');

get_header();

?>

    <main class="_page faq-page">
        <div class="head-height-compensation"></div>
        <section class="faq">
            <div class="container">
                <h2 class="faq__title title-2"><?php the_title();?></h2>
                <?php if($faqs):?>
                    <div class="faq__inner" data-tabs>
                        <div class="faq__side">
                            <div class="faq__nav">
                                <div class="swiper" data-slider="faq-nav" data-mobile="false">
                                    <div class="swiper-wrapper">
                                        <?php $f=0;
                                        foreach ($faqs as $faq):?>
                                            <div class="swiper-slide">
                                                <div data-tab-trigger="<?= $f;?>" class="button-link"><span><?= $faq['question'];?></span></div>
                                            </div>
                                        <?php $f++; endforeach;?>
                                    </div>
                                    <div class="swiper-scrollbar slider-scrollbar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="faq__body">
                            <?php $a=0;
                            foreach ($faqs as $faq):?>
                                <div class="faq__content" data-tab-content="<?= $a;?>">
                                    <?php foreach($faq['answer'] as $ans):?>
                                        <div class="faq__content-head">
                                            <h2><span><?= $ans['title'];?></span></h2>
                                            <?php if($ans['update']):?>
                                                <div class="faq__content-date">
                                                    <?= $ans['update'];?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                        <div class="faq__content-text text-content last-no-margin">
                                            <?= $ans['text'];?>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            <?php $a++; endforeach;?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </section>
    </main>

<?php get_footer();
