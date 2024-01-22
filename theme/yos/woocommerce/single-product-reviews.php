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

$args = array ('post_type' => 'product', 'post_id' => get_the_ID());
$comments = get_comments( $args );
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
                            <?= __('написати відгук', 'yos');?>

                        </button>
                        <div class="add-comment" data-add-comment>
                            <button class="add-comment__btn-close" data-action="close-add-comment">
                                <span class="icon-close-thin"></span>
                            </button>
                            <div class="add-comment__scroll-container">
                                <div class="add-comment__title">
                                    ви можете залишити відгук або
                                    поставити питання
                                </div>
                                <div class="add-comment__subtitle">
                                    <div class="add-comment__text">
                                        Ви можете залишити відгук або поставити
                                        питання. Використовуйте цю форму для того, щоб
                                        залишити відгук про товар або поставити
                                        питання. Усі відгуки, які не стосуються товару,
                                        будуть видалені!
                                    </div>
                                    <div class="add-comment__text-sm">
                                        * залиште свій email, і ми надішлемо сповіщення одразу
                                        після того, як фахівець дасть відповідь на ваше
                                        запитання.
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
                                );

                                $comment_form['fields'] = array();

                                foreach ( $fields as $key => $field ) {
                                    $field_html = '<div class="add-comment__form-field half-lg"><div class="input-wrap" data-input>';

                                    $field_html .= '<input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" class="input" ' . ( $field['required'] ? 'required' : '' ) . ' /><span class="input-label">'.$field['label'].'</span></div></div>';

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
                        <div class="product-comments">
                            <div class="product-comments__list">
                                <div class="comment">
                                    <div class="comment__head">
                                        <div class="comment__author-name">
                                            катерина
                                        </div>
                                        <div class="comment__author-status">
                                            Покупку підтверджено
                                        </div>
                                        <div class="comment__author-set-stars">
                                            <div class="rating" data-rating="5">
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
                                    </div>
                                    <div class="comment__body">
                                        <div class="comment__text">
                                            Брала відтінок Трансільванія, боялась, що буде надто віддавати фіолетовим, але
                                            все добре. Помада матова, приємна при нанесені, але запах мені не зрозумілий
                                            (кожному своє). Стійкість відносна, якщо не куштувати нічого при носці, або
                                            робити це з обережністю, то все добре. Мій відтінок наноситься чудово, зразу,
                                            без
                                            «комків» та потреби нашаровування
                                        </div>
                                        <div class="comment__footer">
                                            <div class="comment__date">
                                                30 листопада 2022
                                            </div>
                                            <button class="button-link comment__reply-btn"><span>відповісти</span></button>
                                        </div>
                                        <div class="comment__subcomments">
                                            <div class="comment">
                                                <div class="comment__head">
                                                    <div class="comment__author-name">
                                                        <img src="img/logo/yos-short-logo.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="comment__body">
                                                    <div class="comment__text">
                                                        КАТЕРИНА, в реальності кольори товарів
                                                        можуть відрізнятися від тих, які Ви
                                                        бачите на екрані - це залежить від
                                                        індивідуальних налаштувань Вашого
                                                        монітора. Також виробник продукції
                                                        залишає за собою право змінювати
                                                        комплектацію, технічні характеристики,
                                                        кольорову гаму товарів і т. Д. Без
                                                        попереднього повідомлення, тому партія
                                                        від партії може відрізнятись.
                                                    </div>
                                                    <div class="comment__footer">
                                                        <div class="comment__date">
                                                            30 листопада 2022
                                                        </div>
                                                        <button
                                                                class="button-link comment__reply-btn"><span>відповісти</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment">
                                                <div class="comment__head">
                                                    <div class="comment__author-name">
                                                        аліса
                                                    </div>
                                                </div>
                                                <div class="comment__body">
                                                    <div class="comment__text">
                                                        Екатерина, мабуть віддінки олівців nude
                                                        beige i nude truffle? Дуже гарний макіяж
                                                        губ!)
                                                    </div>
                                                    <div class="comment__footer">
                                                        <div class="comment__date">
                                                            31 листопада 2022
                                                        </div>
                                                        <button
                                                                class="button-link comment__reply-btn"><span>відповісти</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment">
                                    <div class="comment__head">
                                        <div class="comment__author-name">інна</div>
                                        <div class="comment__author-set-stars">
                                            <div class="rating" data-rating="3">
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
                                    </div>
                                    <div class="comment__body">
                                        <div class="comment__text">
                                            34 - Dubai
                                            Фотографією точчний відтінок важко передати, але, можливо, комусь буде
                                            корисно для приблизного розуміння.
                                            На губах приємна, майже не відчувається. Стійкість середня, але для мене це не
                                            проблема. Замовляла заради гарного кольору.
                                        </div>
                                        <div class="comment__footer">
                                            <div class="comment__date">
                                                29 жовтня 2022
                                            </div>
                                            <button class="button-link comment__reply-btn"><span>відповісти</span></button>
                                        </div>
                                        <div class="comment__subcomments">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-comments__footer">
                                <div class="pagination">
                                    <a href="#" class="button-link"><span>завантажити ще</span></a>
                                    <div class="pagination__fraction">01/13</div>
                                    <a href="#" class="pagination__btn left disabled"><span class="icon-arrow-left"></span></a>
                                    <a href="#" class="pagination__btn right"><span class="icon-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title">
			<?php
			$count = $product->get_review_count();
			if ( $count && wc_review_ratings_enabled() ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
			} else {
				esc_html_e( 'Reviews', 'woocommerce' );
			}
			?>
		</h2>

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
					'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
					'title_reply_after'   => '</span>',
					'comment_notes_after' => '',
					'label_submit'        => esc_html__( 'Submit', 'woocommerce' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'woocommerce' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __( 'Email', 'woocommerce' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
					$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="required">*</span>';
					}

					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

					$comment_form['fields'][ $key ] = $field_html;
				}

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
