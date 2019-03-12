<?php

namespace business\worker {

    use business\Business;
    use business\Client;

require_once config_item('business-class');
    require_once config_item('business-client-class');

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
            $this->ci = &get_instance();

            $this->ci->load->model('db_model');
        }

        // LISTA!!!
        public function get_worker_config() {
            return $config;
        }

        // LISTA!!!
        public function prepare_daily_work(bool $not_mail = false) {
            // Get Clients Info
            $Clients = new \business\ClientList();
            $Clients->load_data();
            $this->ci = &get_instance();

            $this->ci->load->model('Daily_work_model');
            $Client = new Client();
            foreach ($Clients->Clients as $Client) { // for each CLient
                if ($Client->isWorkable()) {
                    // Distribute work between clients RPs 
                    $reference_profiles = $Client->ReferenceProfiles->workable();
                    print("<br>\nWorkable Referenc Profile: " . count($reference_profiles) . " <br>\n<br>\n");
                    if (strtotime("today") - $Client->MarkInfo->init_date < 15 * 24 * 60 * 60) {
                        $DIALY_REQUESTS_BY_CLIENT = 480;
                    } else {
                        $DIALY_REQUESTS_BY_CLIENT = $Client->MarkInfo->Plane->to_follow;
                    }
                    if (count($reference_profiles) > 0) {
                        $to_follow_unfollow = $DIALY_REQUESTS_BY_CLIENT / count($reference_profiles);
                        // If User status = UNFOLLOW he unfollow profile that the system followed
                        $to_follow = !$this->MarkInfo->hasStatus(\business\UserStatus::UNFOLLOW) ? $to_follow_unfollow : 0;
                        $to_unfollow = $to_follow_unfollow;
                        foreach ($reference_profiles as $Ref_Prof) { // For each reference profile
                            if (!$Ref_Prof->Deleted && $Ref_Prof->End_date == NULL) {
                                $valid_geo = ($Ref_Prof->Type == 1 && ($Client->MarkInfo->plane_id == 1 || $Client->plane_id > 3));
                                $valid_hastag = ($Ref_Prof->Type == 2 && ($Client->MarkInfo->plane_id == 1 || $Client->MarkInfo->plane_id > 3));
                                if ($Ref_Prof->Type == 0 || $valid_geo || $valid_hastag) { // Nivel de permisos dependendo do plano, solo para quem tem permissao para geo ou hastag
                                    
                                    $ci->dayli_work_model->save($Ref_Prof->id, $to_follow, $to_unfollow, $Client->cookies);
                                }
                            }
                        }
                    } else {
                        echo "Not reference profiles: $Client->login <br>\n<br>\n";
                        if (count($Client->reference_profiles)) { // To keep unfollow
                            $ci->db_model->insert_daily_work($Client->reference_profiles[0]->id, 0, $DIALY_REQUESTS_BY_CLIENT, $Client->cookies);
                        }
                        if (!$not_mail)
                            $this->Gmail->send_client_not_rps($Client->email, $Client->name, $Client->login, $Client->pass);
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
            $do_login = true;
            if ($client->MarkInfo->Cookies == null) {
                $do_login = $client->login();
            }
            return $do_login;
        }

        // LISTA!!!
        public function do_work(int $client_id = NULL, int $n = NULL, int $rp = NULL) {
            $ci = &get_instance();
            ///opt/lampp/htdocs/follows-worker/src/application/libraries/InstaApiWeb/InstaGeoProfile_lib.php
            while (DailyWork::exist_work()) {
                $daily_work = DailyWork::get_next_work($client_id);

                if (Worker::verify_client($daily_work->Client)) {
                    $ci->load->library("InstaApiWeb/InstaClient_lib", array("insta_id" => "3445996566", "cookies" => $daily_work->Client->MarkInfo->Cookies), 'InstaClient_lib');
                    $robot = new Robot();
                    $robot->do_follow_work($daily_work, $ci->InstaClient_lib);
                    $robot->do_unfollow_work($daily_work, $ci->InstaClient_lib);
                    unset($ci->InstaClientBusiness_lib);
                } else {
                    DailyWork::delete_dailywork($daily_work->Client);
                }
            }
        }

    }

}
