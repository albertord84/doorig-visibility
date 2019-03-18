<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\MarkInfo;
use business\ClientStatusList;
use business\Response\Response;
use business\Response\ResponseLoginToken;
use business\InstaCommands;
use business\UserStatus;
use business\ErrorCodes;

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-login-token-class');
        require_once config_item('business-insta_commands-class');
        require_once config_item('business-user_status-class');
        require_once config_item('business-mark_info-class');
        require_once config_item('business-error-codes-class');
    }

    // deprecated
    public function a() {
        $param["lateral_menu"] = $this->request_lateral_menu(1);
        $this->load->view('visibility_client', $param);
    }

    // deprecated
    public function index_tmp($client = 1) {
        //2. set $ClientModule in session and lateral_menu and modals views
        //$this->session->set_userdata('client_module', serialize($ClientModule));
        $param["lateral_menu"] = $this->request_lateral_menu($client);
        $param["modals"] = $this->request_modals();

        //3. load Mark datas from DB and set in session 
        $Client = new Client($client);
        $Client->load_mark_info_data();
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
        $Status_list = $Client->MarkInfo->Status->ClientStatusList;

        $param["painel_verify_account"] = null;
        if ($Client->MarkInfo->Status->hasStatus(UserStatus::VERIFY_ACCOUNT))
            $param["painel_verify_account"] = $this->load->view('client_views/verify_account_painel', '', TRUE);

        $param["painel_blocked_by_payment"] = null;
        if ($Client->MarkInfo->Status->hasStatus(UserStatus::BLOCKED_BY_PAYMENT))
            $param["painel_blocked_by_payment"] = $this->load->view('client_views/block_by_payment_painel', '', TRUE);

        $param["painel_pending"] = null;
        if ($Client->MarkInfo->Status->hasStatus(UserStatus::PENDING))
            $param["painel_pending"] = $this->load->view('client_views/pendent_by_payment_painel', '', TRUE);

        $param["painel_blocked_by_insta"] = null;
        if ($Client->MarkInfo->Status->hasStatus(UserStatus::BLOCKED_BY_INSTA))
            $param["painel_blocked_by_insta"] = $this->load->view('client_views/block_by_insta_painel', '', TRUE);

        //6. set painel_person_profile as params to be display in visibility_client view
        $param["painel_person_profile"] = $this->load->view('client_views/person_profile_painel', '', TRUE);
        $param["painel_statistics"] = $this->load->view('client_views/statistics_painel', '', TRUE);
        $param["painel_reference_profiles"] = $this->load->view('client_views/reference_profiles_painel', '', TRUE);
        $param["configuration"] = $this->load->view('client_views/configuration_painel', '', TRUE);
        $param["black_and_white_list"] = $this->load->view('client_views/black_and_white_list_painel', '', TRUE);
        $this->load->view('visibility_client', $param);
    }

    public function index($access_token, $client_id) {
        //1. check correct access_token or active session
        $ClientModule = NULL;
        if ($this->session->userdata('client_module')) {
            $ClientModule = unserialize($this->session->userdata('client_module'));
        } else {
            $ClientModule = $this->check_access_token($access_token, $client_id);
        }
        if ($ClientModule) {
            //2. set $ClientModule in session and lateral_menu and modals views
            $this->session->set_userdata('client_module', serialize($ClientModule));
            $param["lateral_menu"] = $this->request_lateral_menu($ClientModule->Client->Id);
            $param["modals"] = $this->request_modals();
            if ($ClientModule->Active) {
                //3. load Mark datas from DB and set in session 
                $Client = new Client($ClientModule->Client->Id);
                $Client->load_mark_info_data();
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
                $Status_list = $Client->MarkInfo->Status->ClientStatusList;

                $param["painel_verify_account"] = null;
                if ($Client->MarkInfo->Status->hasStatus(UserStatus::VERIFY_ACCOUNT))
                    $param["painel_verify_account"] = $this->load->view('client_views/verify_account_painel', '', TRUE);

                $param["painel_blocked_by_payment"] = null;
                if ($Client->MarkInfo->Status->hasStatus(UserStatus::BLOCKED_BY_PAYMENT))
                    $param["painel_blocked_by_payment"] = $this->load->view('client_views/block_by_payment_painel', '', TRUE);

                $param["painel_pending"] = null;
                if ($Client->MarkInfo->Status->hasStatus(UserStatus::PENDING))
                    $param["painel_pending"] = $this->load->view('client_views/pendent_by_payment_painel', '', TRUE);

                $param["painel_blocked_by_insta"] = null;
                if ($Client->MarkInfo->Status->hasStatus(UserStatus::BLOCKED_BY_INSTA))
                    $param["painel_blocked_by_insta"] = $this->load->view('client_views/block_by_insta_painel', array("mark_login"=>$Client->MarkInfo->login), TRUE);

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
        //$this->user_model->insert_washdog($this->session->userdata('id'), 'CLOSING SESSION');
        $this->session->sess_destroy();
        header('Location: ' . $GLOBALS['sistem_config']->BASE_SITE_URL);
    }

    //---------------HOME FUNCTIONS-----------------------------
    public function contract_visibility_steep_1() { //setting proper profile
        $datas = $this->input->post();

        //1. check if exist this profile in IG
        try {

            //2. save mark in DB using client_id as follow:
            $client_id = unserialize($this->session->userdata('client_module'))->Client->Id;
            $Client = new Client($client_id);
            $Client->save(
                    $client_id,
                    $plane_id = null,
                    $pay_id = null,
                    $proxy_id = null,
                    $login = $datas["insta_name"],
                    $pass = $datas["password"],
                    $insta_id = $datas["insta_id"],
                    $init_date = time(),
                    $end_date = null,
                    $cookies = null,
                    $observation = null,
                    $purchase_counter = 1,
                    $last_access = null,
                    $insta_followers_ini = null,
                    $insta_following = null
            );

            //3. return response
            return Response::ResponseOK()->toJson();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function contract_visibility_steep_2() { //setting plane
        try {
            $client_id = unserialize($this->session->userdata('client_module'))->Client->Id;
            //1. set plane in la DB
            $datas = $this->input->post();
            $plane_id = 1;
            $plane_id = $datas["plane"] == 'midle' ? 1 : $plane_id;
            $plane_id = $datas["plane"] == 'fast' ? 2 : $plane_id;
            $plane_id = $datas["plane"] == 'very_fast' ? 3 : $plane_id;
            $client_id = unserialize($this->session->userdata('client_module'))->Client->Id;

            Client::update($client_id, $plane_id);

            //2. Contratar modulo
            $this->contrated_module();

            //3. return response
            return Response::ResponseOK()->toJson();
        } catch (\Exception $exc) {
            return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
        }
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
            $client_id = unserialize($this->session->userdata('client'))->Client->Id;

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

    public function request_lateral_menu($client_id) {
        $GuzClient = new \GuzzleHttp\Client();
        $url = $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL . "Clients/get_lateral_menu/";
        $response = $GuzClient->post($url, [
            GuzzleHttp\RequestOptions::FORM_PARAMS => [
                'client_id' => $client_id
        ]]);
        $StatusCode = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        if ($StatusCode == 200) {
            return $content;
        }
    }

    public function request_modals() {
        $GuzClient = new \GuzzleHttp\Client();
        $url = $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL . "Clients/get_modals";
        $response = $GuzClient->get($url);
        $StatusCode = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        if ($StatusCode == 200) {
            return $content;
        }
    }

    private function contrated_module() { //is called in onclick event of FINALIZAR button
        $client_id = unserialize($this->session->userdata('client_module'))->Client->Id;
        $Client = new Client($client_id);
        $Client->load_mark_info_data();
        //1. force login with Intagram
        //
        //
        //$login_response = $Client->do_login();
        //
        //
        //
        //2. set $insta_followers_ini $insta_following
        $profile_public_data = InstaCommands::get_profile_public_data($Client->MarkInfo->login);
        Client::update(
                $client_id, null, null, null, null, null, null, null, null, null, null, null, null,
                $profile_public_data->followers,
                $profile_public_data->following
        );
        $Client->MarkInfo->Status->add_item(UserStatus::ACTIVE);
        //$Client->MarkInfo->Status->add_item(UserStatus::PAUSED, FALSE);
        //2. set visibility module as ACTIVE in doorig_dashboard_db.clients_modules using Guzzle
        $ClientModule = unserialize($this->session->userdata('client_module'));
        $this->dashboard_set_contrated_module($ClientModule);
        //3. set contrated module active 
        $ClientModule->Active = true;
        $this->session->set_userdata('client_module', serialize($ClientModule));
        //4. Save client in session
        $this->session->set_userdata('client', serialize($Client));
    }

    private function dashboard_set_contrated_module(\stdClass $ClientModule) {
        $url = $GLOBALS['sistem_config']->DASHBOARD_SITE_URL . "clients/set_contrated_module";
        $GuzClient = new \GuzzleHttp\Client();
        $response = $GuzClient->post($url, [
            GuzzleHttp\RequestOptions::FORM_PARAMS => [
                'client_id' => $ClientModule->client_id,
                'module_id' => $ClientModule->module_id
        ]]);
        $StatusCode = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content = json_decode($content);
        if ($StatusCode == 200 && $content->code == 0) {
            return TRUE;
        };
        throw ErrorCodes::getException(ErrorCodes::DASHBOARD_CONNECTION_ERROR);
    }

}
