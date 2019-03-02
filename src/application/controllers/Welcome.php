<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\Response\Response;
use business\Response\ResponseLoginToken;
use business\InstaCommands;
use business\UserStatus;

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-login-token-class');
        require_once config_item('business-insta_commands-class');
        require_once config_item('business-user_status-class');
    }

    public function aaa($client = 1) {
        $datas = unserialize($this->session->userdata('client'));
        unset($datas->Pass);
        var_dump ((object_to_array($datas)));
    }
    
    public function index_tmp($client = 1) {
        $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
        $param["painel_person_profile"] = $this->load->view('client_views/person_profile_painel', '', TRUE);
        $param["painel_reference_profiles"] = $this->load->view('client_views/reference_profiles_painel', '', TRUE);
        $this->load->view('visibility_home', $param);
        //$this->load->view('visibility_client', $param);
    }

    public function index($access_token, $client_id) {
        //1. check correct access_token or active session
        if($this->session->userdata('client_module')){
            $ClientModule = unserialize($this->session->userdata('client_module'));            
        }
        else
            $ClientModule = $this->check_access_token($access_token, $client_id);            
        if ($ClientModule){
            //2. set $ClientModule in session and lateral_menu and modals views
            $this->session->set_userdata('client_module', serialize($ClientModule));            
            $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
            $param["modals"] = $this->load->view('modals', '', TRUE);
            $param["client_datas"] = $this->prepare_client_datas_to_display($ClientModule, $Client);
            if ($ClientModule->Active) {
                //3. load Mark datas from DB and set in session 
                $Client = new Client($ClientModule->Id);
                $Client->load_data();
                $Client->ReferenceProfiles->load_data();
                $this->session->set_userdata('client', serialize($Client));
                //4. load datas as params to be used in visibility_client view                
                /*$datas["person_profile"] = json_encode($this->prepare_person_profile_datas_to_display($Client));
                $datas["reference_profile"] = $this->prepare_reference_profile_datas_to_display($Client);
                $datas["black_white_list"] = $this->prepare_black_white_list_datas_to_display($Client);
                $datas["daily_report"] = $this->prepare_daily_report_to_display($Client);
                $datas["statistics"] = $this->prepare_statistics_to_display($Client);
                $param["person_profile_datas"] = json_encode($datas);*/
                $tmpClient = unserialize($this->session->userdata('client'));
                unset($tmpClient->Pass);
                $param["person_profile_datas"] = json_encode(object_to_array($tmpClient));
                
                //5. load painel_by_status as params to be display in visibility_client view
                $param["painel_by_status"] = NULL;
                switch ($Client->Status) {
                    case UserStatus::VERIFY_ACCOUNT:
                        $param["painel_by_status"] = $this->load->view('client_views/verify_account_painel', '', TRUE);
                        break;
                    case UserStatus::BLOCKED_BY_PAYMENT:
                        $param["painel_by_status"] = $this->load->view('client_views/block_by_payment_painel', '', TRUE);
                        break;
                    case UserStatus::BLOCKED_BY_INSTA:
                        $param["painel_by_status"] = $this->load->view('client_views/block_by_insta_painel', '', TRUE);
                        break;
                    case UserStatus::PENDING:
                        $param["painel_by_status"] = $this->load->view('client_views/pendent_by_payment_painel', '', TRUE);
                        break;                    
                    default:
                        break;
                }
                //6. set painel_person_profile as params to be display in visibility_client view
                $param["painel_person_profile"] = $this->load->view('client_views/person_profile_painel', '', TRUE);
                $param["painel_statistics"] = $this->load->view('client_views/statistics_painel', '', TRUE);
                $param["painel_reference_profiles"] = $this->load->view('client_views/reference_profiles_painel', '', TRUE);
                $this->load->view('visibility_client', $param);
            } else {
                $this->load->view('visibility_home', $param);
            }
        } else {
            header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);
        }
    }

    //---------------HOME FUNCTIONS-----------------------------
    public function contract_visibility_steep_1() { //setting proper profile
        $datas = $this->input->post();
        //1. check if exist this profile in IG
        $datas["insta_name"];
        $datas["insta_id"];
        $datas["password"];
        $datas["passwordrep"];
        //2. save mark in DB using client_id as follow:
        $client_id = unserialize($this->session->userdata('client_module'))->Id;

        //3. return response
        return Response::ResponseOK()->toJson();
    }

    public function contract_visibility_steep_2() { //setting plane
        $client_id = unserialize($this->session->userdata('client_module'))->Id;
        //1. set plane in la DB
        $datas = $this->input->post();
        $datas["plane"];  //midle, fast, very_fast
        //2. set visibility module as ACTIVE in doorig_dashboard_db.clients_modules using Guzzle
        
        //3. return response
        return Response::ResponseOK()->toJson();
    }

    public function contrated_module() { //is called in onclick event of FINALIZAR button
        $client_id = unserialize($this->session->userdata('client_module'))->Id;
        //1. force login with Intagram
        //2. set status of profile in doorig_visibility_db
        //(ACTIVE, BLOQ_PASS, VERIFY_ACCOUNT)
        //3. redirect to index
        header("Location:" . base_url() . "index.php/welcome/index/ok/" . $client_id);
    }

    public function get_person_profile_datas($profile_name) {
        $result = InstaCommands::get_profile_public_data($profile_name);
        echo json_encode($result);
    }

    //---------------SECUNDARY FUNCTIONS-----------------------------
    public function call_to_generate_access_token() {
        //esta funcion deve estar en todfos los módulos
        $datas = $this->input->post();
        try {
            $client_id = unserialize($this->session->userdata('client'))->Id;

            //1. llamar a la funcion generate_access_token que esta en el dasboard por Guzle
            $url = $GLOBALS['sistem_config']->DASHBOARD_SITE_URL . "/welcome/generate_access_token";
            $GuzClient = new \GuzzleHttp\Client();
            $response = $GuzClient->post($url, [
                GuzzleHttp\RequestOptions::FORM_PARAMS => [
                    'client_id' => $client_id,
                    'module_id' => $datas["module_id"]
            ]]);
            $StatusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();
            $content = json_decode($content);
            if ($StatusCode == 200 && $content->code == 0) {
                //3. Response
                $Response = new ResponseLoginToken($content->LoginToken, "", $client_id);
                return $Response->toJson();
            } else {
//                header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);
            }
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
    }

    private function check_access_token($access_token, $client_id) {
        try {
            $url = $GLOBALS['sistem_config']->DASHBOARD_SITE_URL . "welcome/confirm_access_token";
            $GuzClient = new \GuzzleHttp\Client();
            $response = $GuzClient->post($url, [
                GuzzleHttp\RequestOptions::FORM_PARAMS => [
                    'module_id' => $GLOBALS['sistem_config']->module_id,
                    'client_id' => $client_id,
                    'access_token' => $access_token
                ]
            ]);
            $StatusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();
            $content = json_decode($content);
            if ($StatusCode == 200 && isset($content->code) && $content->code == 0) {
                //3. Response
                return $content->ClientModule;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        return FALSE;
    }

    private function prepare_client_datas_to_display($ClientModule) {
        //1. call by Guzzle a funtion in doorig for get the client informations to be displyed in all views
        $ClientDatas = array(); //Guzzle
        $datas = array(
            "ClientId" => $ClientModule->Id,
                /* "ClientName"=>$ClientDatas->Id,
                  "ClientEmail"=>$ClientDatas->Id,
                  "ClientPhotoPath"=>$ClientDatas->Id, */
        );
        return $datas;
    }

    private function prepare_person_profile_datas_to_display($Client) {
        $ig_datas = InstaCommands::get_profile_public_data($Client->Login);
        $datas = array(
            "PersonProfileId" => $Client->Id,
            "Name" => $Client->Name,
            "Login" => $Client->Login,
            "Status" => $Client->Status,
//            ""=>$Client->$ig_datas,
//            ""=>$Client->$ig_datas,
//            ""=>$Client->$ig_datas,
//            ""=>$Client->$ig_datas,
//            ""=>$Client->$ig_datas,
        );
        return $datas;
    }

    private function prepare_reference_profile_datas_to_display($Client) {
        $datas = array();
        $a = $Client->ReferenceProfiles;
        $b = $Client->ReferenceProfiles->ReferenceProfiles;
        foreach ($Client->ReferenceProfiles->ReferenceProfiles as $rp) {
            array_push(
                    $datas,
                    array(
                        'Id' => $rp->Id,
                        'Insta_name' => $rp->Insta_name,
                        'Insta_id' => $rp->Insta_id,
                        'Status_id' => $rp->Status_id,
                        'Follows' => $rp->Follows,
                        'Type' => $rp->Type,
            ));
        }
        return $datas;
    }

    private function prepare_black_white_list_datas_to_display($Client) {
        $datas = array();
        foreach ($Client->ReferenceProfiles->ReferenceProfiles as $rp) {
//            array_push(
//                $datas['reference_profile'],
//                array(
//                    'Id'=>$rp->Id,
//                    'Insta_name'=>$rp->Insta_name,
//                    'Insta_id'=>$rp->Insta_id,
//                    'Status_id'=>$rp->Status_id,
//                    'Follows'=>$rp->Follows,
//                    'Type'=>$rp->Type,
//                ));
        }
        return $datas;
    }

    private function prepare_daily_report_to_display($Client) {
        $datas = array(
        );
        return $datas;
    }

    private function prepare_statistics_to_display($Client) {
        $datas = array(
            "ReferenceProfilesUsed" => $Client->Id,
            "ProfilesByReferenceProfilesFollowed" => $Client->Id,
            "GeolocationUsed" => $Client->Id,
            "ProfilesByGeolocationFollowed" => $Client->Id,
            "HastagsUsed" => $Client->Id,
            "ProfilesByHastagsFollowed" => $Client->Id,
        );
        return $datas;
    }

}
