<?php

namespace business {

    require_once config_item('business-mark_info-class');
    require_once config_item('business-daily_report-class');
    require_once config_item('business-ref_profile-class');
    require_once config_item('business-reference-profiles-class');
    require_once config_item('business-black_and_white_list-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Client business class.
     * 
     */
    class Client extends Business {

        public $Id;
        public $ReferenceProfiles;      // Client referent profiles Class: Alberto
        public $DailyReport;            // Client daily report Class: Alberto
        public $MarkInfo;               // Client Mark Class: Alberto
        public $BlackAndWhiteList;      // Client Black and White List Class: Alberto

        public function __construct(int $id) {
            parent::__construct();

            $this->Id = $id;
            $this->MarkInfo = new MarkInfo($this);
            $this->ReferenceProfiles = new ReferenceProfiles($this);
            $this->DailyReport = new DailyReport($this);
            $this->BlackAndWhiteList = new BlackAndWhiteList($this);
        }

        public function load_daily_report_data() {
            $this->DailyReport->load_data();
        }

        public function load_insta_reference_profiles_data(int $status = 0, int $type = -1) {
            $this->ReferenceProfiles->load_data($status, $type);
        }

        public function load_black_and_white_list_data() {
            $this->BlackAndWhiteList->load_data();
        }

        public function load_mark_info_data() {
            $this->MarkInfo->load_data();
        }

        public function login() {
            return true;
        }

        public function remove($client_id) {
            $this->MarkInfo->remove();
        }

        function save($client_id, $plane_id = 1, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL) {
            $ci = &get_instance();
            $ci->load->model('client_mark_model');
            $ci->client_mark_model->save($client_id, $plane_id, $pay_id, $proxy_id, $login, $pass, $insta_id, $init_date, $end_date, $cookies, $observation, $purchase_counter, $last_access, $insta_followers_ini, $insta_following);
        }

        /**
         * 
         * @param string $email
         * @throws Exception
         */
        static function send_contact_us($useremail, $username, $message, $company = NULL, $phone = NULL) {
            try {
                $ci = &get_instance();
                $ci->load->library("gmail");
                $ci->gmail->send_contact_us($useremail, $username, $message, $company, $phone);
                return TRUE;
            } catch (\Exception $exc) {
                throw $e;
            }
            return FALSE;
        }

        public function verify_cookies() {
            // Log user with curl in istagram to get needed session data
            //$login_data = $Client->sign_in($Client);
            //if ($login_data !== NULL) {
            //    $Client->cookies = json_encode($login_data);
            //}
            return TRUE;
        }

        public function isWorkable() {
            if (!$this->MarkInfo->isLoaded()) $this->load_mark_info_data();
            if ($this->MarkInfo->cookies 
                    && !$this->MarkInfo->hasStatus(UserStatus::PAUSED)
                    && !$this->MarkInfo->hasStatus(UserStatus::BLOCKED_BY_PAYMENT)
                    && !$this->MarkInfo->hasStatus(UserStatus::BLOCKED_BY_INSTA)
                    && !$this->MarkInfo->hasStatus(UserStatus::KEEP_UNFOLLOW)
                    && !$this->MarkInfo->hasStatus(UserStatus::VERIFY_ACCOUNT)) {
                return TRUE;
            }
            return FALSE;
        }

    }

}

?>
