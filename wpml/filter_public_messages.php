<?php
/**
 * Filter Public messages based on WPML language
 * @var array   $messages
*/
function fv_wpml_get_translate_strings ($messages) {
	
    if ( !defined('ICL_LANGUAGE_CODE') ) {
        return $messages;
    }
    
    if ( ICL_LANGUAGE_CODE == 'en' ) { 
        $messages['toolbar_title_sorting'] = 'Sort by'; 
    } elseif ( ICL_LANGUAGE_CODE=='it' ) { 
        $messages['toolbar_title_sorting'] = 'Ordina per'; 
    }

	return $messages;
    
}

add_filter('fv/translation/get_public_messages', 'fv_wpml_get_translate_strings', 99); 