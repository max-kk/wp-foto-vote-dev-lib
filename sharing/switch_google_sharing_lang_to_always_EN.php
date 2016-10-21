<?php

/**
 * Change Google sharing Language from browser most used to English
 * https://yadi.sk/d/0suP-LZgxKewt
*/

add_filter('fv_show_contest_js_data', 'fv_show_contest_js_data_filter56468');

function fv_show_contest_js_data_filter56468 ($js_vars) {
    $js_vars['user_lang'] = 'en';
}