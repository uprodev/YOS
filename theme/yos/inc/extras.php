<?php

/* li class top menu */

function atg_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'top-menu') {
        $classes[] = 'header-actions__item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

/* pagination markup */

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

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

