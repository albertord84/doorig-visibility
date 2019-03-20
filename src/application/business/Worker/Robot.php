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
            
        }

        public function do_follow_work(DailyWork $work, \InstaClient_lib $instaclient) {
            $cookies = $work->Client->MarkInfo->Cookies;
            $followers = $work->Ref_profile->get_followers($cookies, 5/* ,proxy */);
            if ($followers->code == 0) {
                foreach ($followers->FollowersCollection as $profile) {
                    //pedir datos del perfil y validar perfil
                    if ($this->validate_profile_follow($work, $profile)) {
                        $result = $instaclient->follow($profile->insta_id);
                        if ($this->process_response($result)) {
                            $work->save_follow_work($profile->insta_name, $profile->insta_id);
                        } else {
                            break;
                        }
                    }
                }
            }
        }

        public function do_unfollow_work(DailyWork $work, \InstaClient_lib $instaclient) {
            foreach ($work->get_unfollow_list() as $profile) {
                if ($this->validate_profile_unfollow($work, $profile)) {
                    $result = $instaclient->unfollow($profile->id);
                    if ($this->process_response($result)) {
                        $work->save_unfollow_work($profile->id);
                    } else {
                        break;
                    }
                }
            }
        }

        public function validate_profile_follow(DailyWork $work, $profile) {
            $work->Ref_profile;
            if ($work->Client->BlackAndWhiteList->is_black($profile->insta_id))
                return FALSE;
            $null_picture = strpos($Profile->profile_pic_url, '44884218_345707102882519_2446069589734326272_n');
            if ($profile->requested_by_viewer || $profile->followed_by_viewer || $null_picture)
                return FALSE;
            return TRUE;
        }

        public function validate_profile_unfollow(DailyWork $work, $profile) {
            $work->Ref_profile;
            if ($work->Client->BlackAndWhiteList->is_white($profile->insta_id))
                return FALSE;

            return TRUE;
        }

        public function process_response($response) {
            $ci = &get_instance();
            $ci->LogMgr->WriteResponse($response);
            switch ($response->code) {
                case 0:
                    return true;
                case 1: // "Com base no uso anterior deste recurso, sua conta foi impedida temporariamente de executar essa ação. Esse bloqueio expirará em há 23 horas."
                    print "<br>\n Unautorized Client (id: $client_id) set to BLOCKED_BY_INSTA!!! <br>\n";
                    $result = $this->DB->delete_daily_work_client($client_id);
                    $this->DB->insert_event_to_washdog($client_id, washdog_type::BLOCKED_BY_TIME, 1, $this->id);
                    $this->DB->set_client_status($client_id, user_status::BLOCKED_BY_TIME);
                    break;
                case 2: // "Você atingiu o limite máximo de contas para seguir. É necessário deixar de seguir algumas para começar a seguir outras."
                    $result = $this->DB->delete_daily_work_client($client_id);
                    var_dump($result);
                    $this->DB->insert_event_to_washdog($client_id, washdog_type::SET_TO_UNFOLLOW, 1, $this->id);
                    $this->DB->set_client_status($client_id, user_status::UNFOLLOW);
                    print "<br>\n Client (id: $client_id) set to UNFOLLOW!!! <br>\n";
//                    print "<br>\n Client (id: $client_id) MUST set to UNFOLLOW!!! <br>\n";
                    break;
                case 3: // "Unautorized"
                    $result = $this->DB->delete_daily_work_client($client_id);
                    $this->SetUnautorizedClientStatus($client_id);
                    print "<br>\n Unautorized Client (id: $client_id) set to BLOCKED_BY_INSTA!!! <br>\n";
                    break;
                case 4: // "Parece que você estava usando este recurso de forma indevida"
                    $result = $this->DB->delete_daily_work_client($client_id);
                    var_dump($result);
                    $this->DB->set_client_status($client_id, user_status::BLOCKED_BY_TIME);
                    print "<br>\n Unautorized Client (id: $client_id) set to BLOCKED_BY_TIME!!! <br>\n";
                    $this->DB->insert_event_to_washdog($client_id, washdog_type::BLOCKED_BY_TIME, 1, $this->id);
                    // Alert when insta block by IP
                    $result = $this->DB->get_clients_by_status(user_status::BLOCKED_BY_TIME);
                    $rows_count = $result->num_rows;
                    if ($rows_count == 100 || $rows_count == 150 || ($rows_count >= 200 && $rows_count <= 210)) {
                        //[CONSERTAR] Ver email problem
                        //$Gmail = new Gmail();
                        //$Gmail->send_client_login_error("josergm86@gmail.com", "Jose!!!!!!! BLOQUEADOS 4= " . $rows_count, "Jose");
                        //$Gmail->send_client_login_error("ruslan.guerra88@gmail.com", "Ruslan!!!!!!! BLOQUEADOS 4= " . $rows_count, "Ruslan");
                    }
                    print "<br>\n BLOCKED_BY_TIME!!! number($rows_count) <br>\n";
                    break;
                case 5: // "checkpoint_required"
                    $result = $this->DB->delete_daily_work_client($client_id);
                    var_dump($result);
                    $this->DB->set_client_status($client_id, user_status::VERIFY_ACCOUNT);
                    $this->DB->insert_event_to_washdog($client_id, washdog_type::ROBOT_VERIFY_ACCOUNT, 1, $this->id);
                    $this->DB->set_client_cookies($client_id, NULL);
                    print "<br>\n Unautorized Client (id: $client_id) set to VERIFY_ACCOUNT!!! <br>\n";
                    break;
                case 6: // "" Empty message
                    print "<br>\n Empty message (ref_prof_id: $ref_prof_id)!!! <br>\n";
                    break;
                case 7: // "Há solicitações demais. Tente novamente mais tarde." "Aguarde alguns minutos antes de tentar novamente."
                    print "<br>\n Há solicitações demais. Tente novamente mais tarde. (ref_prof_id: $ref_prof_id)!!! <br>\n";
                    //$result = $this->DB->delete_daily_work_client($client_id);
                    //$this->DB->set_client_status($client_id, user_status::BLOCKED_BY_TIME);
//                    var_dump($result);
//                    print "<br>\n Unautorized Client (id: $client_id) STUDING set it to BLOCKED_BY_TIME!!! <br>\n";
                    // Alert when insta block by IP
                    // $time = $GLOBALS['sistem_config']->INCREASE_CLIENT_LAST_ACCESS;
                    // @TODO: Revisar Jose Angel
                    $proxy = $this->DB->get_client_proxy($client_id);

                    //$new_proxy = ($proxy->idProxy + rand(0, 6)) % 8 + 1;
                    $new_proxy = ($proxy->idProxy) % 8 + 1;
                    $this->DB->insert_event_to_washdog($client_id, washdog_type::SET_PROXY, 1, $this->id, "proxy set from proxy $proxy->idProxy to $new_proxy");

                    var_dump("Set Proxy ($proxy->idProxy) of client ($client_id) to proxy ($new_proxy)\n");
                    $this->DB->set_proxy_to_client($client_id, $new_proxy);

                    // $this->DB->Increase_Client_Last_Access($client_id, 1);
                    //$result = $this->DB->get_clients_by_status(user_status::BLOCKED_BY_TIME);
                    /* $result = $this->DB->get_clients_by_status(user_status::BLOCKED_BY_TIME);
                      $rows_count = $result->num_rows;
                      if ($rows_count == 100 || $rows_count == 150 || ($rows_count >= 200 && $rows_count <= 205)) {
                      $Gmail = new Gmail();
                      $Gmail->send_client_login_error("josergm86@gmail.com", "Jose!!!!!!! BLOQUEADOS 1= " . $rows_count, "Jose");
                      $Gmail->send_client_login_error("ruslan.guerra88@gmail.com", "Ruslan!!!!!!! BLOQUEADOS 1= " . $rows_count, "Ruslan");
                      } */
                    break;
                case 8: // "Esta mensagem contém conteúdo que foi bloqueado pelos nossos sistemas de segurança." 
                    $result = $this->DB->delete_daily_work_client($client_id);
                    $this->DB->insert_event_to_washdog($client_id, washdog_type::BLOCKED_BY_TIME, 1, $this->id);
                    $this->DB->set_client_status($client_id, user_status::BLOCKED_BY_TIME);
                    //var_dump($result);
                    print "<br>\n Esta mensagem contém conteúdo que foi bloqueado pelos nossos sistemas de segurança. (ref_prof_id: $ref_prof_id)!!! <br>\n";
                    break;
                case 9: // "Ocorreu um erro ao processar essa solicitação. Tente novamente mais tarde." 
                    print "<br>\n Ocorreu um erro ao processar essa solicitação. Tente novamente mais tarde. (ref_prof_id: $ref_prof_id)!!! <br>\n";
                    break;
                case 10:
                    print "<br> Empty array in POST </br>";
                    $proxy = $this->DB->get_client_proxy($client_id);

                    $new_proxy = ($proxy->idProxy) % 8 + 1;
                    $this->DB->insert_event_to_washdog($client_id, washdog_type::SET_PROXY, 1, $this->id, "proxy set from proxy $proxy->idProxy to $new_proxy");

                    var_dump("Set Proxy ($proxy->idProxy) of client ($client_id) to proxy ($new_proxy)\n");
                    $this->DB->set_proxy_to_client($client_id, $new_proxy);
                    /*
                      $time = $GLOBALS['sistem_config']->INCREASE_CLIENT_LAST_ACCESS;
                      $this->DB->InsertEventToWashdog($client_id, washdog_type::BLOCKED_BY_TIME, 1, $this->id, "access incresed in $time");

                      $this->DB->Increase_Client_Last_Access($client_id, $GLOBALS['sistem_config']->INCREASE_CLIENT_LAST_ACCESS);

                      $result = $this->DB->get_clients_by_status(user_status::BLOCKED_BY_TIME);
                     */
                    break;
                case 11:
                    print "<br> se ha bloqueado. Vuelve a intentarlo</br>";
                    $result = $this->DB->delete_daily_work_client($client_id);
                    //$this->DB->set_client_cookies($client_id);                    
                    $this->DB->set_client_status($client_id, user_status::BLOCKED_BY_TIME);
                    break;
                case 12:
                    $result = $this->DB->update_reference_cursor($ref_prof_id, NULL);
                    print "<br>$ref_prof_id set to null<br>\n";
                    break;
                default:
                    print "<br>\n Client (id: $client_id) not error code found ($error)!!! <br>\n";
//                    $result = $this->DB->delete_daily_work_client($client_id);
//                    $this->DB->InsertEventToWashdog($client_id, washdog_type::BLOCKED_BY_TIME, 1, $this->id);
//                    $this->DB->set_client_status($client_id, user_status::BLOCKED_BY_TIME);                    
                    break;
            }
            var_dump($response);
            return false;
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