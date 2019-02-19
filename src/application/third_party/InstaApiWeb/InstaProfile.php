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

        static function build_insta_profile($response, Cookies $Cookies = NULL, Proxy $Proxy = NULL) {
            $InstaProfile = new InstaProfile();
            $$InstaProfile->insta_id = $response->id;
            $$InstaProfile->insta_name = $response->username;
            $$InstaProfile->image_url = $response->profile_pic_url;
            $profile_data = $$InstaProfile->get_user_data($Profile->username, $Cookies, $Proxy);
            $$InstaProfile->instaProfileData = new \stdClass();
            if (isset($profile_data->uset->is_private)) {
                $$InstaProfile->instaProfileData->is_private = $profile_data->user->is_private;
            }
            if (isset($profile_data->user->media->count)) {
                $$InstaProfile->instaProfileData->posts_count = $profile_data->user->media->count;
            }
            if (isset($profile_data->user->follows_viewer)) {
                $$InstaProfile->instaProfileData->follows_viewer = $profile_data->user->follows_viewer;
            }
        }

        public function get_user_data(string $reference_user_name, Cookies $Cookies = NULL, Proxy $Proxy = NULL) {
            $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::PERSON), new EnumAction(EnumAction::GET_PROFILE_INFO));
            $obj->setReferenceUser($reference_user_name);
            $curl_str = $obj->make_curl_str($Proxy, $Cookies);
            
            $result = exec($curl_str, $output, $status);
            return json_decode($output[0]);
        }

    }

}