<?php

namespace business\worker {

    require_once config_item('business-class');
    require_once config_item('business-client-class');
    require_once config_item('business-ref_profile-class');
    //require_once config_item('business-insta-client-class');
    require_once config_item('thirdparty-cookies-resource');

    use InstaApiWeb\Cookies;
    use business\Client;
    use business\Business;
    use business\SystemConfig;
    use business\Loader;
    use business\ReferenceProfile;

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an DailyWork worker class.
     * 
     */
    class DailyWork extends Business {

        /**
         * 
         * @access public
         */
        public $Client;

        /**
         * 
         * @access public
         */
        public $Ref_profile;

        /**
         * 
         * @access public
         */
        public $Foults;

        function __construct() {
            $ci = &get_instance();

            $ci->load->model('daily_work_model');
        }

        public static function get_next_work() {
            $dailywork = new DailyWork();
            $ci = &get_instance();
            $ci->load->model('daily_work_model');
            $work_data = $ci->daily_work_model->get_next_work();

            $dailywork->Ref_profile = new ReferenceProfile($work_data->reference_id);
            $dailywork->Client = new \business\Client($work_data->client_id);
            $dailywork->Client->load_insta_data();
            return $dailywork;
        }

        public static function exist_work() {
            return TRUE;
        }

        public function is_work_done($config) {
            
        }

        public function get_unfollow_list() {
            // Get profiles to unfollow today for this Client...(i.e the last followed)
            /*  $unfollow_data = $this->db_model->get_unfollow_data($client_id);
              while ($Followed = $unfollow_data->fetch_object()) {
              $To_Unfollow = new \follows\cls\Followed();
              // Update Ref Prof Data
              $To_Unfollow->id = $Followed->id;
              $To_Unfollow->followed_id = $Followed->followed_id;
              array_push($this->Followeds_to_unfollow, $To_Unfollow);
              } */
        }

        public static function delete_dailywork(Client $client) {
            
        }
        
        public function save_work()
        {
           /* try {
                //$DB = new \follows\cls\DB();
                //$this->DB->save_unfollow_work($Followeds_to_unfollow);
                $this->DB->save_unfollow_work_db2($Followeds_to_unfollow, $daily_work->client_id);
                $this->DB->save_follow_work($Ref_profile_follows, $daily_work);
                return TRUE;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
                return FALSE;
            }*/
            
        }

    }

}