<?php
// COPY AFTER
add_action( 'fv/vote/before_save', function($ip_data, $competitor, $contest) {
    // Do something  
    $user_info = get_userdata( $competitor->user_id );
    $competitor_fist_name .= 'First name: ' . $user_info->first_name . "\n";    
});
