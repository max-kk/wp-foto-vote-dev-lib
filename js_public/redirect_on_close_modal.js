// On Close voting modal (after voting, sharing, etc) user will be redirected to another page
// Also can be used codition for "screen" param:
// "screen": 'share' (& vote), 'subscribe', 'social-authorization', 'rating', etc
// Add this code to footer

if ( typeof(FvLib) != "undefined" ) {
    // Add hook
    FvLib.addHook('fv/modal/close', function(screen) {
        // Change page URL
        window.location.href = "http://URL.com/blog/";
    }, 10, 1); 
}

// Or Redirect after successful Vote

jQuery( document ).ready(function() {
    if (FvLib == undefined) {
        return;
    }

    // ## Fire some actions when wote is completed
    FvLib.addFilter('fv/vote/get_data', function(data){
        /**
         "data.res" can pass : [
         1 => 'Ok',
         2 => 'Already voted',
         3 => '24 hours not passed',
         4 => 'date end',
         5 => 'not authorized',
         6 => 'wrong reCAPTCHA',
         66 => 'need reCAPTCHA',
         98 => 'invalid security token',
         99 => 'error',
         101 => 'need payment',
         ]
         */

        if ( data.res == 1 ) {
            // Add hook
            FvLib.addHook('fv/modal/close', function(screen) {
                // Change page URL
                window.location.href = "http://URL.com/blog/";
            }, 10, 1); 
        }

        /// !! REQUIRED !!
        return data;
    }, 10, 1);

});

