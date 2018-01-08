<?php

// [fv id=00 use_new_page=1]
add_filter('fv/public/gallery/shortcode_args', function($args, $contest) {
    if ( !isset($args['use_new_page']) ) {
        return;
    }
    add_filter('fv/single_link_mode/is_direct', function ($value, $contest = false) {
        return true;
    }, 10, 2);
});