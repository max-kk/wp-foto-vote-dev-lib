<?php

/*
    [fv_user_photos user_id="current" not_logged_text="Please log in to see your photos!" per_page=9 upload_link="/" upload_text="Upload a new photo >>" contest_id="" enable_lightbox=1 lightbox_script=lightGallery_default]
    * @since 2.2.706
 */

add_action('fv_load_lightbox_lightGallery', function($skin = 'default'){
    
    $child_theme_url = get_stylesheet_directory_uri();
    
    wp_enqueue_script( 'fv-lightbox-lightGallery-js', $child_theme_url . '/YOUR_PATH', array('jquery'), 1, true );
    wp_enqueue_style( 'fv-lightbox-lightGallery-css', $child_theme_url . '/YOUR_PATH', array(), 1 );
    
}, 10, 1);
