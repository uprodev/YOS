<?php

$title = get_sub_field('title');
$text = get_sub_field('text');
$image = get_sub_field('image');
$image_mob = get_sub_field('image_mob');

?>

<div class="top-space-140 top-space-md-150">
    <div class="banner">
        <div class="container">
            <div class="banner__body">
                <div class="banner__text-content">
                    <?php if($title):?>
                        <h2 class="title-2"><?= $title;?></h2>
                    <?php endif;?>
                    <?php if($text):?>
                        <div class="text-content top-space-20 last-no-margin">
                            <?= $text;?>
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
