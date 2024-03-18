<?php
/**
 * Smash Balloon Instagram Feed Main Template
 * Creates the wrapping HTML and adds settings as attributes
 *
 * @version 2.9 Instagram Feed by Smash Balloon
 *
 */
// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$feed_styles     = SB_Instagram_Display_Elements::get_feed_style( $settings ); // already escaped
$feed_atts       = SB_Instagram_Display_Elements::get_feed_container_data_attributes( $settings );
$sb_images_style = SB_Instagram_Display_Elements::get_sbi_images_style( $settings ); // already escaped
$feed_classes    = SB_Instagram_Display_Elements::get_feed_container_css_classes( $settings, $additional_classes ); // already escaped

/**
 * Add HTML or execute code before the feed displays.
 * sbi_after_feed works the same way but executes
 * after the feed
 *
 * @param array $posts Instagram posts in feed
 * @param array $settings settings specific to this feed
 *
 * @since 2.2
 */



sbi_header_html( $settings, $header_data, 'outside' );
?>

<div id="sb_instagram" class="top-space-80 top-space-md-150"  data-feedid="<?php echo esc_attr( $feed_id ); ?>" <?php echo $feed_atts; ?> data-shortcode-atts="<?php echo esc_attr( $shortcode_atts ); ?>">
    <div class="instagram">
        <div class="container">
	        <?php sbi_header_html( $settings, $header_data ); ?>

            <div id="sbi_images" class="swiper" data-slider="instagram">
                <div class="swiper-wrapper">
                    <?php if ( ! in_array( 'ajaxPostLoad', $flags, true ) ) {
                        $this->posts_loop( $posts, $settings );
                    }?>
                </div>
            </div>

        </div>
    </div>
</div>
