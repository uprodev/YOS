<?php

$title = get_sub_field('title');
$proposes = get_sub_field('proposes');

?>

<div class="top-space-140 top-space-md-150">
    <div class="special-offers carousel">
        <div class="container">
            <div class="carousel__head">
                <?php if($title):?>
                    <div class="category-links">
                        <h2 class="title-2"><?= $title;?></h2>
                    </div>
                <?php endif;?>
            </div>
            <?php if($proposes): $p=1;?>
                <div class="swiper" data-slider="carousel">
                    <div class="swiper-wrapper">
                        <?php foreach($proposes as $prop):?>
                            <div class="swiper-slide <?= ($p==1||$p%3==1)?'big-card':'';?>">
                                <div class="special-offer-card" data-special-offer-card>
                                    <div class="special-offer-card__img ibg">
                                        <img src="<?= $prop['image'];?>" alt="<?= $prop['title'];?>">
                                    </div>
                                    <div class="special-offer-card__text-content">
                                        <?php if($p==1):?>
                                            <h2 class="special-offers__title title-2"><?= $title;?></h2>
                                        <?php endif;?>
                                        <div class="special-offer-card__text" data-truncate-string="120">
                                            <?= $prop['text'];?>
                                        </div>
                                        <a href="#" class="button-link" data-action="show-full-text-by-index" data-index="0">
                                            <span><?= __('детальніше', 'yos');?></span>
                                        </a>
                                        <div class="special-offer-card__full-text" data-index="0">
                                            <div class="special-offer-card__text text-content last-no-margin">
                                                <?= $prop['full_text'];?>
                                            </div>
                                            <a href="#" class="button-link" data-action="hide-full-text-by-index"><span><?= __('закрити', 'yos');?></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $p++; endforeach;?>
                    </div>
                    <div class="carousel__navigation">
                        <div class="slider-navigations">
                            <div class="swiper-scrollbar slider-scrollbar"></div>
                            <div class="slider-buttons">
                                <button class="slider-btn left"><span class="icon-arrow-left"></span></button>
                                <div class="slider-pagination"></div>
                                <button class="slider-btn right"><span class="icon-arrow-right"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>