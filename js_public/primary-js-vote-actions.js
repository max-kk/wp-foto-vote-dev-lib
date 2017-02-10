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