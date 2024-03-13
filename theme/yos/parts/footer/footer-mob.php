<footer class="footer-mob">
    <div class="container">
        <div class="footer-mob__body">
            <div class="footer-mob__row">
                <div class="footer-mob__logo">
                    <a href="<?= get_home_url();?>">
                        <?php $logo = get_field('footer_logo', 'options');?>
                        <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>">
                    </a>
                </div>
                <?php if(get_field('footer_text', 'options')):?>
                    <div class="footer-mob__text text-content last-no-margin">
                        <p><?php the_field('footer_text', 'options');?></p>
                    </div>
                <?php endif;?>
            </div>
            <div class="footer-mob__row">
                <div class="footer-mob__time">
                    <?php if(get_field('footer_mobile_title_hours', 'options')):?>
                        <h3 class="footer-mob__title title-3"><?php the_field('footer_mobile_title_hours', 'options');?></h3>
                    <?php endif;?>

                    <?php if(get_field('footer_hours', 'options')):?>
                            <div class="footer-mob__vertical-content">
                                <?php the_field('footer_hours', 'options');?>
                            </div>
                    <?php endif;?>

                </div>
                <div class="footer-mob__contacts">
                    <?php if(get_field('footer_mobile_title_contact', 'options')):?>
                        <h3 class="footer-mob__title title-3">
                            <?php the_field('footer_mobile_title_contact', 'options');?>
                        </h3>
                    <?php endif;?>
                    <div class="footer-mob__vertical-content">
                        <?php if(get_field('footer_phone', 'options')):?>
                            <a href="+<?= phone_clear(get_field('footer_phone', 'options'));?>"><?php the_field('footer_phone', 'options');?></a>
                        <?php endif;?>
                        <?php if(get_field('footer_mail', 'options')):?>
                            <a href="mailto:<?=get_field('footer_mail', 'options');?>"><?php the_field('footer_mail', 'options');?></a>
                        <?php endif;?>
                        <?php if(get_field('footer_social', 'options')):
                            foreach (get_field('footer_social', 'options') as $soc):?>
                                <a href="<?= $soc['link'];?>" target="_blank" class="button-link button-link--line"><span><?= $soc['name'];?></span></a>
                            <?php endforeach;
                        endif;?>
                    </div>
                </div>
            </div>
            <div class="footer-mob__row">
                <?php if(get_field('footer_mobile_title_subsription', 'options')):?>
                    <h3 class="footer-mob__title title-3">
                        <?php the_field('footer_mobile_title_subsription', 'options');?>
                    </h3>
                <?php endif;?>
                <?php if(get_field('footer_mobile_text', 'options')):?>
                    <div class="footer-mob__text text-content last-no-margin">
                        <p><?php the_field('footer_mobile_text', 'options');?></p>
                    </div>
                <?php endif;?>
                <?php $form = get_field('subscription_form', 'options');

                if($form){
                    echo do_shortcode('[contact-form-7 id="'.$form.'"]');
                }?>
            </div>
            <?php if(get_field('copyright', 'options')):?>
                <div class="footer-mob__row">
                    <div class="footer-mob__copy">
                        <?php the_field('copyright', 'options');?>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</footer>
