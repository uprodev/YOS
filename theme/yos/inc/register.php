<?php

add_action('wp_ajax_registration_validation', 'registration_validation');
add_action('wp_ajax_nopriv_registration_validation', 'registration_validation');
function registration_validation(  )  {

    $reg_errors = new WP_Error;

    $email      =  sanitize_email($_POST['email']);
    $password   =  esc_attr($_POST['password']);
    $password_confirm   =  esc_attr($_POST['password_confirm']);
    $first_name =  sanitize_text_field($_POST['first_name']);
    $last_name  =  sanitize_text_field($_POST['last_name']);
    $bio =  sanitize_text_field($_POST['bio']);
    $group =  sanitize_text_field($_POST['group']);
    $facultet  =  sanitize_text_field($_POST['facultet']);
    $media  =  sanitize_text_field($_POST['media_ids']);

    if (empty( $password ) || empty( $email ) || empty( $first_name ) || empty( $last_name )) {
        $reg_errors->add('field','Required form field is missing');
    }

    if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'Password length must be greater than 5' );
    }

    if ( $password != $password_confirm) {
        $reg_errors->add( 'password', 'Password not confirmed' );
    }

    if ( !is_email( $email ) ) {
        $reg_errors->add('email_invalid', 'Email is not valid');
    }

    if ( email_exists( $email ) ) {
        $reg_errors->add('email', 'Email Already in use');
    }

    if (  !empty($reg_errors->errors ) )  {
        foreach ( $reg_errors->get_error_messages() as $error ) {
            echo '<div class="error-message"><strong>';
            echo $error . '</strong><br/>';

            echo '</div>';
        }
    } else {

        complete_registration( $password, $email, $first_name, $last_name, $group, $facultet, $bio, $media);

    }



    die();
}

function complete_registration(  $password, $email, $first_name, $last_name, $group, $facultet, $bio, $media) {


    $userdata = array(
        'user_login'    =>  $first_name,
        'user_email'    =>  $email,
        'user_pass'     =>  $password,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        'description'   =>   $bio,
    );
    $user_id = wp_insert_user( $userdata );

    nocache_headers();

    update_user_meta( $user_id, 'id_group', $group );
    update_user_meta( $user_id, 'facultet', $facultet  );
    update_user_meta( $user_id, 'id_student', $user_id );
    update_user_meta( $user_id, 'foto', $media );
//    wp_clear_auth_cookie();
//    wp_set_auth_cookie( $user_id );

//    echo '<script>  location.href = "'.get_permalink(34).'"; </script>';

    echo '<strong>Wait for your approved</strong>';

}


function my_login_action()  {



    if(!isset($_POST['action']) || $_POST['action'] !== 'my_login_action')
        return;

    $info = array();
    $info['user_login'] = $_POST['email'];
    $info['user_password'] = $_POST['pwd'];

    $result = wp_signon( $info, false );

    if(is_wp_error($result))

        wp_send_json([
            'msg' => 'Login failed. Wrong password or user name?',
        ]);

    else

        wp_send_json([
            'url' => get_permalink(344),
            'msg' => 'Processing..'
        ]);

    wp_redirect( get_permalink(34));



    exit;
};


add_action('wp_ajax_my_login_action', 'my_login_action');
add_action('wp_ajax_nopriv_my_login_action', 'my_login_action');

//add_role( 'student', 'Студент', array(
//    'read'         => true,  // true разрешает эту возможность
//    'edit_posts'   => true,  // true разрешает редактировать посты
//    'upload_files' => true,  // может загружать файлы
//) );