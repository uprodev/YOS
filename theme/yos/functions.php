<?php

include 'inc/enqueue.php';     // add styles and scripts
include 'inc/acf.php';         // custom acf functions
include 'inc/extras.php';      // custom functions
include 'classes/walker.php';  // walker nav menu
include 'inc/register.php';    // custom ajax register and auth
include 'inc/ajax-actions.php';// ajax actions
include 'inc/checkout.php';    // checkout actions
include 'inc/dropzone.php';   // dropzone comments
include 'inc/variation-gallery.php';   // variation-gallery


add_action('after_setup_theme', 'theme_register_nav_menu');


function theme_register_nav_menu(){
	register_nav_menus( array(
        'top-menu' => 'header-top',
        'mob-menu' => 'mobile-menu',
        'categories'  => 'categories',
        'footer-category'  => 'footer-category',
        'footer-info' => 'footer-info',
       )
    );
	add_theme_support( 'post-thumbnails');
}

add_theme_support( 'woocommerce');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

	acf_add_options_sub_page('Theme Settings');
}



function phone_clear($phone_num){
    $phone_num = preg_replace("![^0-9]+!",'',$phone_num);
    return($phone_num);
}

add_action( 'woocommerce_thankyou', 'adding_customers_details_to_thankyou', 10, 1 );
function adding_customers_details_to_thankyou( $order_id ) {
    // Only for non logged in users
    if ( ! $order_id || is_user_logged_in() ) return;

    $order = wc_get_order($order_id); // Get an instance of the WC_Order object

    wc_get_template( 'order/order-details-customer.php', array('order' => $order ));
}

function _nok_order_by_stock_status( $posts_clauses, $query ) {

    // only change query on WooCommerce loops
    if ( $query->is_main_query() && ( is_product_category() || is_product_tag() || is_product_taxonomy() || is_shop() ) ) {
        global $wpdb;

        $posts_clauses['join'] .=
            " LEFT JOIN (
            SELECT post_id, meta_id, meta_value FROM $wpdb->postmeta
            WHERE meta_key = '_stock_status' AND meta_value <> ''
        ) istockstatus ON ($wpdb->posts.ID = istockstatus.post_id) ";

        $posts_clauses['orderby'] =
            " CASE istockstatus.meta_value WHEN
            'outofstock' THEN 1
            ELSE 0
        END ASC, " . $posts_clauses['orderby'];
    }

    return $posts_clauses;
}
add_filter( 'posts_clauses', '_nok_order_by_stock_status', 2000, 2 );


add_action('init', function(){

    if ($_GET['test']) {
        $order = new WC_order(6547);
        print_r(get_field('test2', 6565));
        die();
    }


    if ($_GET['fixsku']) {
        $q = new WP_Query([
            'post_type'      => array('product', 'product_variation'),
            'posts_per_page' => -1,
          //  'post_status' => 'any'
        ]);

        while ($q->have_posts()) {
            $q->the_post();

            $sku = get_post_meta(get_the_id(),'_sku', 1);
            $l = strlen($sku);

            if ($l == 5)
                update_post_meta(get_the_id(),'_sku','0'.$sku);

        }

        die();
    }
});
