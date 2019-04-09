<?php

namespace InstaApiWeb {
    //require_once \InstaApiWeb\Responses;

    
    require_once config_item('thirdparty-cookies-resource');
    require_once config_item('thirdparty-insta_curl_mgr-resource');
    
    use InstaApiWeb\InstaCurlMgr;
    use InstaApiWeb\Cookies;
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
            $profile_data =  json_decode($output[0]);
            $profile = new InstaProfile();
            $profile->insta_name = $reference_user_name;
                        
            $profile->instaProfileData = new \stdClass();
            $user = $profile_data->graphql->user;
            $profile->insta_id = $user->id;
            if (isset($user->is_private)) {
                $profile->instaProfileData->is_private = $user->is_private;
            }
            if (isset($user->edge_owner_to_timeline_media->count)) {
                $profile->instaProfileData->posts_count = $user->edge_owner_to_timeline_media->count;
            }
            if (isset($user->edge_followed_by->count)) {
                $profile->follows = $user->edge_followed_by->count;
            }
            if (isset($user->edge_follow->count)) {
                $profile->following = $user->edge_follow->count;
            }
            return $profile;
        }

    }

}