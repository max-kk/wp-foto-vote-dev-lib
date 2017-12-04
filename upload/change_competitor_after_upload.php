<?php
/**
 * version 1
 * Let's add some user details to "full_description"
 *
 * do_action('fv/public/upload_after_insert', $insert_res, $INPUT_NAME);
 * Available params: https://github.com/max-kk/wp-foto-vote-dev-lib/wiki/Objects-fields
 *
 * integer|WP_Error $competitor_ID
*/
add_action('fv/public/upload_after_insert', function($competitor_ID) {    
    $competitor = new FV_Competitor( $competitor_ID, false ); 
    
    $full_description = '';
    
    $user_info = get_userdata( $competitor->user_id );
    $full_description .= 'First name: ' . $user_info->first_name . "\n";
    $full_description .= 'Last name: ' . $user_info->last_name . "\n";
    $full_description .= 'Last name: ' . $user_info->last_name . "\n";
            
    $competitor->full_description .= $full_description;
    
    $competitor->save();
});