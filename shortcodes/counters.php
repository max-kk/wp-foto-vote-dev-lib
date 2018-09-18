<?php
/**
 * Echo count of COntests, Competitors, Votes
 * [fv_counter type="contests"]
 * [fv_counter type="competitors"] 
 * [fv_counter type="votes"]
*/
add_shortcode("fv_counter", function($atts) {    
    if ( empty($atts['type']) ) {
        $atts['type'] = 'contests';
    }
    
    $count = 0;
    
    switch( $atts['type'] ) {
        case 'contests':
            $count = ModelContest::query()->total_count();
            break;
        case 'competitors':
            $count = ModelCompetitors::query()->where( "status", ST_PUBLISHED )->total_count();
            break;
        case 'votes':
            $count = ModelVotes::query()->total_count();
            break;
    }
    
    return $count;  
}