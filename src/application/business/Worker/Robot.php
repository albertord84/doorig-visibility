<?php

namespace business\worker {

    use business\Business;
    use business\Client;
    use \InstaApiWeb\Response\FollowersResponse;

require_once config_item('business-client-class');
    require_once config_item('business-class');
    require_once config_item('thirdparty-followers-response-class');

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
            
        }

        public function do_follow_work(DailyWork $work, \InstaClient_lib $instaclient) {
            $cookies = $work->Client->MarkInfo->Cookies;
            $to_follow = min($GLOBALS['sistem_config']->REQUESTS_AT_SAME_TIME, $work->to_follow);
            $proxy = $work->Client->MarkInfo->Proxy;
            $followers_response = $work->Ref_profile->get_followers($cookies, $to_follow, $proxy);
            $client_id = $work->Client->Id;
            $ref_prof_id = $work->Ref_profile->Id;
            //var_dump($followers_response);
            if ($this->process_followers_reponse($work, $followers_response)) {
                foreach ($followers_response->FollowersCollection as $profile) {
                    //pedir datos del perfil y validar perfil

                    if ($this->validate_profile_follow($work, $profile)) {
                        $result = $instaclient->follow($profile->insta_id);
                        $result = $this->InsertLogsParameters($result, "Follow", $client_id, $ref_prof_id, $profile);
                        if ($this->process_response($work, $result)) {
                            $work->save_follow_work($profile->insta_name, $profile->insta_id);
                        } else {
                            break;
                        }
                    }
                }
            }
        }

        public function do_unfollow_work(DailyWork $work, \InstaClient_lib $instaclient) {
            $client_id = $work->Client->Id;
            foreach ($work->get_unfollow_list() as $profile) {
                if ($this->validate_profile_unfollow($work, $profile)) {
                    $result = $instaclient->unfollow($profile->followed_id);
                    $profile->insta_id = $profile->followed_id;
                    $result = $this->InsertLogsParameters($result, "Unfollow", $client_id, NULL, $profile);
                    if ($this->process_response($work, $result) ||
                            (isset($result->Insta_Response->message) && $result->Insta_Response->message == "")) {
                        $work->save_unfollow_work($profile->followed_id);
                    } else {
                        break;
                    }
                }
            }
        }

        public function validate_profile_follow(DailyWork $work, $profile) {
            //$work->Ref_profile;
            if ($work->Client->BlackAndWhiteList->is_black($profile->insta_id))
                return FALSE;
            $null_picture = strpos($profile->profile_pic_url, '44884218_345707102882519_2446069589734326272_n');
            if ($profile->instaProfileData->requested_by_viewer || $profile->instaProfileData->followed_by_viewer || $profile->instaProfileData->has_blocked_viewer || $null_picture)
                return FALSE;
            if ($work->Client->exist_followed($profile->insta_id))
                return FALSE;
            return TRUE;
        }

        public function validate_profile_unfollow(DailyWork $work, $profile) {
            $work->Ref_profile;
            if ($work->Client->BlackAndWhiteList->is_white($profile->followed_id))
                return FALSE;

            return TRUE;
        }

        function process_followers_reponse(DailyWork $daily_work, FollowersResponse $followers_response) {
            if ($followers_response && $followers_response->code == 0)
                return true;
            $login_response = $daily_work->Client->do_login();
            if ($login_response->code == 0) {
                if ($daily_work->Client->MarkInfo->Status->hasStatus(\business\UserStatus::VERIFY_ACCOUNT) ||
                        $daily_work->Client->MarkInfo->Status->hasStatus(\business\UserStatus::BLOCKED_BY_INSTA) ||
                        $daily_work->Client->MarkInfo->Status->hasStatus(\business\UserStatus::BLOCKED_BY_TIME)) {
                    $daily_work->delete_dailywork();
                } else {
                    $daily_work->Client->MarkInfo->increase_client_last_access(2 * 60 * 60); //2h
                }
            }
            return false;
        }

        public function process_response(DailyWork $daily_work, $response) {
            $ci = &get_instance();
            $ci->LogMgr->WriteResponse($response);
            $client_id = $daily_work->Client->Id;
            $ref_prof_id = $daily_work->Ref_profile->Id;
            switch ($response->code) {
                case 0:
                    return true;
                case 1: // "Com base no uso anterior deste recurso, sua conta foi impedida temporariamente de executar essa ação. Esse bloqueio expirará em há 23 horas."
                    print "<br>\n Unautorized Client (id: $client_id) set to BLOCKED_BY_INSTA!!! <br>\n";
                    $daily_work->delete_dailywork();
                    // $this->DB->insert_event_to_washdog($client_id, washdog_type::BLOCKED_BY_TIME, 1, $this->id);
                    $daily_work->Client->MarkInfo->Status->add_item(user_status::BLOCKED_BY_TIME, TRUE, time());
                    break;
                case 2: // "Você atingiu o limite máximo de contas para seguir. É necessário deixar de seguir algumas para começar a seguir outras."
                    $daily_work->delete_dailywork();
                    //var_dump($result);
                    // $this->DB->insert_event_to_washdog($client_id, washdog_type::SET_TO_UNFOLLOW, 1, $this->id);
                    $daily_work->Client->MarkInfo->Status->add_item(user_status::UNFOLLOW, TRUE, time());
                    print "<br>\n Client (id: $client_id) set to UNFOLLOW!!! <br>\n";
                    break;
                case 3: // "Unautorized"
                    $daily_work->delete_dailywork();
                    $daily_work->Client->do_login();
                    //si do login ok update cookies
                    print "<br>\n Unautorized Client (id: $client_id) set to BLOCKED_BY_INSTA!!! <br>\n";
                    break;
                case 4: // "Parece que você estava usando este recurso de forma indevida"
                    $daily_work->delete_dailywork();
                    var_dump($result);
                    $daily_work->Client->MarkInfo->Status->add_item(user_status::BLOCKED_BY_TIME, TRUE, time());
                    print "<br>\n Unautorized Client (id: $client_id) set to BLOCKED_BY_TIME!!! <br>\n";
                    //$this->DB->insert_event_to_washdog($client_id, washdog_type::BLOCKED_BY_TIME, 1, $this->id);
                    // Alert when insta block by IP
                    /* $result = $this->DB->get_clients_by_status(user_status::BLOCKED_BY_TIME);
                      $rows_count = $result->num_rows;
                      if ($rows_count == 100 || $rows_count == 150 || ($rows_count >= 200 && $rows_count <= 210)) {
                      //[CONSERTAR] Ver email problem
                      //$Gmail = new Gmail();
                      //$Gmail->send_client_login_error("josergm86@gmail.com", "Jose!!!!!!! BLOQUEADOS 4= " . $rows_count, "Jose");
                      //$Gmail->send_client_login_error("ruslan.guerra88@gmail.com", "Ruslan!!!!!!! BLOQUEADOS 4= " . $rows_count, "Ruslan");
                      }
                      print "<br>\n BLOCKED_BY_TIME!!! number($rows_count) <br>\n";
                     */
                    break;
                case 5: // "checkpoint_required"
                    $daily_work->delete_dailywork();
                    var_dump($result);
                    $daily_work->Client->MarkInfo->Status->add_item(user_status::VERIFY_ACCOUNT, TRUE, time());
                    //$this->DB->insert_event_to_washdog($client_id, washdog_type::ROBOT_VERIFY_ACCOUNT, 1, $this->id);
                    //$this->DB->set_client_cookies($client_id, NULL);
                    print "<br>\n Unautorized Client (id: $client_id) set to VERIFY_ACCOUNT!!! <br>\n";
                    break;
                case 6: // "" Empty message
                    print "<br>\n Empty message (ref_prof_id: $ref_prof_id)!!! <br>\n";
                    break;
                case 7: // "Há solicitações demais. Tente novamente mais tarde." "Aguarde alguns minutos antes de tentar novamente."
                    print "<br>\n Há solicitações demais. Tente novamente mais tarde. (ref_prof_id: $ref_prof_id)!!! <br>\n";
                    $daily_work->Client->MarkInfo->set_proxy();
                    $new_proxy = $daily_work->Client->MarkInfo->proxy_id;
                    var_dump("Set Proxy ($idProxy) of client ($client_id) to proxy ($new_proxy)\n");

                    /*
                      $this->DB->insert_event_to_washdog($client_id, washdog_type::SET_PROXY, 1, $this->id, "proxy set from proxy $proxy->idProxy to $new_proxy");

                      var_dump("Set Proxy ($proxy->idProxy) of client ($client_id) to proxy ($new_proxy)\n");
                      $this->DB->set_proxy_to_client($client_id, $new_proxy); */
                    break;
                case 8: // "Esta mensagem contém conteúdo que foi bloqueado pelos nossos sistemas de segurança." 
                    $daily_work->delete_dailywork();
                    //$this->DB->insert_event_to_washdog($client_id, washdog_type::BLOCKED_BY_TIME, 1, $this->id);
                    $daily_work->Client->MarkInfo->Status->add_item(user_status::BLOCKED_BY_TIME, TRUE, time());
                    print "<br>\n Esta mensagem contém conteúdo que foi bloqueado pelos nossos sistemas de segurança. (ref_prof_id: $ref_prof_id)!!! <br>\n";
                    break;
                case 9: // "Ocorreu um erro ao processar essa solicitação. Tente novamente mais tarde." 
                    print "<br>\n Ocorreu um erro ao processar essa solicitação. Tente novamente mais tarde. (ref_prof_id: $ref_prof_id)!!! <br>\n";
                    break;
                case 10:
                    print "<br> Empty array in POST </br>";
                    $daily_work->Client->MarkInfo->set_proxy();
                    $new_proxy = $daily_work->Client->MarkInfo->proxy_id;
                    var_dump("Set Proxy ($idProxy) of client ($client_id) to proxy ($new_proxy)\n");
                    /* Set Proxy
                      $this->DB->insert_event_to_washdog($client_id, washdog_type::SET_PROXY, 1, $this->id, "proxy set from proxy $proxy->idProxy to $new_proxy");
                     */
                    break;
                case 11:
                    print "<br> se ha bloqueado. Vuelve a intentarlo</br>";
                    $daily_work->delete_dailywork();
                    $daily_work->Client->MarkInfo->Status->add_item(user_status::BLOCKED_BY_TIME, TRUE, time());
                    break;
                case 12:
                    print "<br>$ref_prof_id set to null<br>\n";
                    break;
                default:
                    print "<br>\n Client (id: $client_id) not error code found ($error)!!! <br>\n";
                    break;
            }
            var_dump($response);
            return false;
        }

        private function InsertLogsParameters($result = NULL, $action = NULL, $client_id = NULL, $ref_prof_id = NULL, $profile = NULL) {
            if ($action != NULL)
                $result->add_params("title", "$action");
            if ($client_id != NULL)
                $result->add_params("client", "$client_id");
            if ($ref_prof_id != NULL)
                $result->add_params("rp", "$ref_prof_id");
            if ($profile != NULL) {
                $result->add_params("profile", "$profile->insta_id");
                $result->add_params("profile_name", "$profile->insta_name");
            }
            $date = date("M,d,Y h:i:s A");
            $result->add_params("time", $date);
            return $result;
        }

        public function total_unfollow(\business\Client $client, \InstaClient_lib $instaclient) {
            $count = 0;
            $cursor = null;

            $work = new DailyWork();
            $work->Client = $client;
            $work->Ref_profile = new \business\ReferenceProfile();
            $work->Client->load_black_and_white_list_data();
            $followed = $instaclient->get_followed(10, $cursor);
            if ($followed->code == 0) {
                for ($i = 0; $i < 10; $i++) {
                    $profile = $followed->FollowersCollection[$i];
                    $profile->followed_id = $profile->id;
                    if ($this->validate_profile_unfollow($work, $profile)) {
                        $result = $instaclient->unfollow($profile->id);
                        $profile->insta_id = $profile->id;
                        $result = $this->InsertLogsParameters($result, "Total Unfollow", $client->Id, NULL, $profile);
                    
                        if (!$this->process_response($work, $result)) {
                            break;
                        }
                        //eliminar el perfil de la tabla de followed si existe                         
                    }
                }
            }
            
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