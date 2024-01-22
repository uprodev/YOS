<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$rate = intval(get_comment_meta(get_comment_ID(), 'rating', true));
$buy = get_field('approve_buy', 'comment_'.get_comment_ID());
$dpt = get_comment_depth(get_comment_ID());

if($dpt>1):?>
<div class="comment">
    <div class="comment__head"></div>
    <div class="comment__body">
        <div class="comment__subcomments">
<?php endif;?>
<div class="comment" id="comment-<?php comment_ID(); ?>">
    <div class="comment__head">
        <div class="comment__author-name">
            <?php if (1 == $comment->user_id){?>
                <img src="<?= get_template_directory_uri();?>/img/logo/yos-short-logo.png" alt="">
            <?php }else{
                comment_author();
            }?>
        </div>
        <?php if($dpt==1):?>
            <?php if($buy):?>
                <div class="comment__author-status">
                    <?= __('Покупку підтверджено', 'yos');?>
                </div>
            <?php endif;?>
            <div class="comment__author-set-stars">
                <div class="rating" data-rating="<?= $rate;?>">
                    <div class="rating__stars rating__stars-1">
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star-full"></span>
                        </div>
                    </div>
                    <div class="rating__stars rating__stars-2">
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                        <div class="rating__star">
                            <span class="icon-star"></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
    </div>
    <div class="comment__body">
        <div class="comment__text">
            <?php do_action( 'woocommerce_review_comment_text', $comment );?>
        </div>
        <div class="comment__footer">
            <div class="comment__date">
                <?=  get_comment_date( 'j F Y'  ); ?>
            </div>
            <?= comment_reply_link( array_merge( $args, array(
                'reply_text' => __('відповісти', 'yos'),
                'depth'     => 1,
                'max_depth' => 2,
                'before'    => '<div class="button-link comment__reply-btn"><span>',
                'after'     => '</span></div>'
            ) ) );  ?>
        </div>
    </div>
</div>
<?php if($dpt>1):?>
        </div>
    </div>
</div>
<?php endif;?>
