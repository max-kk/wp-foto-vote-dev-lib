<?php

//$err = apply_filters('fv/public/pre_upload', $err, $contest, $form_ID);

// COPY AFTER

add_filter('fv/public/pre_upload', function($err, $contest, $form_ID) {

 $total_count = ModelCompetitors::query()
        ->where_later( "added_date", current_time('timestamp', 0) - 86400 ) // - 1 day
        ->where("user_id", get_current_user_id())
        ->total_count( true );
        
    if ( $total_count > 0 ) {
        $err['custom_upload_error'] = "You have reached daily limit";
    }
    
    return $err;

  
}, 10, 3);
