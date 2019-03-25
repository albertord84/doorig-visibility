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

        public $to_follow;
        public $to_unfollow;

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
            
        }

        public static function get_next_work(int $id = NULL) {
            $ci = &get_instance();

            $ci->load->model('daily_work_model');
            $dailywork = new DailyWork();
            $work_data = $ci->daily_work_model->get_next_work($id, TRUE);
            if ($work_data != null) {
                $dailywork->Client = new \business\Client($work_data->client_id);
                $dailywork->Client->load_mark_info_data();
                $dailywork->Client->load_black_and_white_list_data();

                $dailywork->Ref_profile = new ReferenceProfile($work_data->reference_id, $dailywork->Client);
                $dailywork->Ref_profile->load_data();

                $dailywork->to_follow = $work_data->to_follow;
                $dailywork->to_unfollow = $work_data->to_unfollow;

                return $dailywork;
            }
            return null;
        }

        public function is_work_done($config) {
            
        }

        public function get_unfollow_list() {
            $ci = &get_instance();
            $ci->load->model('daily_work_model');
            return $ci->daily_work_model->get_unfollowed_list($this->Client->Id);
        }

        public function delete_dailywork() {
             $ci = &get_instance();
             $ci->load->model('daily_work_model');
             $ci->daily_work_model->remove_client_work($this->Client->Id);
        }

        public function save_follow_work(string $profile_name, string $insta_id) {
            $ci = &get_instance();
            $ci->load->model('daily_work_model');
            $ci->daily_work_model->save_follow($this->Client->Id, $this->Ref_profile->Id, $profile_name, $insta_id);
            $this->to_follow -= 1;
            $ci->daily_work_model->update_follow($this->to_follow, $this->Ref_profile->Id);

            // Increase RP amount of follows
            //$this->Ref_profile = new ReferenceProfile($this->Ref_profile->Id);
            $this->Ref_profile->increase_follows();
        }

        public function save_unfollow_work(string $insta_id) {
            $ci = &get_instance();
            $ci->load->model('daily_work_model');
            $ci->daily_work_model->save_unfollow($this->Client->Id, $insta_id);
            $this->to_unfollow -= 1;
            $ci->daily_work_model->update_unfollow($this->to_unfollow, $this->Ref_profile->Id);
        }

    }

}