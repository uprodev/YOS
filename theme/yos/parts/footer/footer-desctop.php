<footer class="footer-desk">
    <div class="container">
        <div class="footer-desk__body">
            <div class="footer-desk__col footer-desk__col-1">
                <div class="footer-desk__logo">
                    <a href="<?= get_home_url();?>">
                        <?php $logo = get_field('footer_logo', 'options');?>
                        <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>">
                    </a>
                </div>
                <?php if(get_field('footer_text', 'options')):?>
                    <div class="footer-desk__text text-content last-no-margin">
                        <p><?php the_field('footer_text', 'options');?></p>
                    </div>
                <?php endif;?>
                <?php if(get_field('copyright', 'options')):?>
                    <div class="footer-desk__copy">
                        <?php the_field('copyright', 'options');?>
                    </div>
                <?php endif;?>
            </div>
            <div class="footer-desk__col footer-desk__col-2">
                <h2 class="footer-desk__title title-2">
                    <?php the_field('footer_title_1', 'options');?>
                </h2>
                <?php wp_nav_menu([
                    'theme_location' => 'footer-category',
                    'container' => false,
                    'menu_class' => 'footer-desk__list',
                ]);?>
            </div>
            <div class="footer-desk__col footer-desk__col-3">
                <h2 class="footer-desk__title title-2">
                    <?php the_field('footer_title_2', 'options');?>
                </h2>
                <ul class="footer-desk__list">
                    <?php if(get_field('footer_hours', 'options')):?>
                        <li>
                            <?php the_field('footer_hours', 'options');?>
                        </li>
                    <?php endif;?>
                    <?php if(get_field('footer_phone', 'options')):?>
                        <li>
                            <a href="+<?= phone_clear(get_field('footer_phone', 'options'));?>"><?php the_field('footer_phone', 'options');?></a>
                        </li>
                    <?php endif;?>
                    <?php if(get_field('footer_mail', 'options')):?>
                        <li>
                            <a href="mailto:<?=get_field('footer_mail', 'options');?>"><?php the_field('footer_mail', 'options');?></a>
                        </li>
                    <?php endif;?>
                    <?php if(get_field('footer_social', 'options')):
                        foreach (get_field('footer_social', 'options') as $soc):?>
                            <li>
                                <a href="<?= $soc['link'];?>" target="_blank" class="button-link button-link--line"><span><?= $soc['name'];?></span></a>
                            </li>
                        <?php endforeach;
                    endif;?>
                </ul>

                <?php if(get_field('fidbek_tekst', 'options')):?>
                    <h2 class="footer-desk__title title-2">
                        <?php the_field('fidbek_tekst', 'options');?>
                    </h2>
                <?php endif;?>
                <?php $linkf = get_field('fidbek_posylannya');

                if( $linkf ):
                    $linkf_url = $linkf['url'];
                    $linkf_title = $linkf['title'];
                    $linkf_target = $linkf['target'] ? $linkf['target'] : '_self';
                    ?>
                    <a class="button-link button-link--line" href="<?= esc_url($linkf_url); ?>" target="<?= esc_attr($linkf_target); ?>"><span><?= esc_html($linkf_title); ?></span></a>
                <?php endif; ?>
            </div>
            <div class="footer-desk__col footer-desk__col-4">
                <h2 class="footer-desk__title title-2">
                    <?php the_field('footer_title_3', 'options');?>
                </h2>
                <?php wp_nav_menu([
                    'theme_location' => 'footer-info',
                    'container' => false,
                    'menu_class' => 'footer-desk__list',
                ]);?>
            </div>
        </div>
    </div>
</footer>
