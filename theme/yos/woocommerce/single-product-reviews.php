<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = round($product->get_average_rating(),1);

$args = array ('post_type' => 'product', 'post_id' => get_the_ID(), 'status' => 'approve');

$comments = get_comments( $args );
if($comments):
$s1 = 0;
$s2 = 0;
$s3 = 0;
$s4 = 0;
$s5 = 0;
foreach($comments as $comment) {
    $user_rate = intval(get_comment_meta($comment->comment_ID, 'rating', true));
    if($user_rate==1) {
        $s1++;
    }elseif($user_rate==2){
        $s2++;
    }elseif($user_rate==3){
        $s3++;
    }elseif($user_rate==4){
        $s4++;
    }elseif($user_rate==5){
        $s5++;
    }
}
$prc1 = round(($s1*100)/$review_count);
$prc2 = round(($s2*100)/$review_count);
$prc3 = round(($s3*100)/$review_count);
$prc4 = round(($s4*100)/$review_count);
$prc5 = round(($s5*100)/$review_count);
endif;
?>
<div class="top-space-60 top-space-md-150">
    <section class="product-reviews" id="reviews">
        <div class="container">
            <div class="product-reviews__inner">
                <div class="product-reviews__head">
                    <?php if($review_count):?>
                        <h2 class="product-reviews__title title-2">
                            відгуки покупців
                            <span>(<?= $review_count;?>)</span>
                        </h2>
                    <?php endif;?>
                    <div class="product-reviews__main-stars">
                        <div class="product-reviews__main-stars-row">
                            <div class="rating" data-rating="<?= $average;?>">
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
                            <div class="product-reviews__main-stars-value">
                                <?= $average;?>
                            </div>
                        </div>
                        <div class="product-reviews__main-stars-row">
                            <div class="product-reviews__count"><?php printf( _n( '%s відгук', '%s відгуки', $review_count, 'yos' ), $review_count);?></div>
                        </div>
                    </div>
                    <div class="product-reviews__chart reviews-chart">
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                5 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: <?= $prc5;?>%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                4 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: <?= $prc4;?>%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                3 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: <?= $prc3;?>%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                2 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: <?= $prc2;?>%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-chart__row">
                            <div class="reviews-chart__star">
                                1 <span class="icon-star-full"></span>
                            </div>
                            <div class="reviews-chart__line">
                                <div class="line-track">
                                    <div class="line" style="width: <?= $prc1;?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-reviews__body">
                    <div class="product-reviews__add-comment">
                        <button class="product-reviews__add-comment-mobile-btn button-primary light"
                                data-action="opne-add-comment">
                            <?php the_field('comments_title', 'options');?>

                        </button>
                        <div class="add-comment" data-add-comment>
                            <button class="add-comment__btn-close" data-action="close-add-comment">
                                <span class="icon-close-thin"></span>
                            </button>
                            <div class="add-comment__scroll-container">
                                <div class="add-comment__title">
                                    <?php the_field('add_comment_title', 'options');?>
                                </div>
                                <div class="add-comment__subtitle">
                                    <div class="add-comment__text">
                                        <?php the_field('add_comment_text', 'options');?>
                                    </div>
                                    <div class="add-comment__text-sm">
                                        <?php the_field('add_comment_note', 'options');?>
                                    </div>
                                </div>
                                <?php $commenter    = wp_get_current_commenter();
                                $comment_form = array(
                                    /* translators: %s is product title */
                                    'title_reply'         => '',
                                    /* translators: %s is product title */
                                    'title_reply_to'      => esc_html__( 'відповісти', 'yos' ),
                                    'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
                                    'title_reply_after'   => '</span>',
                                    'comment_notes_after' => '',
                                    'label_submit'        => esc_html__( 'написати відгук', 'yos' ),
                                    'logged_in_as'        => '',
                                    'comment_field'       => '',
                                    'class_form'           => 'add-comment__form',
                                    'submit_button' =>  '<div class="add-comment__form-footer"><button name="%1$s" type="submit" id="%2$s" class="%3$s button-primary dark">%4$s</button></div>'
                                );

                                $name_email_required = (bool) get_option( 'require_name_email', 1 );
                                $fields              = array(
                                    'author' => array(
                                        'label'    => __( 'Ім’я', 'yos' ),
                                        'type'     => 'text',
                                        'value'    => $commenter['comment_author'],
                                        'required' => $name_email_required,
                                    ),
                                    'email'  => array(
                                        'label'    => __( 'Email', 'yos' ),
                                        'type'     => 'email',
                                        'value'    => $commenter['comment_author_email'],
                                        'required' => $name_email_required,
                                    ),
                                    'photo'  => array(
                                        'label'    => __( 'Photo', 'yos' ),
                                        'type'     => 'file',
                                        'value'    => '',
                                        'required' => false,
                                        'class' => 'drop-zone'
                                    ),
                                );

                                $comment_form['fields'] = array();

                                foreach ( $fields as $key => $field ) {
                                    if($field['class'] == 'drop-zone') {
                                        $field_html = '<div class="add-comment__form-field">';
                                    }else{
                                        $field_html = '<div class="add-comment__form-field half-lg"><div class="input-wrap" data-input>';
                                    }

                                    $field_html .= '<input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" class="input '.$field['class'].'" ' . ( $field['required'] ? 'required' : '' ) . ' /><span class="input-label">'.$field['label'].'</span>';

                                    if($field['class'] == 'drop-zone'){
                                        $field_html .= '<div class="drop-zone__preview dropzone-previews"></div><input type="hidden" name="media_ids"></div>';
                                    }else{
                                        $field_html .= '</div></div>';
                                    }

                                    $comment_form['fields'][ $key ] = $field_html;
                                }
                                if ( wc_review_ratings_enabled() ) {

                                    $comment_form['comment_field'] = '<div class="add-comment__form-stars"><div>'.__('Оцінка', 'yos').'</div><div class="set-stars" data-set-stars><div class="set-stars__item">1</div><div class="set-stars__item">2</div><div class="set-stars__item">3</div><div class="set-stars__item">4</div><div class="set-stars__item">5</div><input type="text" value="0" name="rating" id="rating"></div></div>';
                                }

                                $comment_form['comment_field'] .= '<div class="add-comment__form-field"><div class="textarea-wrap" data-textarea><textarea class="textarea" id="comment" name="comment"></textarea><span class="textarea-label">'.__('Текст повідомлення', 'yos').'</span></div></div>';

				                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );?>

                            </div>
                        </div>
                    </div>
                    <div class="product-reviews__comments">
                        <?php if ( have_comments() ) : ?>
                            <div class="product-comments">
                                <div class="product-comments__list">
                                    <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments','style' => 'div'  ) ) ); ?>
                                </div>
                                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>
                                    <div class="product-comments__footer">
                                        <div class="pagination">
                                            <?php paginate_comments_links(
                                                apply_filters(
                                                    'woocommerce_comment_pagination_args',
                                                    array(
                                                        'prev_text' => '<span class="icon-arrow-left"></span>',
                                                        'next_text' => '<span class="icon-arrow-right"></span>',
                                                        'type'      => 'plain',
                                                    )
                                                )
                                            );?>
                                        </div>
                                    </div>
                                <?php endif;?>

<!--                                        <a href="#" class="button-link"><span>завантажити ще</span></a>-->
<!--                                        <div class="pagination__fraction">01/13</div>-->
<!--                                        <a href="#" class="pagination__btn left disabled"><span class="icon-arrow-left"></span></a>-->
<!--                                        <a href="#" class="pagination__btn right"><span class="icon-arrow-right"></span></a>-->

                            </div>
                        <?php else : ?>
                            <p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

