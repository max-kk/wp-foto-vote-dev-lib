<?php

add_action('fv_after_contest_item', function($theme){
    $competitor_id = FV_Public_Single::get_requested_photo_id();
    if ( $competitor_id ) {
        $competitor = new FV_Competitor( $competitor_id );
        // Increase Views count
        $competitor->meta()->increaseOrInsert(
            1,
            ['meta_key'=>'views', 'custom'=>1, 'contestant_id'=>$competitor->id, 'contest_id'=>$competitor->contest_id]
        );
    }
}, 10, 1);