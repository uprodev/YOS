<?php
/**
 * Smash Balloon Instagram Feed Item Template
 * Adds an image, link, and other data for each post in the feed
 *
 * @version 2.9 Instagram Feed by Smash Balloon
 *
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$classes = SB_Instagram_Display_Elements::get_item_classes( $settings, $post );
$post_id = SB_Instagram_Parse::get_post_id( $post );
$timestamp = SB_Instagram_Parse::get_timestamp( $post );
$media_type = SB_Instagram_Parse::get_media_type( $post );
$permalink = SB_Instagram_Parse::get_permalink( $post );
$maybe_carousel_icon = $media_type === 'carousel' ? SB_Instagram_Display_Elements::get_icon( 'carousel', $icon_type ) : '';
$maybe_video_icon = $media_type === 'video' ? SB_Instagram_Display_Elements::get_icon( 'video', $icon_type ) : '';
$media_url = SB_Instagram_Display_Elements::get_optimum_media_url( $post, $settings, $resized_images );
$media_full_res = SB_Instagram_Parse::get_media_url( $post );
$sbi_photo_style_element = SB_Instagram_Display_Elements::get_sbi_photo_style_element( $post, $settings ); // has already been escaped
$media_all_sizes_json = SB_Instagram_Parse::get_media_src_set( $post, $resized_images );

/**
 * Text that appears in the "alt" attribute for this image
 *
 * @param string $img_alt full caption for post
 * @param array $post api data for the post
 *
 * @since 2.1.5
 */
$img_alt = SB_Instagram_Parse::get_caption( $post, sprintf( __( 'Instagram post %s', 'instagram-feed' ), $post_id ) );
$img_alt = apply_filters( 'sbi_img_alt', $img_alt, $post );

/**
 * Text that appears in the visually hidden screen reader element
 *
 * @param string $img_screenreader first 50 characters for post
 * @param array $post api data for the post
 *
 * @since 2.1.5
 */
$img_screenreader = substr( SB_Instagram_Parse::get_caption( $post, sprintf( __( 'Instagram post %s', 'instagram-feed' ), $post_id ) ), 0, 50 );
$img_screenreader = apply_filters( 'sbi_img_screenreader', $img_screenreader, $post );

$header_title = $posts[0]['username'];

if($posts[2]['id'] == $post_id):
?>
<div class="swiper-slide hide-in-mobile">
    <div class="category-links">
        <h2 class="category-links__title title-2">instagram</h2>
        <div class="category-links__list swiper" data-slider="category-links-list" data-mobile="false">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/<?= $header_title;?>/" target="_blank" rel="nofollow noopener"  class="sbi_header_link">#<?php echo $header_title ?></a>
                </div>
            </div>
            <div class="swiper-scrollbar slider-scrollbar"></div>
        </div>
    </div>
</div>
<?php endif;?>
<div class="swiper-slide">
    <a href="<?php echo esc_url( $permalink ); ?>" class="instagram-card">
        <div class="instagram-card__img ibg">
            <img src="<?php echo esc_url( $media_full_res ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
        </div>
    </a>
</div>
