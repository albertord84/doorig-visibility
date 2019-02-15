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

        public function do_follow_work(DailyWork $work) {
          $profile_list = array();
          $cookies = $work->Client->InstaInfo->Cookies;
          foreach ($work->get_followers($cookies,5/*,proxy*/) as $profile) {
            //pedir datos del perfil y validar perfil
            if($this->validate_profile($profile))
            {
              $result = $work->Client->InstaInfo->InstaClient->follow($profile->get_insta_id);
              if($this->process_response($result))
              {
                  array_push($profile_list);
              }
            }
          }
        }
               

        public function do_unfollow_work(DailyWork $work) {
          $profile_list = array();
          foreach ($work->get_unfollow_list() as $profile) {            
            $result = $work->Client->InstaInfo->InstaClient->unfollow($profile->id);
            if($this->process_response($result))
            {
                array_push($profile_list);
            }            
          }
        }
        
        public function validate_profile($profile)
        {
          return TRUE;
        }

        public function process_response($json_response) {

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