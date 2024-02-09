<?php

$brands = get_sub_field('brands');

?>

<div class="top-space-140 top-space-md-150">
    <section class="ticker-logos" data-ticker-logos>
        <div dir="ltr" class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($brands as $brand):
                    $name = get_term( $brand );
                    $logo = get_field('logo_brand', 'pa_brand_'.$brand);?>
                    <div class="swiper-slide">
                        <a href="<?= get_term_link($brand);?>" class="ticker-logo">
                            <img src="<?= $logo;?>" alt="<?= $brand->name;?>">
                        </a>
                    </div>
                <?php endforeach;?>

            </div>
        </div>
        <div dir="rtl" class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($brands as $brand):
                    $name = get_term( $brand );
                    $logo = get_field('logo_brand', 'pa_brand_'.$brand);?>
                    <div class="swiper-slide">
                        <a href="<?= get_term_link($brand);?>" class="ticker-logo">
                            <img src="<?= $logo;?>" alt="<?= $brand->name;?>">
                        </a>
                    </div>
                <?php endforeach;?>

            </div>
        </div>
    </section>
</div>
