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
            $ci = &get_instance();
            $ci->load->model('daily_work_model');
            return $ci->daily_work_model->get_unfollowed_list($this->Client->id);
        }

        public function delete_dailywork() {
            
        }
        
        public function save_follow_work(string $profile_name, string $insta_id)
        {           
            $ci = &get_instance();
            $ci->load->model('daily_work_model');
            $ci->daily_work_model->save_follow($this->Client->Id,$this->Ref_profile->Id, $prfile_name,$insta_id);
            $ci->daily_work_model->update_follow(1);

        }
        
        public function save_unfollow_work(string $insta_id)
        {     
            $ci = &get_instance();
            $ci->load->model('daily_work_model');            
            $ci->daily_work_model->save_unfollow($this->Client->Id,$insta_id);
            $ci->daily_work_model->update_unfollow(1);             
        }


    }

}