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

            $Client = new Client(0);

            foreach ($Clients->Clients as $Client) { // for each CLient                
                print("<br>\n Client: $Client->Id <br>\n");
                $this->prepare_client_daily_work($Client, $not_mail,true);
            }
        }

        // NUEVAS x IMPLMENTAR !!!
        public function prepare_client_daily_work(\business\Client $client, bool $not_mail = false, $logs = false) {
            if ($client->isWorkable()) {
                    $to_follow = 0;
                     if (strtotime("today") - $Client->MarkInfo->init_date < 15 * 24 * 60 * 60) {
                        $to_follow = 480;
                    } else {
                        $to_follow = $client->MarkInfo->Plane->to_follow;
                    }
                    
                    $ci = &get_instance();
                    $ci->load->model('Daily_work_model');
                    $ci->Daily_work_model->save($client->Id, $to_follow, $to_follow);
                    $client->load_insta_reference_profiles_data();
                    $reference_profiles = count($client->ReferenceProfiles->workable());
                     if($logs)
                    { echo "{ \"workable\": true, \"client\" : $client->Id, ref_prof: $reference_profiles}"; }
                   
                    if( $reference_profiles == 0)
                    {                      
                        #@TODO Uncomment
//                      if (!$not_mail)
//                            $this->Gmail->send_client_not_rps($Client->email, $Client->name, $Client->login, $Client->pass);
                    }
                }
                else  if($logs)
                { echo "{ \"workable\": false, \"client\" : $client->Id}"; }
        }

        // NUEVAS x IMPLMENTAR !!!
        public function request_current_work(\business\Client $client = NULL) {
            
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
                        if (Client::verify_client($daily_work->Client)) {
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
