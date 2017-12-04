<?php
/*
    use:
    $photosModel = apply_filters( 'fv/public/pre_get_comp_items_list/after_count/model', $photosModel, $AJAX_ACTION, $contest_id );

    and this:
    https://github.com/max-kk/wp-foto-vote-dev-lib/wiki/Database---ORM#where_later
*/


add_filter ('fv/public/pre_get_comp_items_list/after_count/model', function($photosModel, $AJAX_ACTION, $contest_id){

    if ( !isset($_GET['fv-timeframe']) ) {
        return $photosModel;
    }

    if ( $_GET['fv-timeframe'] == 'week' ) {
        $photosModel->where_later( "added_date", current_time('timestamp', 0) - WEEK_IN_SECONDS );    
    }    
    
    if ( $_GET['fv-timeframe'] == 'month' ) {
        $photosModel->where_later( "added_date", current_time('timestamp', 0) - MONTH_IN_SECONDS );    
    }
        
    return $photosModel;

}, 10, 3);