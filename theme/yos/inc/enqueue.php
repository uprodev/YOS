<?php

add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_styles() {
    wp_enqueue_style('styles', get_template_directory_uri().'/css/style.css', array(), rand(1111, 9999));
    wp_enqueue_style( 'theme', get_stylesheet_uri() );

}


function add_scripts() {

    wp_enqueue_script( 'vendorsjs', get_template_directory_uri() . '/js/vendors.js', array(), rand(1111, 9999), false);
    wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), rand(1111, 9999), false);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'), rand(1111, 9999), true);

    if (is_product()){
        wp_enqueue_script( 'comment-reply' );
    }

    wp_localize_script('script', 'globals',
        array(
            'url' => admin_url('admin-ajax.php'),
            'template' => get_template_directory_uri(),
        )
    );


}