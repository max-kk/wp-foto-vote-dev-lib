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