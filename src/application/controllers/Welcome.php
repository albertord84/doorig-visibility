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

    public function index_tmp($client = 1) {
        $Client = new Client($client);
        $Client->load_mark_info_data();
        var_dump($Client);
        return;//die;

        $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
        $param["painel_person_profile"] = $this->load->view('client_views/person_profile_painel', '', TRUE);
        $param["painel_statistics"] = $this->load->view('client_views/statistics_painel', '', TRUE);
        $param["painel_reference_profiles"] = $this->load->view('client_views/reference_profiles_painel', '', TRUE);
        $param["configuration"] = $this->load->view('client_views/configuration_painel', '', TRUE);
        $param["black_and_white_list"] = $this->load->view('client_views/black_and_white_list_painel', '', TRUE);
        //        $this->load->view('visibility_home', $param);
        $this->load->view('visibility_client', $param);
    }

    public function aa() {
        var_dump(unserialize($this->session->userdata('client')));
    }

    public function index($access_token, $client_id) {
        //1. check correct access_token or active session
        if ($this->session->userdata('client_module')) {
            $ClientModule = unserialize($this->session->userdata('client_module'));
        } else
            $ClientModule = $this->check_access_token($access_token, $client_id);
        if ($ClientModule) {
            //2. set $ClientModule in session and lateral_menu and modals views
            
            //2.1. TODO: call by Guzzle a funtion in dashboard for get the client informations to be displyed in all views
            $ClientDatas = (object) array(
                        "ClientId" => $ClientModule->Id,
                        "ClientEmail" => "josergm86@gmail.com",
                        "ClientPhotoUrl" => $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL . "../assets/profile_images/" . $ClientModule->Id . ".jpg",
            );
            $this->session->set_userdata('client_datas', serialize($ClientDatas));
            
            $this->session->set_userdata('client_module', serialize($ClientModule));
            $param["client_datas"] = json_encode($ClientDatas);
            $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
            $param["modals"] = $this->load->view('modals', '', TRUE);
            if ($ClientModule->Active) {
                //3. load Mark datas from DB and set in session 
                $Client = new Client($ClientModule->Id);
                $Client->load_data();
                $Client->ReferenceProfiles->load_data();
                $Client->load_daily_report_data();
                $Client->load_black_and_white_list_data();
                $this->session->set_userdata('client', serialize($Client));
                //4. load datas as params to be used in visibility_client view                
                $tmpClient = $Client;
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
                $param["configuration"] = $this->load->view('client_views/configuration_painel', '', TRUE);
                $param["black_and_white_list"] = $this->load->view('client_views/black_and_white_list_painel', '', TRUE);
                $this->load->view('visibility_client', $param);
            } else {
                $this->load->view('visibility_home', $param);
            }
        } else {
            header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);
        }
    }

    public function log_out() {
        //$this->load->model('class/user_model');
        //$this->user_model->insert_washdog($this->session->userdata('id'), 'CLOSING SESSION');
        $this->session->sess_destroy();
        header('Location: ' . $GLOBALS['sistem_config']->BASE_SITE_URL);
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

}
