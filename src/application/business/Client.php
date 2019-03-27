<?php

namespace business {

    require_once config_item('business-mark_info-class');
    require_once config_item('business-cookies-class');
    require_once config_item('business-daily_report-class');
    require_once config_item('business-ref_profile-class');
    require_once config_item('business-reference-profiles-class');
    require_once config_item('business-black_and_white_list-class');
    require_once config_item('business-response-class');
    require_once config_item('thirdparty-login_response-class');

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

        public function load_mark_info_data_by_insta_id(int $insta_id = NULL) {
            $this->MarkInfo->load_data_by_insta_id($insta_id);
        }

        public function remove($client_id) {
            $this->MarkInfo->remove();
        }

        static function save($client_id, $plane_id = NULL, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL) {
            $init_date = $init_date ? $init_date : time();
            $ci = &get_instance();
            $ci->load->model('client_mark_model');
            if (self::exist($client_id)) {
                throw ErrorCodes::getException(ErrorCodes::DATA_ALREADY_EXIST);
            } else {
                $ci = &get_instance();

                // Insert table with client id in DB followed
                $ci->client_mark_model->create_followed_table($client_id);

                $client_id = $ci->client_mark_model->save($client_id, $plane_id, $pay_id, $proxy_id, $login, $pass, $insta_id, $init_date, $end_date, $cookies, $observation, $purchase_counter, $last_access, $insta_followers_ini, $insta_following);
            }

            return $client_id;
        }

        static function update($client_id, $plane_id = NULL, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL) {
            $ci = &get_instance();
            $ci->load->model('client_mark_model');

            $ci->client_mark_model->update($client_id, $plane_id, $pay_id, $proxy_id, $login, $pass, $insta_id, $init_date, $end_date, $cookies, $observation, $purchase_counter, $last_access, $insta_followers_ini, $insta_following);
        }

