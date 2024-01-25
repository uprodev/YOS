<?php

$actions = [
    'add_to_cart',
    'set_cart_item_qty',
    'update_totals',
    'update_mini_cart',
    'remove_from_cart',
    'apply_coupon',
    'add_to_fav'
];

foreach($actions as $action){
    add_action('wp_ajax_'.$action, $action);
    add_action('wp_ajax_nopriv_'.$action, $action);
}


/**
 * add_to_cart
 */


function add_to_cart() {
    $product_id = (int)$_GET['product_id'];
    $variation_id = (int)$_GET['variation_id'];
    $qty = (int)$_GET['qty']??1;


    $added = WC()->cart->add_to_cart($product_id, $qty, $variation_id);
    update_totals();

    WC_AJAX :: get_refreshed_fragments();
    wp_die();


}

/*
*

Set Car Item QTY

*/

function set_cart_item_qty() {

    $key = $_GET['key'];
    $qty = (int)$_GET['qty'];
    WC()->cart->set_quantity( $key, $qty, true  );

    update_totals();

    WC_AJAX :: get_refreshed_fragments();

    wp_die();
}


/**
 *
Update Mini Cart
 */

function update_mini_cart() {
    wc_get_template('cart/mini-cart.php');

    die();
}


/**
 * remove_from_cart
 */



function remove_from_cart() {

    WC()->cart->remove_cart_item( $_GET['key'] );

    update_totals();

    WC_AJAX :: get_refreshed_fragments();

    die();
}

/**
 *
Update Totals
 */


function update_totals() {

    ob_start();


    WC()->cart->calculate_totals();

    $sub = WC()->cart->get_cart_subtotal();
    $count = WC()->cart->get_cart_contents_count();


    $html = ob_get_clean();

    wp_send_json_success(
        ['totals' => $html,
            'cart_qty' => $count,
            'subtotal' => $sub,
        ]
    );


    die();
}


/* apply_coupon */

function apply_coupon(){
    $coupon = $_POST['coupon'];

    $coupon_code = wc_get_coupon_id_by_code($coupon);
    if ($coupon_code) {
        WC()->cart->apply_coupon($coupon);

        $total = WC()->cart->get_cart_total();
        $discount = WC()->cart->get_cart_discount_total();

        wp_send_json(['message' => '<div class="promotional-code__text">'.__('промокод успішно застосуваний', 'yos').'</div>',
            'total' => $total,
            'discount' => $discount,
        ]);
    }else{
        wp_send_json(['message' => '<div class="promotional-code__text text-color-warning">'.__('Термін дії промокоду закінчено!', 'yos').'</div>']);
    }

    die();
}


/* add to fav*/

function add_to_fav() {
    $user_id = $_POST['user_id'];
    $fav = $_POST['fav'];
    update_field('fav',$fav, 'user_'.$user_id);


    wp_die();
}


