To add some Inline JS on contest pages (List& Single) use following php code:


In case creating new mini plugin

```

<?php
/*
Plugin Name: WP Foto Vote - on close Share/Vote modal redirect
Plugin URI: #
Description: redirect to another page after close Share / Vote modal
Version: 0.1
Author: Maxim Kaminsky
Author URI: http://maxim-kaminsky.com/
*/


```

Main PHP code

```

add_action( 'fv_after_contest_list', 'enquene_load_fv_js_05461' );
add_action( 'fv_after_contest_item', 'enquene_load_fv_js_05461' );

function enquene_load_fv_js_05461() {
    add_action( 'wp_footer', 'load_fv_js_ss436546', 99 );
}

function load_fv_js_ss436546() {
    ?>
    <script>
    ****CODE****
    </script>
    <?
}

```

