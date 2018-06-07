<?php

/**
 * How to filter Competitor List description
 * In this example we add extra text with current position in list
 * Note - this will work only if soring is set to Most Voted first, else this numbers will be not equal real Photo positions
*/
// wp-foto-vote\includes\abstracts\class-fv-competitor.php
// apply_filters('fv/public/competitor/get_tpl_desc', $DESC, $type, $this);

add_filter('fv/public/competitor/get_tpl_desc', function($DESC, $type, $competitor){
	if ( 'list' != $type ) {
	    return $DESC;
	}
    global $fv_counter;
    $fv_counter++;
    if ( $fv_counter < 10 ) {
        $DESC = '<span class="fv-list-counter">' . $fv_counter . ' place</span> <br/>' . $DESC;
    }
    return $DESC;
}, 10, 3);