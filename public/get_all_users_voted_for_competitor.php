<?php
/*
 * Get list of logged in users, that voted for Comeptitor
*/
$voters_query = ModelVotes::query()
    ->where_all( array('contest_id'=> $competitor->contest_id, 'vote_id'=> $competitor->id) )
    ->what_fields( array('user_id') )
    ->find();

$user_data = null;
    
foreach($voters_query as $voter_ID) {

    $user_data = get_userdata( $voter_ID );
    echo $user_data->first_name;

}