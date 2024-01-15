<?php

$title = get_field('subscription_title', 'options');
$text = get_field('subscription_text', 'options');
$form = get_field('subscription_form', 'options');
$image1 = get_field('subscription_image_1', 'options');
$image2 = get_field('subscription_image_2', 'options');
$image3 = get_field('subscription_image_3', 'options');
?>

<section class="subscription top-space-140">
    <div class="subscription__body">
        <div class="subscription__col">
            <?php if($image1):?>
                <div class="subscription__img ibg">
                    <img src="<?= $image1['url'];?>" alt="<?= $image1['url'];?>">
                </div>
            <?php endif;?>
        </div>
        <div class="subscription__col">
            <div class="subscription__text-content">
                <?php if($title):?>
                    <h2 class="title-2"><?= $title;?></h2>
                <?php endif;?>
                <?php if($text):?>
                    <div class="subscription__text">
                        <?= $text;?>
                    </div>
                <?php endif;?>
                <?php if($form){
                    echo do_shortcode('[contact-form-7 id="'.$form.'"]');
                }?>
            </div>
        </div>
        <div class="subscription__col">
            <?php if($image2):?>
                <div class="subscription__img ibg">
                    <img src="<?= $image2['url'];?>" alt="<?= $image2['url'];?>">
                </div>
            <?php endif;?>
        </div>
        <div class="subscription__col">
            <?php if($image3):?>
                <div class="subscription__img ibg">
                    <img src="<?= $image3['url'];?>" alt="<?= $image3['url'];?>">
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
