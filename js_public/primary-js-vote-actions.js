// ## Change Popup messsage when user must be registered for vote ##

//msg = FvLib.applyFilters('fv/vote/modal_msg', msg, data);
// IF data.res == 5 => not authorized;
FvLib.addFilter('fv/vote/modal_msg', function(msg, data){
  if (data.res == 5  ) {
    msg += "SOME HTML <a href='#fb_login_link'>Login via FB</a>";
  }
  return msg;
}, 10, 2);


// ## Add custom params to sended data or Modify exists ##
FvLib.addFilter('fv/vote/send_data', function(send_data){
  // modify send_data
  return send_data;
}, 10, 1);

// ## Fire some actions when wote is completed
FvLib.addFilter('fv/vote/get_data', function(data){ 
    /**
        "data.res" can pass : [
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

    if ( data.res == 2 || data.res == 3 ) {
        // DO REDIRECT FOR EXAMPLE
    }
    
    /// !! REQUIRED !!
    return data; 
}, 10, 1);

/*
    // action before voting
    if (!FvLib.callHook('fv/start_voting', security_type, fv_subscribed, action, window.fv_current_id)) {
        return false;
    }
*/

// ## Deny vote from some browser
FvLib.addFilter('fv/start_voting', function(security_type, fv_subscribed, action, fv_current_id){ 
    if ( navigator.userAgent.indexOf("Mozilla/5.0 (Windows NT 6.1; rv52.0) Gecko/20100101 Firefox/52.0") != -1 ) {
        alert("Not allowed vote from this browser!");
        return false;
    }
});


// Hide modal in 1 second after successful Vote
// Video example: https://www.dropbox.com/s/ai85ean1iceb6p0/fv%20-%20Hide%20modal%20after%20success%20vote%20-%20Screencast%202018-04-12.mp4?dl=0

jQuery( document ).ready(function() {
    if (FvLib == undefined) {
        return;
    }

    // ## Fire some actions when wote is completed
    FvLib.addFilter('fv/vote/get_data', function(data){
        /**
         "data.res" can pass : [
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
            setTimeout(function(){
                FvModal.close();
            }, 1000); // 1000 miliseconds = 1 second
        }


        /// !! REQUIRED !!
        return data;
    }, 10, 1);

});

// Diff text for Diff cases

jQuery( document ).ready(function() {
    if (FvLib == undefined) {
        return;
    }

    // ## Fire some actions when wote is completed
    FvLib.addFilter('fv/vote/get_data', function(data){
        /**
         "data.res" can pass : [
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

if ( data.res == 1 && fv.user_id === fv.data[data.ct_id].user_id ){
  fv.lang.invite_friend = "Incite friends";
} elseif (data.res == 4 ) {
  fv.lang.invite_friend = "Contest ended - share to your friend";
} else {
  fv.lang.invite_friend = "Default text";
}


        /// !! REQUIRED !!
        return data;
    }, 10, 1);

});
