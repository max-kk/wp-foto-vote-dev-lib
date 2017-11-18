<?php

/*
    [fv_user_photos user_id="current" not_logged_text="Please log in to see your photos!" per_page=9 upload_link="/" upload_text="Upload a new photo >>" contest_id="" enable_lightbox=1 lightbox_script=lightGallery_default]
    * @since 2.2.706
 */

add_action('fv_load_lightbox_lightGallery', function($skin = 'default'){

    //$child_theme_url = get_stylesheet_directory_uri();

    wp_enqueue_script( 'fv-lightbox-lightGallery-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.5/js/lightgallery-all.min.js', array('jquery'), '1.6.5', true );

    wp_enqueue_style( 'fv-lightbox-lightGallery-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.5/css/lightgallery.min.css', array(), '1.6.5' );

    add_action('wp_footer', 'wp_footer_init_lightGallery', 99);

}, 10, 1);

function wp_footer_init_lightGallery(){
    // http://sachinchoolur.github.io/lightGallery/docs/api.html#passing-options
    ?>
    <script>
        jQuery('.fv_lightbox').off();

        jQuery('.fv-wall').lightGallery({
            selector: '.fv_lightbox',
            thumbnail:true,
            download: false
        });
    </script>
    <?php
}