<?php

//COPY AFTER

// Сan be used for display mini-gallery in a home/etc

add_filter( 'fv/public/pre_get_comp_items_list/after_count/model', function($photosModel, $AJAX_ACTION, $contest_id) {
    /** @var ModelCompetitors $photosModel */
    $photosModel->limit(6);
    $photosModel->set_sort_by_type( 'random' );
    return $photosModel;
}, 10, 3 );
