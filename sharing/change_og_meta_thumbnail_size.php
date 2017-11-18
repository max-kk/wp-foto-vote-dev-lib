<?php

/*
    @since 2.2.707

    Before: https://monosnap.com/file/O02PwFAt9JfbzRzdcxdmTL1lZELKSM
    After: https://monosnap.com/file/gO7fFetemY6lH5iJZJga0PjrAWyFai
    
    $thumb_size = apply_filters('fv/single_item/og_meta_thumb_size', array(
        'width' => 850,
        'height' => 700,
        'crop' => false,
        'size_name' => 'fv-og-meta-thumb',
    ));
*/

add_filter('fv/single_item/og_meta_thumb_size', function($thumb_size) {
    $thumb_size['width'] = 450;
    $thumb_size['height'] = 350;
    $thumb_size['crop'] = array( 'center', 'top' );
    //$thumb_size['crop'] = false;

    return $thumb_size;
});