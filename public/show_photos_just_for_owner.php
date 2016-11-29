<?php
/*
    Hide from non admins all photos except their own.
    You can change "manage_options" to another capacity for allow more users (for example to judges) see all photos.
    https://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table

    Used filters: 
        public/class-fv-public.php line ~570
        apply_filters( 'fv/public/pre_get_comp_items_list/model', $photosModel, $konurs_enabled, $AJAX_ACTION, $contest_id );        

    Used filters: 
        public/class-fv-public-single.php line ~61
        apply_filters( 'fv_single_item_get_photo', ModelCompetitors::query()->findByPK(self::get_requested_photo_id(), true) );
*/

add_filter( 'fv/public/pre_get_comp_items_list/model', 'fv_public_pre_get_comp_items_list_filter', 10, 4 );        

function fv_public_pre_get_comp_items_list_filter($photosModel, $konurs_enabled, $AJAX_ACTION, $contest_id) {
    $user_id = get_current_user_id();
    if ( $user_id ) {
        // Select just this User photos
        if ( !current_user_can("manage_options") ) {
            $photosModel->where('user_id', $user_id);
        }
    }
    
    return $photosModel;
}

add_filter( 'fv_single_item_get_photo', 'fv_single_item_get_photo_filter', 10, 4 );        

function fv_single_item_get_photo_filter($photo) {
    $user_id = get_current_user_id();
    if ( $user_id && !current_user_can("manage_options") && $photo->user_id != $user_id ) {
        // Do not show photo at Single view page
        return false;
    }
    
    return $photo;
}
