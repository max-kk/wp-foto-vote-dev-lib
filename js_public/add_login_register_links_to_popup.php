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
        var login_url = "https://www.follol.com/wp-login.php?redirect_to=" + location.href;
        var register_url = "https://www.follol.com/wp-login.php?redirect_to=" + location.href;
        fv.lang.msg_not_authorized += ' Please <a href="' + login_url + '">login</a> or <a href="' + register_url + '">register</a>.';
    }</script>
    <?php
}
