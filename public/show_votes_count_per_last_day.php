<?php
/*
    * Show votes count as "5 (+2)" where +2 is a count votes for last 24 hours
*/
function filter_fv_single_photo_vars($variables, $type, $template_path) {
    if ( 'theme' != $type ) {
        return $variables;
    }
    //$variables["contest_link"] = 'SOME_URL';
    // $variables["votes"]
    //fv_dump($variables);

    $votes_per_last_day = ModelVotes::query()
        ->where_later( "changed", current_time('timestamp', 0) - 86400 )
        ->where( "vote_id", $variables['photo']->id )
        ->find(true);

    $variables["votes"] .= ' (+' . $votes_per_last_day . ')';
    //    $variables["votes"] .= '<span title="votes for last 24 hours">(+' . $votes_per_last_day . ')</span>';

    return $variables;
}

add_filter('fv_template_variables', 'filter_fv_single_photo_vars', 10, 3);