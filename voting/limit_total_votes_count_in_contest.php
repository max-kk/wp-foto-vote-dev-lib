<?php
// !!!! COPY AFTER THIS LINE !!!!

/**
 * version 1
 * Limit max total votes in contest
 * hook : apply_filters('fv/vote/get_resp_code', $RES, $contest, $check_ip, $exists_count, $exists_count_for_photo)
 * tested with WP Foto Vote 2.2.708
*/
add_filter('fv/vote/get_resp_code', function($RES, $contest, $check_ip, $exists_count, $exists_count_for_photo) {
    $max_votes_per_contest = 10;     // !! Change this number !!

    $total_count = ModelVotes::query()
        ->where( "contest_id", FV_Public_Vote::$contest_id )
        ->where("user_id", get_current_user_id())
        ->total_count( true );

    if ( $total_count > $max_votes_per_contest ) {
        FV_Public_Vote::echoVoteRes(2, 0,false, " next contest ", 0, $total_count);
        return;
    }
    return $RES;
}, 5);