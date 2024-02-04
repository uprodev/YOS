<?php

include 'inc/enqueue.php';     // add styles and scripts
include 'inc/acf.php';         // custom acf functions
include 'inc/extras.php';      // custom functions
include 'classes/walker.php';  // walker nav menu
include 'inc/register.php';    // custom ajax register and auth
include 'inc/ajax-actions.php';// ajax actions
include 'inc/checkout.php';    // checkout actions
include 'inc/dropzone.php';   // dropzone comments


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

