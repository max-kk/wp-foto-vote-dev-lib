<?php
// COPY after

add_filter( 'fv/get_photo_full', function($url, $competitor){
          $thumb_size = array(
              'width'     => 1600,
              'height'    => 0,
              'crop'      => false,
              'size_name' => 'fv-large',
          );

          $image_full_resized = FvFunctions::getPhotoThumbnailArr($competitor, $thumb_size);

          if ( $image_full_resized ) {
              return $image_full_resized[0];
          }

    return $url;
  }, 10, 2);	
}
