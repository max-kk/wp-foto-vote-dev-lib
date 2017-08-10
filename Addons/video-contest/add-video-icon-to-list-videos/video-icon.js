jQuery( document ).ready(function() {
    // VIDEO ICON
    function add_video_icon() {        
        jQuery(".fv_lightbox:not(.is-video)")
            .filter(
                function(){ 
                    return /youtube\.com|youtu\.be|vimeo\.com/.test(this.href); 
                }
            )
            .addClass("is-video");        
    }
    add_video_icon();

});