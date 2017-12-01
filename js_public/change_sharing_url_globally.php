<?php // !!!! DO NOT COPY THIS LINE !!!!

add_action( 'fv_after_contest_list', function() {
?><script>
    jQuery( document ).ready(function() {
        
        if (typeof FvLib == "undefined") {
            return;
        }
        
        // ****CODE****
        // FvLib.applyFilters("fv/public/single_photo/link", fv.ct[ fv.data[photo_id].ct_id ].single_link_template.replace("%photo_id%", photo_id), photo_id);

        FvLib.addFilter("fv/public/single_photo/link", function(link) {
            return 'http://generatialuijohn.ro/testtop/';
        }, 10, 1);
        
    });
</script><?php
} );