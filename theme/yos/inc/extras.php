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

/*  Custom Pagination */

function custom_paged(){

    global $wp_query;
    $pgd = get_query_var('paged');

    if($pgd==0){
        $current_page = $pgd+1;
    }else{
        $current_page = $pgd;
    }
    $pgs = $wp_query->max_num_pages;

    if($pgs>1) {
        echo '<nav class="navigation " role="navigation">
            <div class="nav-links">
                <a class="prev page-numbers" href="' . get_previous_posts_page_link() . '" alt=""><img src="' . get_template_directory_uri() . '/img/chev_p.svg" alt=""></a>
                <span aria-current="page" class="page-numbers current"> ' . $current_page . '</span>
                <span class="pg-sep"> / ' . $pgs . '</span>
                <a class="next page-numbers" href="' . get_next_posts_page_link() . '"><img src="' . get_template_directory_uri() . '/img/chev_p.svg" alt=""></a>
            </div>
        </nav>';
    }
}

