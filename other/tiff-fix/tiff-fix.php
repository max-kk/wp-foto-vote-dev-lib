<?php
/*
apply_filters( 'fv/public/upload/media_handle_upload_overrides',
    array(
        'test_form'=>false,
        'test_type'=>true,
        'mimes'=> array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png',
        )
), $new_photo_data)
*/

// Allow upload .tiff files
// Requrires PHP 5.3+
add_filter('fv/public/upload/media_handle_upload_overrides', function($args, $photo_data_arr) {
    $args['mimes']['tif'] = 'image/tiff';
    return $args;
});