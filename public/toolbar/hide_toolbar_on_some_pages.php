<?php
/**
 * Example how to hide toolbar On Front Page
 * php 5.3+ REQUIRED
*/
add_action("init", function() {

    IF ( is_front_page() ) {
        // HIDE TOOLBAR
        FvFunctions::set_setting('show-toolbar', false);
    }

});