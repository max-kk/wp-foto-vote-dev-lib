<?php
/*
Change max votes count for user with some Capatibilities.

Required Version WP Foto Vote: 2.2.507
Required PHP Version: 5.3+

function code:
        $RES = TRUE;

        if ( $exists_count >= $contest->voting_max_count ) {
            $RES = 2; // user Used all votes
        }

        if ( $exists_count_for_photo ) {
            $RES = 3; // user was already voted for this photo
        }
    	
	return apply_filters('fv/vote/get_resp_code', $RES, $contest, $check_ip, $exists_count, $exists_count_for_photo);
*/

add_filter('fv/vote/get_resp_code', function($RES, $contest, $check_ip, $exists_count, $exists_count_for_photo){
	if ( $RES == true ) {
		return true;
	}
    // You can change USER Cap
    // https://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table
	if ( current_user_can("manage_options") ) {
		// FOr example 3+1 = 4
        if ( $exists_count >= $contest->voting_max_count+1 ) {
            $RES = 2; // user Used all votes
        }

        if ( $exists_count_for_photo ) {
            $RES = 3; // user was already voted for this photo
        }
    				
	}
	return $RES;
});