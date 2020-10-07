<?php
/**
 * <img src="[fv_contest_most_voted_image_url contest_id=N]">
*/
add_shortcode("fv_contest_most_voted_image_url", function($atts) {
    if ( empty($atts['contest_id']) ) {
        return "Missing contest_id!";
    }

    $atts = wp_parse_args($atts, array(
        'contest_id' => '',
        'empty_image' => FV::$ASSETS_URL . "img/no-photo.png",
    ));

    $most_voted_one = ModelCompetitors::q()->where( 'contest_id', $atts['contest_id'] )
        ->limit( 1 )
        ->sort_by_votes()
        ->where('status', FV_Competitor::PUBLISHED)
        ->find(false, false, false, false, true);


    if ( $most_voted_one ) {
        return $most_voted_one[0]->getThumbUrl();
    }


    return $atts['empty_image'];
});
