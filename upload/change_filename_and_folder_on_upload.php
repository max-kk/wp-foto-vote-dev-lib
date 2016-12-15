<?php
/**
    Version 1.0

    This code allows change on upload filename from
    /wp-content/uploads/fv-contest/c1/
    to
    /wp-content/uploads/fv-contest/c4/dslr-wildlife/Gator_Flipping_3960_Bill_Smith_dslr-wildlife.jpg
    or detailed:
    /wp-content/uploads/fv-contest/c{CONTEST_ID}/{meta_Camera-Subject}/{filename}_{meta_first_name}_{meta_last_name}_{meta_Camera-Subject}.{ext}

    Where:
        "dslr-wildlife" is a value from Drobdown with Meta key 'Camera-Subject'
        "Bill" is a value from Text with Meta key 'first_name'
        "Smith" is a value from Text with Meta key 'last_name'

    Example: https://yadi.sk/i/3OjNjs9k33aTP2
    Note: with using this code you can disable "Save photo to custom folder" in "Dashboard" => "Photo Contest => Settings => Upload Tab"
 */

/**
 * Called in wp-foto-vote\public\class-fv-public-ajax.php
 */
add_action('fv/public/before_upload', 'fv_public_before_upload_action932', 10);

function fv_public_before_upload_action932 () {
    add_filter('upload_dir', 'fv_filter_upload_dir932', 20);
    add_filter('wp_unique_filename', 'fv_unique_filename_callback932', 10, 4);
}

/**
 * Called in wp-foto-vote\public\class-fv-public-ajax.php
 */
add_action('fv/public/after_upload', 'fv_public_after_upload_action932', 10);

function fv_public_after_upload_action932 () {
    remove_filter('upload_dir', 'fv_filter_upload_dir932', 20);
    remove_filter('wp_unique_filename', 'fv_unique_filename_callback932', 10);
}

/**
 * Called in wp-foto-vote\public\class-fv-public-ajax.php
 */
add_filter( 'fv/public/upload/media_handle_upload_overrides', 'fv_public_upload_media_handle_upload_overrides932', 10, 2 );

function fv_public_upload_media_handle_upload_overrides932 ($array, $new_photo_data)
{
    if ( !isset($new_photo_data['meta']['first_name']) ) {
        $new_photo_data['meta']['first_name'] = '-';
    }
    if ( !isset($new_photo_data['meta']['last_name']) ) {
        $new_photo_data['meta']['last_name'] = '-';
    }
    if ( !isset($new_photo_data['meta']['camera-subject']) ) {
        $new_photo_data['meta']['camera-subject'] = '-';
    }

    wp_cache_set('fv_new_photo_data', $new_photo_data, 'fv');
    return $array;
}

/**
 * Change filename to Custom
 *
 * @return string $filename2

 * Called in wp-includes\functions.php :: wp_unique_filename
 * apply_filters( 'wp_unique_filename', $filename2, $ext, $dir, $unique_filename_callback )
 */
function fv_unique_filename_callback932( $filename, $ext, $dir, $unique_filename_callback)
{
    // IF not saved Photo data
    if ( !$new_photo = wp_cache_get('fv_new_photo_data', 'fv') ) {
        return $filename;
    }

    $filename = basename($filename, $ext);

    // {filename}_{first_name}_{last_name}_{Camera-Subject}.{ext}
    $filename .= '_' . strtolower($new_photo['meta']['first_name']) .
        '_' . strtolower($new_photo['meta']['last_name']) .
        '_' . strtolower($new_photo['meta']['camera-subject'])
        . $ext;

    return $filename;
}

/**
 * Change WP upload dir to custom
 * @param array $path_data
 *
 * @return array $path_data
 */
function fv_filter_upload_dir932($path_data)
{
    if (!empty($path_data['error'])) {
        return $path_data; //error or uploading
    }

    // IF not saved Photo data
    if ( !$new_photo = wp_cache_get('fv_new_photo_data', 'fv') ) {
        return $path_data;
    }

    //remove default subdir (year/month)
    $path_data['path'] = str_replace($path_data['subdir'], '', $path_data['path']);
    $path_data['url'] = str_replace($path_data['subdir'], '', $path_data['url']);

    $path_data['subdir'] = '/fv-contest';
    $path_data['path'] .= '/fv-contest';
    $path_data['url'] .= '/fv-contest';
    if ( isset($new_photo['contest_id']) ) {
        $contest_id = (int)$new_photo['contest_id'];
        $path = '/c' . $contest_id . '/' . strtolower($new_photo['meta']['camera-subject']);

        // /fv-contest/c4/dslr-wildlife/Gator_Flipping_3960_Bill_Smith_dslr-wildlife.jpg

        $path_data['subdir'] .= $path;
        $path_data['path'] .= $path;
        $path_data['url'] .= $path;
    }

    return $path_data;
}