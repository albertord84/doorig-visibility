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

        public function do_follow_work(\InstaReferenceProfile_lib $profile) {
            echo "[exec] get_insta_followers() ==> ";
            $cookies = json_decode('{"json_response":{"authenticated":true,"user":true,"status":"ok"},"csrftoken":"kToHKxaPB4iPuVY7t2XzQdi3GeyxrI7D","sessionid":"5453435354%3AVg6DjXraZlISez%3A15","ds_user_id":"5453435354","mid":"W-SbgAAEAAGuwWxQcdNcdZ0xa8Mi"}');

            $profile->get_insta_media(15, NULL, $cookies);
            echo "(<b>ok</b>)<br>";
        }

        public function do_unfollow_work() {
            //está comentada en el antiguo fichero 
        }

        public function process_error($json_response) {
            
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