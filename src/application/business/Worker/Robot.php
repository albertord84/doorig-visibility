<?php

namespace business\worker {

    use business\Business;

require_once config_item('business-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Robot worker class.
     * 
     */
    class Robot extends Business {

        public function __construct() {
            $ci = &get_instance();

            $ci->load->model('db_model');
            //$ci->load->library("InstaApiWeb/InstaApi_lib", null, 'InstaApi_lib');


            /*  $config = parse_ini_file(dirname(__FILE__) . $conf_file, true);
              $this->IPS = $config["IPS"];
              $this->Day_client_work = new Day_client_work();
              $this->Ref_profile = new Reference_profile(); */
        }

        public function do_follow_work(DailyWork $work, \InstaClient_lib $instaclient) {
            $profile_list = array();
            $cookies = $work->Client->InstaCurlInfo->Cookies;
            $ci = &get_instance();

            $followers = $work->Ref_profile->get_followers($cookies, 5/* ,proxy */);
            if ($followers->Status == "ok") {
                foreach ($followers->FollowersCollection as $profile) {
                    //pedir datos del perfil y validar perfil
                    if ($this->validate_profile($profile)) {
                        $instaclient->follow($profile->insta_id);
                        if ($this->process_response($result)) {
                            array_push($profile_list, $profile);
                        } else {
                            break;
                        }
                    }
                }
            }
        }

        public function do_unfollow_work(DailyWork $work, \InstaClient_lib $instaclient) {
            $profile_list = array();
            foreach ($work->get_unfollow_list() as $profile) {
                $result = $instaclient->unfollow($profile->id);
                if ($this->process_response($result)) {
                    array_push($profile_list, $profile);
                } else {
                    break;
                }
            }
        }

        public function validate_profile($profile) {
            return TRUE;
        }

        public function process_response($response) {
            if ($response - status == 'ok') {
                return true;
            }
            return false;
        }

        public function process_get_insta_ref_prof_data_for_daily_report($content, \BusinessRefProfile $ref_prof) {
            
        }

        public function set_client_cookies_by_curl(int $client_id, string $curl, int $robot_id = NULL) {
            
        }

        public function temporal_log($data) {
            
        }

        public function process_get_followers_error(DailyWork $daily_work, \business\cls\Client $client, int $quantity, Proxy $proxy) {
            
        }

    }

}