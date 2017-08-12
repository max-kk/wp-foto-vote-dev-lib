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

/**
 * PLEASE DO NOT USE WITH MULTIUPLOAD!
 
 * Gets called when an attachment is added, creates the jpeg if the attachment is a tiff
 * @param int $attachment_id
 */
add_action('add_attachment', function($attachment_id){

    if(!class_exists('Imagick'))
    {
        wp_add_notice('Tiff Preview uses the PHP extension Image Magick to convert the TIF files to JPG. Please contact your system administrator to enable Image Magick for this site.', 'warning');
        return;
    }

    $attachment = get_attached_file($attachment_id);
    $JPG_path = dirname($attachment) . '/test.jpg';

    $file_type = wp_check_filetype($attachment);

    if($file_type['type'] == 'image/tiff')
    {

        //make the jpeg if imagick exists
        //this if statement is really just here because imagick is such a fucking bitch to install I gave up trying to install it on
        //my dev box and just tested the imagick functionality on my ste, and the rest on my dev

        //echo 'imagick exists';

        $attachment_pointer = fopen($attachment, 'r');
        $JPG_path = str_replace('.tif', '.jpg', $attachment);

        $im = new Imagick();
        $im->readimage($attachment);
        $im->setimageformat('jpeg');
        $im->writeimage($JPG_path);

        $attachment_post = get_post($attachment_id);

        $upload_dir = wp_upload_dir();
        $upload_dir_url = $upload_dir['url'];

        //make the new jpeg an actual attachment
        wp_update_post(array(
            'ID' => $attachment_id,
            'guid' => $upload_dir_url . '/' . basename($JPG_path),
            'post_mime_type' => 'image/jpeg',
        ));


/*
        $JPG_meta_data = wp_generate_attachment_metadata($attachment_id, $JPG_path);


        //wp_update_attachment_metadata($attachment_id, false);
        wp_update_attachment_metadata($attachment_id, $JPG_meta_data);


        //set the source tif's extra image sizes by changing the preview's metadata a little to point to the tif as the original, but leave the preview's other sizes
        //$attachment_meta_data = $JPG_meta_data;
        //$attachment_meta_data['file'] = trim($upload_dir['subdir'],'/') . '/' . basename($attachment);
        //$attachment_meta_data['file'] = $attachment;

        //update_post_meta($attachment_id, '_wp_attachment_metadata', $JPG_meta_data);
        update_post_meta($attachment_id, '_wp_attached_file', $JPG_meta_data['file']);

*/

        if ( isset($_POST['go-upload']) ) {
            //$photo_data_array = apply_filters('fv/public/upload_before_save', $photo_data_array, $INPUT_NAME);

            add_filter('fv/public/upload_before_save', function($photo_data_array, $INPUT_NAME){
                if ( !empty($photo_data_array['image_id']) && !empty($photo_data_array['url']) ) {
                    $JPG_meta_data = wp_generate_attachment_metadata($photo_data_array['image_id'], $photo_data_array['url']);
                    update_post_meta($photo_data_array['image_id'], '_wp_attached_file', $JPG_meta_data['file']);
                    wp_update_attachment_metadata($photo_data_array['image_id'], $JPG_meta_data);
                }
            });
        }



        //also set the preview image as the post thumbnail (featured image) for the tif
        //set_post_thumbnail($attachment_id, $JPG_id);
    }
});