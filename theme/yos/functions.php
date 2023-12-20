<?php 

add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );
add_action('after_setup_theme', 'theme_register_nav_menu');


function add_styles() {
	wp_enqueue_style('normalizecss', get_template_directory_uri().'/css/normalize.css');
  wp_enqueue_style('fontscss', get_template_directory_uri().'/css/font.css');
	wp_enqueue_style('fontawesomecss', get_template_directory_uri().'/fonts/fontawesome-5-pro-master/css/all.css');
	wp_enqueue_style('fancyboxcss', get_template_directory_uri().'/css/jquery.fancybox.min.css');
  wp_enqueue_style('swipercss', get_template_directory_uri().'/css/swiper.min.css' );
  wp_enqueue_style('niceselectcss', get_template_directory_uri().'/css/nice-select.css');
  wp_enqueue_style('styles', get_template_directory_uri().'/css/styles.css');
	wp_enqueue_style('responsive', get_template_directory_uri().'/css/responsive.css');
	wp_enqueue_style( 'theme', get_stylesheet_uri(), );

}

function add_scripts() {

	wp_deregister_script('jquery');

	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), false, true);
	wp_enqueue_script( 'fancyboxjs', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), false, true);
	wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/js/swiper.js', array(), false, true);
	wp_enqueue_script( 'niceselectjs', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), false, true);
	wp_enqueue_script( 'cuttrjs', get_template_directory_uri() . '/js/cuttr.min.js', array(), false, true);
	wp_enqueue_script( 'nicescrolljs', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), false, true);
	wp_enqueue_script( 'maskjs', get_template_directory_uri() . '/js/jquery.mask.min.js', array(), false, true);
	wp_enqueue_script( 'countdownjs', get_template_directory_uri() . '/js/countdown.js', array(), false, true);
	wp_enqueue_script( 'stickyjs', get_template_directory_uri() . '/js/jquery.sticky.js', array(), false, true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), false, true);

	// wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), false, true);

	// wp_localize_script('script', 'global',
	// 	array(
	// 		'url' => admin_url('admin-ajax.php'),
	// 		'template' => get_template_directory_uri()
	// 	)
	// );


}




function theme_register_nav_menu(){
	register_nav_menus( array(
        'main-menu' => 'header',
        'mob-menu'  => 'mobile',
       )
    );
	add_theme_support( 'post-thumbnails'); 
}



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();

	acf_add_options_sub_page('Header&Footer');
}


add_filter( 'body_class','my_class_names' );
function my_class_names( $classes ) {

	
	// if( is_page(63) ){
	// 	$classes[] = 'page page-contact';
	// }
	
	return $classes;
}

function phone_clear($phone_num){ 
    $phone_num = preg_replace("![^0-9]+!",'',$phone_num);
    return($phone_num); 
}				
// <?php echo phone_clear(get_field('phone', 'options')); 

function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAh1NE8kfXzx31UyPrwTCqwJdETUseulmI'); // Ваш ключ Google API
}

add_action('acf/init', 'my_acf_init');