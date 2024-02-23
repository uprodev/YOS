<?php
//add_action( 'init', 'wvg_add_custom_fields' );

function wvg_add_custom_fields ()
{
    add_action( 'woocommerce_product_after_variable_attributes', 'wvg_variation_settings_fields', 10, 3 );

}


if ( !function_exists('wvg_variation_settings_fields') ) {
    function wvg_variation_settings_fields($loop, $variation_data, $variation) {
        echo
        "	<div class=\"options_group wvg-gallery\">
		<label>Additional images</label>";
        woocommerce_wp_hidden_input(
            array(
                'id'		=> '_wvg_gallery[' . $variation->ID . ']',
                'name'		=> '_wvg_gallery[' . $variation->ID . ']',
                'value'		=> get_post_meta( $variation->ID, '_wvg_gallery', true )
            )
        );
        echo
        "			<ul class=\"wvg-gallery-images\">";
        $images = get_post_meta( $variation->ID, '_wvg_gallery', true );
        if ($images) {
            $images = explode(';', $images);
            foreach ($images as $image) {
                if (!empty($image)) {
                    $src = wp_get_attachment_image_src($image, 'thumbnail');
                    echo
                    "				<li data-id=\"{$image}\"><img width='100px' src='$src[0]'></li>";
                }
            }
        }
        echo
        "			</ul>";
        echo
            "			<a href=\"#\" class=\"button-primary wvg-gallery-add-button\">".__('Add Variation Images', 'woocommerce-variation-gallery')."</a>
	</div>";
    }
}

add_action( 'woocommerce_save_product_variation', 'wvg_save_variation_fields', 10, 2 );

if ( !function_exists('wvg_save_variation_fields') ) {
    function wvg_save_variation_fields($variation_id, $i) {
        $text_field = $_POST['_wvg_gallery'][ $variation_id ];
        update_post_meta( $variation_id, '_wvg_gallery', esc_attr( $text_field ) );
    }
}

add_action( 'after_setup_theme', 'wvg_actions', 999 );

function wvg_actions() {

    // Add gallery html to available variation data

    add_filter('woocommerce_available_variation', 'wvg_woocommerce_available_variation', 3, 999);

}


function wvg_woocommerce_available_variation($data, $product, $variation){

    //get main image id
    $image = $variation->get_image_id();

    //get additional images ids
    if ($gallery_ids = get_post_meta($variation->get_id(), '_wvg_gallery', true)) {
        $gallery_ids = explode(';', $gallery_ids);
    } else {
        $parent = $variation->get_parent_id();
        $parent = wc_get_product($parent);
        $gallery_ids = $parent->get_gallery_image_ids();
    }

    ob_start();
    ?>
    <div class="woocommerce-product-gallery images">
        <figure class="woocommerce-product-gallery__wrapper">
            <?php
            if ( $image ) {
                echo wc_get_gallery_image_html( $image, true );
            }
            if ( $gallery_ids ) {
                foreach ( $gallery_ids as $gallery_id ) {

                    if ($gallery_id != '') {
                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $gallery_id ), $gallery_id );
                        // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
                    }

                }
            }
            ?>


        </figure>
    </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    $data['gallery'] = $output;

    return $data;
}


// Function to render LiveChat JS code
function add_script_gallery() {
    ?>
    <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var meta_image_frame;

            $(document).on('click', '.wvg-gallery-add-button', function(event){
                event.preventDefault ? event.preventDefault() : (event.returnValue = false);
                var gallery = $(this).parent('div');

                meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                    title: 'Choose image(s)',
                    multiple: 'add',
                    button: { text:  'Choose image(s)' },
                    library: { type: 'image' }
                });

                meta_image_frame.on('select', function(){
                    var selection = meta_image_frame.state().get('selection');
                    var size = 'thumbnail';
                    selection.map(function(attachment) {
                        attachment = attachment.toJSON();
                        var field = gallery.find('input');
                        field.val(field.val() + attachment.id + ';');
                        gallery.find('ul.wvg-gallery-images').append("<li data-id=\""+attachment.id+"\"><img src=" +attachment.url+ " /></li>");
                    });
                    gallery.find('input').trigger('change');
                });

                meta_image_frame.open();
            });

            //Remove image from input and list
            $(document).on('click', 'ul.wvg-gallery-images li', function(event){
                event.preventDefault ? event.preventDefault() : (event.returnValue = false);
                var attId = $(this).attr('data-id');
                var gallery = $(this).parent('ul').parent('div');
                $(this).remove();
                var field = gallery.find('input').val();
                field = field.replace(attId + ';', '');
                gallery.find('input').val(field);
                gallery.find('input').trigger('change');
            });

        });
    </script>

    <style>
        div.options_group.wvg-gallery {
            position: relative;
        }

        ul.wvg-gallery-images {
            display: inline-block;
            float: left;
            width: 100%;
            clear: both;
            margin-top: 0px;
        }

        ul.wvg-gallery-images li {
            width: 80px;
            float: left;
            border: 1px solid #d5d5d5;
            margin: 9px 9px 0 0;
            background: #f7f7f7;
            border-radius: 2px;
            position: relative;
            box-sizing: border-box;
            cursor: pointer;
        }

        ul.wvg-gallery-images li img {
            max-width: 100%;
        }

        ul.wvg-gallery-images li:hover:after {
            font-family: Dashicons;
            content: "\f153";
            display: block;
            position: absolute;
            width: 20px;
            height: 20px;
            top: -10px;
            right: -10px;
            line-height: 20px;
            font-size: 20px;
            text-align: center;
            color: red;
        }

        div.options_group.wvg-gallery a.wvg-gallery-add-button {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
    <!-- End of LiveChat code -->
    <?php
}
add_action( 'admin_footer', 'add_script_gallery' ); // For back-end
