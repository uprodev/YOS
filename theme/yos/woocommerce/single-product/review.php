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
$dpt = get_comment_depth(get_comment_ID());

$images = get_field('photos', 'comment_'.get_comment_ID());

?>
<div id="comment-<?php comment_ID(); ?>">
    <div class="comment <?= $dpt>1?'subcomment':'';?>">
        <div class="comment__head">
            <div class="comment__author-name">
                <?php if (1 == $comment->user_id){
                    echo __('Консультант YOS', 'yos');
                }else{
                    comment_author();
                }?>
            </div>
            <?php if($dpt==1):?>
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
                <div class="comment__date">
                    <?=  get_comment_date( 'j.m.Y'  ); ?>
                </div>
            <?php endif;?>
        </div>
        <div class="comment__body">
            <div class="comment__text">
                <?php do_action( 'woocommerce_review_comment_text', $comment );?>
            </div>
            <?php if($images):?>
                <div class="comment-images">
                    <?php foreach ($images as $img){?>
                        <img src="<?= $img['sizes']['woocommerce_gallery_thumbnail'];?>" alt="comment_img">
                    <?php }?>
                </div>
            <?php endif;?>
            <div class="comment__footer">
                <div class="comment__footer-row">

                    <?php if( current_user_can('administrator') && $dpt == 1){

                        comment_reply_link( array_merge( $args, array(
                            'reply_text' => __('відповісти', 'yos'),
                            'depth'     => 1,
                            'max_depth' => 2,
                            'before'    => '<div class="button-link comment__reply-btn" data-open-form><span>',
                            'after'     => '</span></div>'
                        ) ) );

                    }?>
                    <?php if($dpt==1 && $comment->comment_parent==0):?>
                            <div class="comment__answers-count">
                                <img src="<?= get_template_directory_uri();?>/img/icons/answer.svg" alt="">
                                <?= __('1 відповідь', 'yos');?>
                            </div>

                            <div class="comment__likes">
                                <?php comments_like_dislike(get_comment_ID());?>
                            </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

