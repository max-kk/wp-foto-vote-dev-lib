<?php
/*
    This example shows how to replace on the fly Photo link to another
    Note: you need disabled lightbox in WP Foto Vote settings to avoing open this link in lightbox
    version: 1
    required php version: > 5.3
*/

add_filter( 'fv_template_variables', function($variables, $type, $template_path) {    
    // IF not LISt - return
    if ( $type != "theme" ) {
        return $variables;  
    }   
    // Change $variables['image_full'] to required URL
    // $variables['photo'] is a competitor Object
    
    // Example - let's replace image url with Meta field
    if ( isset($variables['image_full']) && $variables['image_full'] ) {              
        $variables['image_full'] = $variables['photo']->meta()->get_row('site_url');
    }
    // Example :: END
    return $variables;    
}, 10, 3 );