<?php
// Add Login & Registration links, for "IP+cookies+evercookie+Social authorization" security type messages
// https://yadi.sk/i/g5-QvBYvxDbzg will be affected

add_action( 'fv_after_contest_list', 'enquene_load_fv_js_0546' );
add_action( 'fv_after_contest_item', 'enquene_load_fv_js_0546' );

function enquene_load_fv_js_0546() {
    // In case of user not logged in
    if ( !is_user_logged_in() ) {
        add_action( 'wp_footer', 'load_fv_js_ss054654', 99 );
    }
}

function load_fv_js_ss054654() {
    ?>
    <script>if (fv ) {
        fv.lang.msg_not_authorized += ' Please <a href="http://site.com/login">login</a> or <a href="http://site.com/register">register</a>.';
    }</script>
    <?php
}