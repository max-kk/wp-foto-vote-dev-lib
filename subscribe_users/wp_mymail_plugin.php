<?php
/**
 * Added 31/01/2017
 * Add user details on upload to https://mymail.newsletter-plugin.com/ plugin
*/

class FvSubscribeToMyMail {
    function __construct() {
        // Inport on Upload
        add_action('fv/public/upload/ready', array($this, 'subscribe_on_upload'), 9, 3);
        
        // May be add later
        // Import on Subscribe (Voting: Email Subscribe)
        //add_action('fv/subscribers-model/add', array($this, 'import_subscriber'), 10, 2);        
    }
    
    public function subscribe_on_upload ($status, $inserted_photo_ids, $contest) {
        if ( "success" != $status ) {
            return false;
        }
        //check if MyMail 2 exits
        if(function_exists('mymail'){
            $competitor = ModelCompetitors::query()->findByPK( $inserted_photo_ids[0], true );
            if ( empty($competitor) ) {
                fv_log("FvSubscribeToMyMail::subscribe_on_upload - Competitor is empty", $competitor);
                return false;                
            }
            /*
            $competitor->id         
            $competitor->name
            $competitor->description
            $competitor->user_email
            $competitor->user_id          
            */
            
            if ( empty($competitor->user_email) || !is_email($competitor->user_email) ) {
                fv_log("FvSubscribeToMyMail::subscribe_on_upload - wrong or empty email", $competitor);
                return false;
            }
            // Note: if uploaded logged in user $competitor->user_id if not empty
            
            //prepare the userdata from a $_POST request. only the email is required
            $userdata = array(
                    'email' => $competitor->user_email,
                    'firstname' => $competitor->name,
                    //'lastname' => $_POST['lastname'],
                    'custom-field' => $competitor->user_id,
                    'referer' => 'WP Foto Vote',
                    'status' => 0, //0 forces a confirmation message
            );
      
            $overwrite = true;
             
            //add a new subscriber and $overwrite it if exists
            $subscriber_id = mymail('subscribers')->add($userdata, $overwrite);
      
            //if result isn't a WP_error assign the lists
            if(!is_wp_error($subscriber_id)){
      
                //your list ids
                $list_ids = array(123, 456);        // SET YOUR ID'S
                mymail('subscribers')->assign_lists($subscriber_id, $list_ids);
      
            }else{
                fv_log("FvSubscribeToMyMail::subscribe_on_upload - mymail('subscribers')->add return WP_Error", $subscriber_id);
               //actions if adding fails. $subscriber_id is a WP_Error object
            }  
        }        
    }
}

new FvSubscribeToMyMail();


