<?php
/*
*
DROPZONE
*/
add_action( 'wp_ajax_handle_dropped_media', 'handle_dropped_media' );
add_action( 'wp_ajax_nopriv_handle_dropped_media', 'handle_dropped_media' );

function handle_dropped_media() {

    status_header(200);



    // $newupload = [];

    if ( !empty($_FILES) ) {
        $files = $_FILES;
        foreach($files as $file) {
            $newfile = array (
                'name' => $file['name'],
                'type' => $file['type'],
                'tmp_name' => $file['tmp_name'],
                'error' => $file['error'],
                'size' => $file['size']
            );

            $_FILES = array('upload'=>$newfile);
            foreach($_FILES as $file => $array) {
                $newupload  = insert_attachment( $file  );

            }

        }
    }

    echo $newupload;

    die();
}


function insert_attachment($file_handler) {
    // check to make sure its a successful upload
    //  if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload( $file_handler, 0 );

    return intval($attach_id);
}


add_action( 'wp_ajax_handle_deleted_media', 'handle_deleted_media' );

function handle_deleted_media(){

    if( isset($_REQUEST['media_id']) ){
        $post_id = absint( $_REQUEST['media_id'] );

        $status = wp_delete_attachment($post_id, true);

        if( $status )
            echo json_encode(array('status' => 'OK'));
        else
            echo json_encode(array('status' => 'FAILED'));
    }


    die();
}


