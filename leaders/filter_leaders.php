<?php
/**
 * Filter Leaders Photos
*/

add_filter( 'fv/public/leaders/query', 'fv_public_leaders_query__filter46', 10, 3 );
/**
 * Show in leaders last uploaded photos
 * @param $leaders_query    object
 * @param $type             string
 * @param $shortcode_args   array
*/
function fv_public_leaders_query__filter46( $leaders_query, $type, $shortcode_args ) {
    return $leaders_query->sort_by('added_date', 'DESC');        
}


add_filter( 'fv/public/leaders/query', 'fv_public_leaders_query_for_block__filter46', 10, 3 );
/**
 * Show in leaders last uploaded photos
 * @param $leaders_query    object
 * @param $type             string
 * @param $shortcode_args   array 
*/
function fv_public_leaders_query_for_block__filter46( $leaders_query, $type, $shortcode_args ) {
    if ( $type == "block2" ) {
        return $leaders_query->sort_by('added_date', 'DESC');
    }
    return $leaders_query;        
}