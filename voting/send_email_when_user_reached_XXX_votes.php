<?php
/*
    Send email to user when he reached 200 votes (for example)
*/

// public/class-fv-public-vote.php:874
// $response_arr = apply_filters('fv/vote/echo_res', $response_arr, $code);
add_filter('fv/vote/echo_res', 'fv_filter__vote_echo_res', 10, 2);

function fv_filter__vote_echo_res($response_arr, $code) {
    $reach_count_to_notify = 200;
    
    // if susccess Voted
    if ( 1 == $code && isset($response_arr['new_votes']) && $reach_count_to_notify == $response_arr['new_votes'] ) {
        // Send a mail
        
        $competitor = ModelCompetitors::query()->findByPK( $response_arr['contestant_id'] );
        $contest = ModelContest::query()->findByPK( $response_arr['ct_id'], true );
        // Something going wrong
        if ( !$competitor || !$contest ) {
            return $response_arr;
        }
        
        /* Fields:
            'id' => '%d',
            'name' => '%s',
            'description' => '%s',
            'full_description' => '%s',
            'social_description' => '%s',
            'additional' => '%s',
            'url' => '%s',
            'url_min' => '%s',
            'storage' => '%s',
            'options' => '%s',
            'image_id' => '%d',
            'contest_id' => '%d',
            'votes_count' => '%d',
            'votes_average' => '%f',
            'status' => '%d',
            'added_date' => '%s',
            'upload_info' => '%s',
            'user_email' => '%s',
            'user_id' => '%d',
            'user_ip' => '%s',        
        */
        // Set 
        $mail_subject = "Congratulations, you are reached {$reach_count_to_notify} votes!";
        
        // '{contest_name}', '{contest_date_start}', '{contest_date_finish}'
        // '{contestant_name}', '{contestant_user_email}', '{contestant_description}', '{contestant_link}'
        // '{contestant_meta_MetaKey}'
        $mail_body_pre = "Hi {contestant_name},
            You just reached {$reach_count_to_notify} votes and became as a finalist in contest {contest_name}!";
            
        $mail_body = fv_replace_mail_tags_to_data($mail_body_pre, $contest, $competitor);
        
        FvFunctions::notifyMailToUser($competitor->user_email, $mail_subject, $mail_body);        
    }
    
    // !! REQUIRED !!
    return $response_arr;
}