        static function exist(string $client_id) {
            try {
                $Client = new Client($client_id);
                $Client->MarkInfo->load_data();

                $exist = $Client->MarkInfo->client_id > 0;
                if ($exist)
                    $exist = !$Client->MarkInfo->Status->hasStatus(UserStatus::DELETED);
                return $exist;
            } catch (\Exception $exc) {
                //echo $exc->getTraceAsString();
            }
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

        //Componente del Robot        

        /**
         * 
         * @todo
         * @param type
         * @return
         * 
         */
        public function checkpoint_requested(int $choice = \InstaApiWeb\VerificationChoice::Email) {
            if (!$this->MarkInfo->isLoaded())
                $this->MarkInfo->load_data();

            $ci = &get_instance();
            $ci->load->library('InstaApiWeb/InstaClient_lib', self::get_gost_insta_client_lib_params(), 'InstaClient_lib');

            $login_response = $ci->InstaClient_lib->checkpoint_requested($this->MarkInfo->login, $this->MarkInfo->pass, $choice);

            // Guardar las cookies en la Base de Datos
            if ($login_response && ($login_response->Cookies)) {
                $this->MarkInfo->Cookies = $login_response->Cookies;
                $ci->session->set_userdata('client', serialize($this));
                $cookies_str = json_encode($login_response->Cookies);
                self::update($this->Id, null, null, null, null, null, null, null, null, $cookies_str);
            }

            return $login_response;
        }

        //Componente del Robot

        /**
         * 
         * @todo
         * @param type
         * @return
         * 
         */
        public function make_checkpoint(string $code) {
            if (!$this->MarkInfo->isLoaded())
                $this->MarkInfo->load_data();

            $ci = &get_instance();
            $ci->load->library('InstaApiWeb/InstaClient_lib', $param = array("insta_id" => $this->MarkInfo->insta_id, "cookies" => $this->MarkInfo->Cookies), 'InstaClient_lib');
            $login_response = $ci->InstaClient_lib->make_checkpoint($this->MarkInfo->login, $code);

            // Guardar las cookies en la Base de Datos
            if ($login_response && ($login_response->Cookies)) {
                $this->MarkInfo->Cookies = $login_response->Cookies;

                $cookies_str = json_encode($login_response->Cookies);
                self::update($this->Id, null, null, null, null, null, null, null, null, $cookies_str);
            }

            $return_response = $this->process_login_response($login_response);

            return $login_response;
        }

        //Componente del Robot

        /**
         * 
         * @todo
         * @param type
         * @return
         * 
         */
        public function do_login() {
            $login_response = new \InstaApiWeb\Response\LoginResponse();
            try {
                if (!$this->MarkInfo->isLoaded())
                    $this->MarkInfo->load_data();

                $ci = &get_instance();
                $params = $this->get_gost_insta_client_lib_params();
                $params['proxy'] = new \InstaApiWeb\Proxy($this->MarkInfo->Proxy->Ip, $this->MarkInfo->Proxy->Port, $this->MarkInfo->Proxy->User, $this->MarkInfo->Proxy->Password);
                $ci->load->library('InstaApiWeb/InstaClient_lib', $params, 'InstaClient_lib');
                $login_response = $ci->InstaClient_lib->make_login($this->MarkInfo->login, $this->MarkInfo->pass);
            } catch (\Throwable $e) {
                var_dump($e);
            }
            $return_response = $this->process_login_response($login_response);
            return $return_response;
        }

        public function process_login_response(\InstaApiWeb\Response\LoginResponse $login_response = null) {
            if ($login_response) {
                switch ($login_response->code) {
                    case 0: // Login ok
                        //3. Poner el Cliente como activo, y guardar las cookies
                        $this->MarkInfo->Status->remove_item(UserStatus::VERIFY_ACCOUNT);
                        $this->MarkInfo->Status->remove_item(UserStatus::BLOCKED_BY_INSTA);
                        $this->MarkInfo->update_cookies(json_encode($login_response->Cookies));
                        return Response\Response::ResponseOK();

                    case 3: // Bloqued by password
                        $this->MarkInfo->Status->add_item(UserStatus::BLOCKED_BY_INSTA);
                        return Response\Response::ResponseOK();

                    case 2: // Check Point Required
                        $this->MarkInfo->Status->add_item(UserStatus::VERIFY_ACCOUNT);
                        return Response\Response::ResponseOK();

                    case -2: // Other exception

                    default:
                        return Response\Response::ResponseFAIL($login_response->message, $login_response->code);
                        break;
                }
            }
            return Response\Response::ResponseFAIL(T('Empty login response'), -3);
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
            if (!$this->MarkInfo->isLoaded())
                $this->load_mark_info_data();
            if ($this->MarkInfo->cookies && !$this->MarkInfo->Status->hasStatus(UserStatus::PAUSED) && !$this->MarkInfo->Status->hasStatus(UserStatus::BLOCKED_BY_PAYMENT) && !$this->MarkInfo->Status->hasStatus(UserStatus::BLOCKED_BY_INSTA) && !$this->MarkInfo->Status->hasStatus(UserStatus::KEEP_UNFOLLOW) && !$this->MarkInfo->Status->hasStatus(UserStatus::VERIFY_ACCOUNT)) {
                return TRUE;
            }
            return FALSE;
        }

        static function get_gost_insta_client_lib_params() {
            $ck = array("sessionid" => "3445996566%3AUdrflm2b4CXrbl%3A15",
                "csrftoken" => "7jSEZvsYWGzZQUx5zlR8I3MmvPATX1X0",
                "ds_user_id" => "3445996566",
                "mid" => "XEExCwAEAAE88jhoc0YKOgFcqT3I");
            require_once config_item('thirdparty-cookies-resource');
            $param = array("insta_id" => "3445996566", "cookies" => new \InstaApiWeb\Cookies(json_encode($ck)));

            return $param;
        }

        function exist_followed(string $insta_id) {
            $ci = &get_instance();
            $ci->load->model('client_mark_model');
            return $ci->client_mark_model->get_followed($this->Id, $insta_id) != null;
        }

    }

}

?>
