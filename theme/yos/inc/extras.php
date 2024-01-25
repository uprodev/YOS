<?php

/* li class top menu */

function atg_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'top-menu') {
        $classes[] = 'header-actions__item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

/* custom guttenberg block*/

function cq_register_blocks() {
    if( ! function_exists('acf_register_block') )
        return;
    acf_register_block( array(
        'name'          => 'custom_products',
        'title'         => 'Products',
        'render_template'   => 'blocks/products.php',
        'category'      => 'common',
        'icon'          => 'archive',
        'mode'          => 'edit',
        'keywords'      => array( 'profile', 'user', 'author' )
    ));
}
add_action('acf/init', 'cq_register_blocks' );

/* woocommerce breadcrumbs */

add_filter( 'woocommerce_breadcrumb_defaults', 'custom_woocommerce_breadcrumbs' );
function custom_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' ',
        'wrap_before' => '<ul class="breadcrumbs">',
        'wrap_after'  => '</ul>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => __( 'головна', 'yos' ),
    );
}

/* pagination markup */

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

/* comments field order */

function all_commentfields( $fields ) {

    $mycomment_field = $fields['comment'];
    $myauthor_field = $fields['author'];
    $myemail_field = $fields['email'];
    $myrate_field = $fields['rating'];

    unset( $fields['comment'], $fields['author'], $fields['email'], $fields['rating'] );

    $fields['author'] = $myauthor_field;
    $fields['email'] = $myemail_field;
    $fields['comment'] = $mycomment_field;
    $fields['rating'] = $myrate_field;

    return $fields;
}

add_filter( 'comment_form_fields', 'all_commentfields' );

/* excerpt */

add_filter( 'excerpt_length', function(){
    return 20;
} );

add_filter( 'excerpt_more', function( $more ) {
    return '...';
} );

add_filter('wpcf7_autop_or_not', '__return_false');

/* Comment Depth */

function get_comment_depth( $my_comment_id ) {
    $depth_level = 0;
    while( $my_comment_id > 0  ) {
        $my_comment = get_comment( $my_comment_id );
        $my_comment_id = $my_comment->comment_parent;
        $depth_level++;
    }
    return $depth_level;
}

/* recently viewed products */

add_action( 'template_redirect', 'recently_viewed_product_cookie', 20 );

function recently_viewed_product_cookie() {

    if ( ! is_product() ) {
        return;
    }


    if ( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
        $viewed_products = array();
    } else {
        $viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
    }


    if ( ! in_array( get_the_ID(), $viewed_products ) ) {
        $viewed_products[] = get_the_ID();
    }

    if ( sizeof( $viewed_products ) > 10 ) {
        array_shift( $viewed_products );
    }


    wc_setcookie( 'woocommerce_recently_viewed_2', join( '|', $viewed_products ) );

}

function recently_viewed_products() {

    if( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
        $viewed_products = array();
    } else {
        $viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
    }

    if ( empty( $viewed_products ) ) {
        return;
    }

    $product_id = [];

    foreach ( WC()->cart->get_cart() as $cart_item ) {

        $product_id[] = $cart_item['product_id'];

    }

    $viewed_products = array_reverse( array_map( 'absint', $viewed_products ) );

    $result = array_diff($viewed_products, $product_id);
    $first = array_shift($result);

    return $first;

}