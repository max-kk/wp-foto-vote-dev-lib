<?php
/*

* Since WP Foto Vote 2.2.712

$thumb_size = array(
    'width'     => get_option('fotov-image-width', 220),
    'height'    => get_option('fotov-image-height', 220),
    'crop'      => get_option('fotov-image-hardcrop', false) == '' ? false : true,
    'size_name' => 'fv-thumb',
);            
*/

// wp-foto-vote\includes\abstracts\class-fv-competitor.php

// $thumb_size = apply_filters('fv/get_photo_thumbnail/thumb_size', $thumb_size, $this);

add_filter('fv/get_photo_thumbnail/thumb_size', function($thumb_size, $competitor){
    if ($competitor->contest_id == 2) {
        $thumb_size['width'] = 330;
        $thumb_size['height'] = 200;
        $thumb_size['crop'] = 1;
    }
    return $thumb_size;
}, 10, 2);