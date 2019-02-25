<?php

namespace InstaApiWeb {
    //require_once \InstaApiWeb\Responses;

    /**
     * Description of InstaProfile
     *
     * @author dumbu
     */
    class InstaProfile {

        //put your code here
        public $insta_id;
        public $insta_name;
        public $follows;
        public $following;
        public $image_url;
        public $instaProfileData;

        public function __construct() {
            require_once config_item('thirdparty-insta_curl_mgr-resource');
        }        
       
        public static  function get_user_data(string $reference_user_name, Cookies $Cookies = NULL, Proxy $Proxy = NULL) {
            $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::PERSON), new EnumAction(EnumAction::GET_PROFILE_INFO));
            $obj->setReferenceUser($reference_user_name);
            $curl_str = $obj->make_curl_str($Proxy, $Cookies);
            
            $result = exec($curl_str, $output, $status);
            return json_decode($output[0]);
        }

    }

}