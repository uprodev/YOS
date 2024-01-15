<main class="_page page404-page">
    <div class="head-height-compensation d-lg-none"></div>
    <section class="page404">
        <div class="container">
            <div class="page404__body">
                <?php if(get_field('title_404', 'options')):?>
                    <h2 class="page404__title"><?php the_field('title_404', 'options');?></h2>
                <?php endif;?>
                <?php if(get_field('subtitle_404', 'options')):?>
                    <div class="page404__text"><?php the_field('subtitle_404', 'options');?></div>
                <?php endif;?>
                <?php $link = get_field('link_404', 'options');

                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="button-primary light" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php if(get_field('image_404', 'options')):?>
            <div class="page404__img ibg">
                <img src="<?php the_field('image_404', 'options');?>" alt="404">
            </div>
        <?php endif;?>
    </section>
</main>