<?php
// COPY AFTER


add_filter('fv/vote/get_resp_code', function($RES, $contest, $check_ip, $exists_count, $exists_count_for_photo){
	if ( $RES === true ) {
		return true;
	}

  if ( $exists_count_for_photo <= 2 ) {
      return true;
  }
    				
	return $RES;
});
