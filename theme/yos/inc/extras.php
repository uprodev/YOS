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

    $fields['rating'] = $myrate_field;
    $fields['photo'] = $myphoto_field;
    $fields['author'] = $myauthor_field;
    $fields['email'] = $myemail_field;
    $fields['comment'] = $mycomment_field;

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

/* comment dropzone field */


add_action( 'comment_form_logged_in_after', 'extend_comment_custom_fields' );
add_action( 'comment_form_after_fields', 'extend_comment_custom_fields' );
function extend_comment_custom_fields() {

    echo '<div class="add-comment__form-field dropzone"><button type="button" class="button-primary light drop-zone">'.__('Додати медіафайл', 'yos').' <input id="photo" name="photo" type="file"/></button><div class="drop-zone__preview dropzone-previews"></div><input type="hidden" name="media_ids"></div>';
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
    $order['popularity'] = __('За популярністю', 'yos');
    $order['price'] = __('За зростанням ціни', 'yos');
    $order['price-desc'] = __('За спаданням ціни', 'yos');
    $order['date'] = __('Новинки', 'yos');

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


function doublee_filter_yoast_breadcrumb_items( $link_output, $link ) {

    $new_link_output = '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
    $new_link_output .= '<a href="' . $link['url'] . '" itemprop="url">' . $link['text'] . '</a>';
    $new_link_output .= '</li>';

    return $new_link_output;
}
add_filter( 'wpseo_breadcrumb_single_link', 'doublee_filter_yoast_breadcrumb_items', 10, 2 );

function doublee_filter_yoast_breadcrumb_output( $output ){

    $from = '<span>';
    $to = '</span>';
    $output = str_replace( $from, $to, $output );

    return $output;
}
add_filter( 'wpseo_breadcrumb_output', 'doublee_filter_yoast_breadcrumb_output' );


add_filter( 'dgwt/wcas/tnt/indexer/readable/product/data', function ( $data, $product_id, $product ) {

    $term = $product->getTerms( 'pa_brand', 'string' );

    if ( ! empty( $term ) ) {

        $html = '<span class="suggestion-book-author">';
        $html .= $term;
        $html .= '</span>';


        $data['meta']['pa_brand'] = $html;
    }

    return $data;
}, 10, 3 );


add_filter( 'dgwt/wcas/indexer/taxonomies', function ( $taxonomies ) {
    $taxonomies[] = 'pa_brand';
    return $taxonomies;
} );


add_filter( 'woocommerce_coupon_message', 'remove_coupon_message' );
add_filter( 'woocommerce_coupon_error', 'remove_coupon_message' );

function remove_coupon_message() {
    return;
}


add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );

function custom_woocommerce_get_catalog_ordering_args( $args ) {
    if (isset($_GET['orderby']) && 'price' === $_GET['orderby']) {
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'ASC';
        $args['meta_key'] = '_price';
    }
    return $args;
}

add_action( 'woocommerce_product_query', 'custom_woocommerce_product_query' );
function custom_woocommerce_product_query( $q ) {
    if (isset($_GET['orderby']) && 'price' === $_GET['orderby']) {
        add_filter( 'posts_clauses', 'order_by_default_variation_min_price_clause' );
    }
}

function order_by_default_variation_min_price_clause( $clauses ) {
    global $wpdb;
    remove_filter( 'posts_clauses', 'order_by_default_variation_min_price_clause' );

    // Тут добавляем логику для определения ID дефолтной вариации
    $clauses['join'] .= " LEFT JOIN {$wpdb->postmeta} as pm ON {$wpdb->posts}.ID = pm.post_id AND pm.meta_key = '_default_variation_id'";

    $clauses['orderby'] = "COALESCE(pm.meta_value, {$wpdb->postmeta}.meta_value+0) ASC";

    return $clauses;
}
