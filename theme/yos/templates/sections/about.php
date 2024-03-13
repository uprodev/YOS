<?php

$title = get_sub_field('title');
$text = get_sub_field('text');
$image = get_sub_field('image');
$image_mob = get_sub_field('image_mob');
$link = get_sub_field('link');

?>

<div class="top-space-140 top-space-md-150">
    <div class="banner banner-about">
        <div class="container">
            <div class="banner__body">
                <div class="banner__text-content">
                    <?php if($title):?>
                        <h2 class="title-2"><?= $title;?></h2>
                    <?php endif;?>
                    <?php if($text):?>
                        <div class="text-content top-space-20 last-no-margin">
                            <?= $text;?>
                            <?php if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="button-link" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif;?>
                </div>
                <?php if($image || $image_mob):?>
                    <div class="banner__img ibg">
                        <picture>
                            <source srcset="<?= $image;?>" media="(min-width: 768px)">
                            <img src="<?= $image_mob;?>" alt="img">
                        </picture>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
