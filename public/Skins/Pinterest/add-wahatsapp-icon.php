<?php

// Example: https://monosnap.com/file/NLaIyLLmKy01xXdF5zTSBoTyAnYJCe

add_action('fv/contest_list_item/actions_hook', function($photo, $konurs_enabled, $theme){
    printf( '<a href="whatsapp://send?text={text}" data-href="whatsapp://send?text={text}" onclick="return sv_vote_send(\'whatsapp\', this);"><span class="clg-like-button fvicon-whatsapp"></span></a>', esc_url($buy_link) );
}, 10, 3);

add_action('fv/contest_single_item/actions_hook', function($photo, $contest, $theme){
    printf(
       '<a class="photo-single-item--action photo-single-item--m-half-width" href="whatsapp://send?text={text}" data-href="whatsapp://send?text={text}" onclick="return sv_vote_send(\'whatsapp\', this);"><i class="fvicon-whatsapp photo-single-item--action-icon"></i></a>',
            esc_url($buy_link)
     );

}, 10, 3);