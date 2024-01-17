<?php

$number = $args['num'];

?>

<div class="articles-preview__grid-item">
    <div class="article-preview-card">
        <div class="article-preview-card__img ibg">
            <a href="<?php the_permalink();?>">
                <img src="<?php the_post_thumbnail_url();?>" alt="<?= strip_tags(get_the_title());?>">
            </a>
        </div>
        <div class="article-preview-card__content">
            <div class="article-preview-card__title">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </div>
            <?php if($number == 1 || $number==6):?>
                <div class="article-preview-card__text">
                    <?php the_excerpt();?>
                </div>
            <?php endif;?>
            <a href="<?php the_permalink();?>" class="button-link"><span><?= __('детальніше', 'yos');?></span></a>
        </div>
    </div>
</div>
