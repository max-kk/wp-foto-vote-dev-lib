<?php


add_shortcode( 'fv_can_upload', function($atts, $content) {

    $atts = wp_parse_args($atts, array(
        'contest_id'      => false,
        'need_login'      => 'Please login',
        'reached_limit'   => 'You can not upload more photos ({uploaded} uploaded)',
    ));

    if ( !get_current_user_id() ) {
        return $atts['need_login'];
    }

    $contest_id = (int)$atts['contest_id'];

    $contest = fv_get_contest( $contest_id );

    $count = ModelCompetitors::query()
        ->where_all(array('contest_id' => $contest_id, 'user_id' => get_current_user_id()))
        ->total_count();

    if ( $count >= $contest->max_uploads_per_user ) {
        return str_replace('{uploaded}' , $count, $atts['reached_limit']);
    }

    return $content;

} );