<?php

$title_out = get_field('zagolovok_formy' , 'options');
$subtitle_out = get_field('pidzagolovok_formy' , 'options');
$form_id = get_field('form_out' , 'options');
$title_out2 = get_field('vikno_dyakuyu_zagolovok' , 'options');
$subtitle_out2 = get_field('vikno_dyakuyu_pidzagolovok' , 'options');


?>

<div class="popup" id="popup-notify-availability">
    <div class="popup__body">
        <div class="popup__content">
            <button class="popup__close" data-popup="close-popup"><span class="icon-close-thin"></span></button>
            <div class="popup-notify-availability">
                <?php if($title_out):?>
                    <div class="popup-notify-availability__title">
                        <?= $title_out;?>
                    </div>
                <?php endif;?>
                <?php if($subtitle_out):?>
                    <div class="popup-notify-availability__text">
                        <?= $subtitle_out;?>
                    </div>
                <?php endif;?>
                <?php if($form_id){
                    echo do_shortcode('[contact-form-7 id="'.$form_id.'"]');
                }?>
            </div>
        </div>
    </div>

    <!--
        После отправки формы нужно открыть следующий попап
        это можно сделать методом - window.popup.open('#popup-notify-availability-thank-you')
    -->
</div>
<div class="popup" id="popup-notify-availability-thank-you">
    <div class="popup__body">
        <div class="popup__content">
            <button class="popup__close" data-popup="close-popup"><span class="icon-close-thin"></span></button>
            <div class="popup-notify-availability popup-notify-availability--thank-you">
                <?php if($title_out2):?>
                    <div class="popup-notify-availability__title">
                        <?= $title_out2;?>
                    </div>
                <?php endif;?>
                <?php if($subtitle_out2):?>
                    <div class="popup-notify-availability__text">
                        <?= $subtitle_out2;?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
