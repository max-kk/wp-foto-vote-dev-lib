<?php

add_shortcode("fv_pfa_sum_reached", function ($atts) {
  $atts = wp_parse_args($atts, array(
        'contest_id'      => false,
    ));
    
    if ( !$atts['contest_id'] ) {
      return "No contest_id!";
    }
        
    $payments_all = ModelFvPayments::query()
        ->where('payment_status', 'Completed')
        ->find();
        
    $all_SUM = 0;
    foreach ($payments_all as $key => $P) {
            $all_SUM += (float) $P->mc_gross;    
    }
        
    return $all_SUM;
});
