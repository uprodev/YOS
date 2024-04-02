<?php

return;
/* unset checkout fields */

add_filter( 'woocommerce_checkout_fields' , 'quadlayers_remove_checkout_fields' );

function quadlayers_remove_checkout_fields( $fields ) {

    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['order']['order_comments']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_state']);
    return $fields;

}


add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta', 9999 );

function my_custom_checkout_field_update_order_meta( $order_id ) {



    if ( ! empty( $_POST['billing_mid_name'] ) )
        update_post_meta( $order_id, 'billing_mid_name', sanitize_text_field( $_POST['billing_mid_name'] ) );

    if ( ! empty( $_POST['shipping_mid_name'] ) )
        update_post_meta( $order_id, 'shipping_mid_name', sanitize_text_field( $_POST['shipping_mid_name'] ) );


   // if ( ! empty( $_POST['shipping_mid_name'] ) )
        update_post_meta( $order_id, 'test', json_encode( $_POST ) );
        update_field( 'test2', json_encode( $_POST ), $order_id );


}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta($order){

    if (get_post_meta($order->id, 'billing_mid_name', true))
    echo '<p><strong>По-батькові:</strong> ' . get_post_meta($order->id, 'billing_mid_name', true) . '</p>';


}

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta2', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta2($order){

    if (get_post_meta($order->id, 'shipping_mid_name', true))
        echo '<p><strong>По-батькові:</strong> ' . get_post_meta($order->id, 'shipping_mid_name', true) . '</p>';


}






add_action( 'woocommerce_admin_order_data_after_billing_address', 'show_new_checkout_field_emails', 20, 4 );


function show_new_checkout_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
    if ( get_post_meta( $order->get_id(), 'billing_mid_name', true ) ) echo '<p><strong>'. __('По-батькові', 'yos').': </strong> ' . get_post_meta( $order->get_id(), 'billing_mid_name', true ) . '</p>';
    if ( get_post_meta( $order->get_id(), 'shipping_mid_name', true ) ) echo '<p><strong>'. __('По-батькові', 'yos').': </strong> ' . get_post_meta( $order->get_id(), 'shipping_mid_name', true ) . '</p>';
}







remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );

add_action( 'woocommerce_review_order_and_proceed', 'woocommerce_order_review', 20 );
