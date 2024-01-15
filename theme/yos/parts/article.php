<div class="article-card-prview">
    <div class="article-card-prview__img ibg">
        <a href="<?php the_permalink();?>">
            <img src="<?php the_post_thumbnail_url();?>" alt="<?= strip_tags(get_the_title());?>">
        </a>
    </div>
    <div class="article-card-prview__text">
        <div class="article-card-prview__title">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </div>
        <div class="article-card-prview__btn">
            <a href="<?php the_permalink();?>" class="button-link"><span><?= __('детальніше', 'yos');?></span></a>
        </div>
    </div>
</div>
