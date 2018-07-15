<?php

/**
 Example how to make Unique link SIngle View in each contest
 Avialable since 2.3.00
*/
add_filter("fv/competitor/get_single_view_link", function($url, $photo_id, $link_template, $contest_ID) {
    if ( 1 === $contest_ID ) {
        return "/blue-carbon-summit/competiton/{$photo_id}";
    }
    if ( 2 === $contest_ID ) {
        return "/nairobi-2018/competition/{$photo_id}";
    }
    return $url;
}, 11, 4);

add_action("init", function() {
    // WHERE YOUR_PAGE_ID is the page IDs nairobi-2018 and blue-carbon-summit
    add_rewrite_rule('^/blue-carbon-summit/competiton/([0-9]+)/?','index.php?page_id=YOUR_PAGE_ID&photo_id=$matches[1]','top');
    
    add_rewrite_rule('^/nairobi-2018/competiton/([0-9]+)/?','index.php?page_id=YOUR_PAGE_ID&photo_id=$matches[1]','top');    
});
