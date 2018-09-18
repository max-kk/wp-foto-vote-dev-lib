<?php
/**
 * Show all active (voting) contests at one page
*/
add_shortcode("fv_all_active_contests", "fv_all_active_contests__shortcode");

function fv_all_active_contests__shortcode($atts) {
    $query = ModelContest::query()
            ->where_early( 'date_start', current_time('timestamp', 0) )
            ->where_later( 'date_finish', current_time('timestamp', 0) );

    $contests = $query->find();
    
    foreach($contests as $contest) {
        echo do_shortcode("[fv id={$contest->id}]");
    }
}