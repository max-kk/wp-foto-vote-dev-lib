<?php

/**
 All fields in version 2.2.506 (%d - number, %s - string):
    array(
        'id'            => '%d',
        'name'          => '%s',
        'description'   => '%s',
        'full_description' => '%s',
        'social_description' => '%s',
        'additional'    => '%s',
        'url'           => '%s',
        'url_min'       => '%s',
        'storage'       => '%s',
        'options'       => '%s',
        'image_id'      => '%d',
        'contest_id'    => '%d',
        'votes_count'   => '%d',
        'votes_count_fail' => '%d',
        'votes_average' => '%f',
        'status'        => '%d',
        'added_date'    => '%s',
        'upload_info'   => '%s',
        'user_email'    => '%s',
        'user_id'       => '%d',
        'user_ip'       => '%s',
        'place'         => '%d',
        'place_caption' => '%s',
    );
*/
 
$photo_data_array = array(
        'name' => '',               // MAY BE SET YOURS        
        'description' => '',        // MAY BE SET YOURS        
        'contest_id' => 1,          // !! SET YOURS        
        'url' => '',                // !! FULL URL TO IMAGE
        'image_id' => 111,          // !! ATTACHMENT ID FROM WP_POSTS table
        'user_id' => get_current_user_id(),
        'user_ip' => fv_get_user_ip(),
        'added_date' => current_time('timestamp', 0),
);
 
ModelCompetitors::query()->insert($photo_data_array);