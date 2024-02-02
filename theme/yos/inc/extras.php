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
    $myphoto_field = $fields['photo'];

    unset( $fields['comment'], $fields['author'], $fields['email'], $fields['rating'], $fields['photo']);

    $fields['author'] = $myauthor_field;
    $fields['email'] = $myemail_field;
    $fields['comment'] = $mycomment_field;
    $fields['photo'] = $myphoto_field;
    $fields['rating'] = $myrate_field;

    return $fields;
}

add_filter( 'comment_form_fields', 'all_commentfields' );


add_action( 'comment_post', 'save_comment_meta_data' );
function save_comment_meta_data( $comment_id ) {
    if ( ( isset( $_POST['media_ids'] ) ) && ( $_POST['media_ids'] != '') )
        $photo = explode(",", $_POST['media_ids']);
    add_comment_meta( $comment_id, 'photos', $photo );
    update_field( 'photos', $photo, get_comment($comment_id) );
}

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

/* add to fav */

function is_favorite($product_id) {
    if (is_user_logged_in() ) {
        $fav = get_field('fav', 'user_'. get_current_user_id()) ? get_field('fav', 'user_'. get_current_user_id()) :[];
    } else {
        $fav =  $_COOKIE['fav'] ? $_COOKIE['fav'] : [];
    }

    if ($fav){
        $fav = explode('|', $fav);
    }


    if (in_array($product_id, $fav)){
        return 'active';
    }

}

remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );


/* alphabet brand */

add_filter( 'terms_clauses', 'terms_clauses_47840519', 10, 3 );
function terms_clauses_47840519( $clauses, $taxonomies, $args ){
    global $wpdb;

    if( !isset( $args['__first_letter'] ) ){
        return $clauses;
    }

    $clauses['where'] .= ' AND ' . $wpdb->prepare( "t.name LIKE %s", $wpdb->esc_like( $args['__first_letter'] ) . '%' );

    return $clauses;

}



add_filter('woocommerce_catalog_orderby', function($order) {
    unset($order['menu_order']);
    unset($order['rating']);
    $order['popularity'] = __('Вибір YOS', 'yos');

    return $order;

});

function add_points_widget_to_fragment( $fragments ) {

    $fragments['.basket-count'] =  '<button class="basket-count" data-action="open-side-basket">'.  WC()->cart->get_cart_contents_count() . '</button>';

    $fragments['.count-side'] = '<span class="count-side">'. WC()->cart->get_cart_contents_count() .'</span>';

    ob_start();
    woocommerce_mini_cart();
    $fragments['.side-basket__container'] = ob_get_clean();

    return $fragments;
}
add_filter('add_to_cart_fragments', 'add_points_widget_to_fragment');


/* comment dropzone field */


add_action( 'comment_form_logged_in_after', 'extend_comment_custom_fields' );
add_action( 'comment_form_after_fields', 'extend_comment_custom_fields' );
function extend_comment_custom_fields() {

    echo '<div class="add-comment__form-field dropzone"><button type="button" class="button-primary light drop-zone">'.__('Додати медіафайл', 'yos').' <input id="photo" name="photo" type="file"/></button><div class="drop-zone__preview dropzone-previews"></div><input type="hidden" name="media_ids"></div>';
}
