//Pinterest skin - List
if ( ! jQuery("body").hasClass("logged-in") ) {
  jQuery(".clg-like-button").on("click", function(e) {
    e.preventDefault();
    window.location.href = "https://concours.textileaddict.me/connexion/";
  });
}

//Pinterest skin - single
if ( ! jQuery("body").hasClass("logged-in") ) {
  jQuery(".fv_vote").on("click", function(e) {
    e.preventDefault();
		setTimeout(ftunction() {
    		window.location.href = "https://concours.textileaddict.me/connexion/";
        }, 1000);
  });
}
