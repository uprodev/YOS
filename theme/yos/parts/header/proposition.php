<?php

$title = get_field('fidbek_zagolovok', 'options');
$text = get_field('tekst_fidbek', 'options');
$form = get_field('fidbek_forma', 'options');

?>

<div class="side-basket proposition" data-proposition>
    <div class="proposition__container">
        <button class="side-basket__close-btn" data-action="close-proposition"><span
                class="icon-close-thin"></span></button>
        <div class="side-basket__head">
            <?php if($title):?>
                <h2><?= $title;?></h2>
            <?php endif;?>
            <?php if($text):?>
                <p><?= $text;?></p>
            <?php endif;?>
        </div>

        <?php if($form):?>
            <div class="side-basket__scroll-container">

                <?= do_shortcode('[contact-form-7 id="'.$form.'"]');?>

            </div>
        <?php endif;?>

    </div>
</div>
