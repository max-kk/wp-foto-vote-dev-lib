<?php
// COPY AFTER
/* 
 Only for version 2.3.19 + 
 https://snipboard.io/gkWCvK.jpg
 21 second = 0.05 * 360 seconds in the hour
*/

add_action('fv/admin/contest_settings/voting_frequency', function($contest) {
    echo '<option value="0.05h" ', selected('0.05h', $contest->voting_frequency) ,'>21 second</option>';
});
