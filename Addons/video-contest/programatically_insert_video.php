<?php

// 20.11.2017
// version 1.1
// *need test

$video_url = 'https://vimeo.com/242977011';

$video_arr = FvAddon_Video()::get_instance()->_Fix_url_and_get_Video_thumb_url( $video_url );

if ( empty($video_arr['videoThumb']) ) {
    return new WP_Error( 'wrong_videoThumb', __( "Can`t parse video thumbnail! Something incorrect!", "fv" ) );    
}

if ( empty($video_arr['videoId']) ) {
    return new WP_Error( 'wrong_videoId', __( "Can`t parse video details! Seems url is incorrect!", "fv" ) );        
}

$contestID_with_video = 1; // !!!!!

$video_thumbnail_wp_ID = Fv_Video_Thumbnails::save_to_media_library($video_arr, $contestID_with_video);

if ( $video_thumbnail_wp_ID > 0 ) {
    
    $competitor = new FV_Competitor();
    $competitor->name = "?????";
    $competitor->contest_id = $contestID_with_video; // !!!!!
    
    $competitor->url =$video_arr['videoUrl'];
    $competitor->image_id = $video_thumbnail_wp_ID;
    $competitor->options = array('provider' = $video_arr['videoProvider']);
    
    //** Save photo data
    $competitor->save();        
} else {
    fv_log( 'VideoContest upload error : can\'t find thumbnail!', $video_url );    
    return new WP_Error( 'wrong_videoId', __( "VideoContest upload error : can\'t find thumbnail!", "fv" ) );        
}
