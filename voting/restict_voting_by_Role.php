<?php
/*
    Restrict voting for user wihtout required Capabilities
*/

add_action('wp_ajax_vote', 'check_user_caps_before_vote__action', 9);
add_action('wp_ajax_nopriv_vote', 'check_user_caps_before_vote__action', 9);

function check_user_caps_before_vote__action($response_arr, $code) {
    // All CAPS
    // https://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table
    // edit_pages => Editor +
    if ( !current_user_can('edit_pages') && isset($_POST['vote_id']) && isset($_POST['contest_id']) ) {       
        FV_Public_Vote::$contestant_id = (int)$_POST['vote_id'];
        FV_Public_Vote::$contest_id = (int)$_POST['contest_id'];
        
        FV_Public_Vote::echoVoteRes(5, '', false);  // YOu can change Error text here - https://yadi.sk/i/8p2_8Jw93EAo5f
    }    
}