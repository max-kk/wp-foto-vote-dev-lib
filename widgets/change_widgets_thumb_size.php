<?php
/**
    20.02.2017
    With this code you can change THUMBS size/cropping params in Contest widget's
*/

## FOR LIST WIDGET ## 
## wp-foto-vote\includes\widget-gallery\views\widget.php
add_filter('fv/public/widget-list/thumb_size', 'fv_widget_list_thumb_size__filter', 10, 3)

function fv_widget_list_thumb_size__filter($thumb_size, $show_photo_size, $contest_id) {
    // Disalbe Cropping
    $thumb_size['crop'] = false;
    // Disable width limit
    $thumb_size['width'] = 0;
    // !! Requied !!
    return $thumb_size;
}

## FOR GALERRY WIDGET ##
## wp-foto-vote\includes\widget-list\views\widget.php
add_filter('fv/public/widget-gallery/thumb_size', 'fv_widget_gallery_thumb_size__filter', 10, 3)

function fv_widget_gallery_thumb_size__filter($thumb_size, $show_photo_size, $contest_id) {
    // Disalbe Cropping
    $thumb_size['crop'] = false;
    // Disable width limit
    $thumb_size['width'] = 0;
    // !! Requied !!
    return $thumb_size;
}