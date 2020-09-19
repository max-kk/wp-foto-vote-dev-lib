<?php
/**
 * Echo count of Competitor Votes
 * [fv_competitor_votes id="**ID**"]
*/
add_shortcode("fv_competitor_votes", function($atts) {    
    if ( empty($atts['id']) ) {
        return 'NO ID!';
    }
    

    $c = fv_get_competitor($atts['id']);
    
    if ( $c ) {
      $c->get_votes();
    }
       
    return 'No Competitor!';  
}
