<?php

namespace business\worker {

    use business\Business;
    use business\Client;

require_once config_item('business-class');
    require_once config_item('business-client-class');
    require_once config_item('business-robot-class');
    require_once config_item('business-client-list-class');
    require_once config_item('business-daily_work-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Worker worker class.
     * 
     */
    class Worker extends Business {

        public $id;
        private $config;
        public $work_queue = array();
        public $dir;
        public $robot;
        public $mail;
        private $ci;

        function __construct() {
            $ci = &get_instance();
            $ci->load->library("LogsManager_lib", null, 'LogMgr');
        }

        // LISTA!!!
        public function get_worker_config() {
            return $config;
        }

        public function truncate_daily_work() {
            $ci = &get_instance();
            $ci->load->model('Daily_work_model');
            $ci->Daily_work_model->truncate();
        }

        // LISTA!!!
        public function prepare_daily_work(bool $not_mail = false) {
            // Get Clients Info
            $Clients = new \business\ClientList();
            $Clients->load_data();

            $ci = &get_instance();
            $ci->load->model('Daily_work_model');
            $Client = new Client(0);

            foreach ($Clients->Clients as $Client) { // for each CLient
                print("<br>\n Client: $Client->Id <br>\n");
                if ($Client->isWorkable()) {
                    print("<br>\n Is Workable <br>\n<br>\n");
                    $Client->load_insta_reference_profiles_data(1);
                    // Distribute work between clients RPs 
                    $reference_profiles = $Client->ReferenceProfiles->workable();
                    print("<br>\nWorkable Reference Profiles: " . count($reference_profiles) . " <br>\n<br>\n");
                    if (strtotime("today") - $Client->MarkInfo->init_date < 15 * 24 * 60 * 60) {
                        $DIALY_REQUESTS_BY_CLIENT = 480;
                    } else {
                        $DIALY_REQUESTS_BY_CLIENT = $Client->MarkInfo->Plane->to_follow;
                    }
                    if (count($reference_profiles) > 0) {
                        $to_follow_unfollow = $DIALY_REQUESTS_BY_CLIENT / count($reference_profiles);
                        // If User status = UNFOLLOW he unfollow profile that the system followed
                        $to_follow = !$Client->MarkInfo->Status->hasStatus(\business\UserStatus::UNFOLLOW) ? $to_follow_unfollow : 0;
                        $to_unfollow = $to_follow_unfollow;
                        foreach ($reference_profiles as $Ref_Prof) { // For each reference profile
                            if (!$Ref_Prof->Deleted && $Ref_Prof->End_date == NULL) {
                                $ci->Daily_work_model->save($Ref_Prof->Id, $to_follow, $to_unfollow);
                            }
                        }
                    } else {
                        echo "Not reference profiles: $Client->login <br>\n<br>\n";
                        if (count($Client->reference_profiles)) { // To keep unfollow
                            $ci->db_model->insert_daily_work($Client->reference_profiles[0]->id, 0, $DIALY_REQUESTS_BY_CLIENT, $Client->cookies);
                        }
                            #@TODO Uncomment
//                        if (!$not_mail)
//                            $this->Gmail->send_client_not_rps($Client->email, $Client->name, $Client->login, $Client->pass);
                    }
                }
            }
        }

        // NUEVAS x IMPLMENTAR !!!
        public function prepare_client_daily_work(int $client_id, bool $not_mail = false) {
            
        }

        // NUEVAS x IMPLMENTAR !!!
        public function request_current_work(\business\cls\Client $client = NULL) {
            
        }

        public static function verify_client(Client $client) {
            if (!isset($client->MarkInfo->Cookies) || ($client->MarkInfo->Cookies->SessionId == null)) {
                $login_response = $client->do_login();
                return ($login_response && isset($login_response->Cookies) 
                        && $login_response->Cookies != NULL && $client->MarkInfo->Cookies->SessionId != null);
            }
            return true;
        }

        // LISTA!!!
        public function do_work(int $client_id = NULL, int $n = NULL, int $rp = NULL) {
            $ci = &get_instance();
            $N = 1;
            while ($N++ <= 3) {
//            while (true) {
                try {
                    print 'Get_next_work: \n';
                    $daily_work = DailyWork::get_next_work($client_id);
                    $ci = &get_instance();
                    $ci->LogMgr->WriteResponse($daily_work);            
                    if ($daily_work !== null) {
                        if (Worker::verify_client($daily_work->Client)) {
                            $daily_work->Client->load_mark_info_data();
                            $Proxy = $daily_work->Client->MarkInfo->Proxy->Id ? $daily_work->Client->MarkInfo->Proxy->getApiProxy() : NULL;
                            $ci->load->library("InstaApiWeb/InstaClient_lib", array("insta_id" => $daily_work->Client->MarkInfo->insta_id, "cookies" => $daily_work->Client->MarkInfo->Cookies, "proxy" => $Proxy), 'InstaClient_lib');
                            $robot = new Robot();
                            print 'Do_follow_work: \n';
                            $robot->do_follow_work($daily_work, $ci->InstaClient_lib);
                            print 'Do_unfollow_work: \n';
                            $robot->do_unfollow_work($daily_work, $ci->InstaClient_lib);
                            unset($ci->InstaClientBusiness_lib);
                            //break;
                        } else {
                            $daily_work->delete_dailywork();
                        }
                    } else {
                        //sleep(1 * 20);
                        sleep(5 * 60);
                    }
                } catch (\Throwable $exc) {
                     $ci = &get_instance();
                     $ci->LogMgr->WriteResponse($exc);
                    //$exc->getTraceAsString();
                }
            }
        }

        function do_work_by_id(int $reference_id) {
            $daily_work = new DailyWork();
            $daily_work = DailyWork::get_next_work($reference_id);
            $daily_work->login_data = json_decode($daily_work->Client->MarkInfo->cookies);

            if (Worker::verify_client($daily_work->Client)) {
                $ci = &get_instance();
                $ci->load->library("InstaApiWeb/InstaClient_lib", array("insta_id" => $daily_work->Ref_profile->Insta_id, "cookies" => $daily_work->Client->MarkInfo->Cookies), 'InstaClient_lib');
                $robot = new Robot();
                if ($daily_work->to_follow > 0)
                    $robot->do_follow_work($daily_work, $ci->InstaClient_lib);
                if ($daily_work->to_unfollow > 0)
                    $robot->do_unfollow_work($daily_work, $ci->InstaClient_lib);
                unset($ci->InstaClientBusiness_lib);
            }
        }

    }

}
