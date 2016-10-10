<?php

// Lets clean WP Super Cache cache for specified post/pafe, when new photo is submitted
// Note - if Moderation enabled - this will not work, and you need clear cache manual

// Later can be used hook 'fv/public/upload/ready'
/*
 * Allow add hook to upload finish action
 * @since 2.2.363
 * $status can be => "error" / "success" / "info"
 */
//do_action('fv/public/upload/ready', $status, $inserted_photo_ids, $contest);

add_filter('fv/public/upload_after_save', 'fv0521_filter_clear_wp_super_cache_after_upload', 10, 1);
//apply_filters('fv/public/upload_after_save', $public_translated_messages, $new_photo, $inserted_photo_id, $inserted_photo_ids);


function fv0521_filter_clear_wp_super_cache_after_upload($public_translated_messages) {
    $post_id = (int)$_REQUEST['post_id'];   // Page, where submit Form is placed
    
    /** Note - if form placed at separate page than contest photos - need use following code
    
    $contest_id = (int)$_REQUEST['contest_id'];
    $contest = ModelContest::query()->findByPK($contest_id, true);
    $post_id = $contest->page_id;   // Page, where contest placed (can be empty, if not selected in admin)
    
    */
    
    if ( $post_id && function_exists("wp_cache_post_change") ) 
        wp_cache_post_change( $post_id );
    }
    
    // Required
    return $public_translated_messages;
}

