// ========= Hook 'fv/upload_before_start' =========
// Param: form (DOM element with form)
// If return False, than upload not start
/*
//** Hook code
// action before uploading
if ( !FvLib.callHook('fv/upload_before_start', form) ) {
  return false;
}
*/
// How to add own action
FvLib.addHook('fv/upload_before_start', function(data){
  // some actions  
  return true;
}, 10, 1);

// ========= Filter (must return passed data) 'fv/upload/FormData' =========
// Params: 
// * fd (FormData object) - you can add your own data via [fd.append("key", "value");]
// * form (DOM element with form)
// How to add own action

FvLib.addFilter('fv/upload/FormData', function(FormDataToSend, form){
  // some actions  
  return FormDataToSend;
}, 10, 2);

// ========= Filter (filters for retrieved data) 'fv/upload/get_data' =========
// Params: 
// * data - object from JSON

FvLib.addFilter('fv/upload/get_data', function(data){
  // some actions  
  return data;
}, 10, 1);

// ========= Hook (upload Successfull) 'fv/upload/ready' =========
// Params: 
// * data - object from JSON

FvLib.addHook('fv/upload/ready', function(data){
  // some actions when Uploaded
}, 10, 1);

// ** Example: redirect to Photo page after Upload (need enable Moderation type - "After moderation")
// ** Note, this code will works just in future versions (> 2.2.120), in currect not returns "inserted_photo_id"
FvLib.addHook('fv/upload/ready', function(data){
  // some actions when Uploaded
	if (data.inserted_photo_id > 0) {
		var curr_site_url = fv_upload.ajax_url.replace("wp-admin/admin-ajax.php", '');
		var curr_contest_ID = jQuery('.fv_upload_form #contest_id').val();;
		window.location = curr_site_url + 'tattoo-vote/?contest_id=' + curr_contest_ID + '&photo=' + data.inserted_photo_id;
		// !!!!! "tattoo-vote" - REPLACE to your page url
	}  
}, 10, 1);