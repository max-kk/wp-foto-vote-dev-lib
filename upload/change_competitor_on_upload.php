<?php

// $photo_data_array = apply_filters('fv/public/upload_before_save', $photo_data_array, $INPUT_NAME);
/**
 * Available params: https://github.com/max-kk/wp-foto-vote-dev-lib/wiki/Objects-fields
 *
 * array $photo_data_array
 * string $INPUT_NAME
*/
add_filter('fv/public/upload_before_save', function($photo_data_array, $INPUT_NAME){
    $photo_data_array['votes_average'] = 5;
    return $photo_data_array;
}, 10, 2);