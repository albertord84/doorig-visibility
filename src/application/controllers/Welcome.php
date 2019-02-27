<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\Response\Response;
use business\Response\ResponseLoginToken;
use business\InstaCommands;

//use business\Client;
//use business\Node;
//use business\ErrorCodes;
//use business\ClientStatus;

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-login-token-class');
        require_once config_item('business-insta_commands-class');
    }

    public function index_tpm($client_id) { //teste
        $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
        $param["modals"] = $this->load->view('modals', '', TRUE);
        $Client = new Client($client_id);
        $Client->load_data();
        $this->session->set_userdata('client', serialize($Client));
        $param["client"] = $Client; 
        //        $this->load->view('visibility_home', $param);
        $this->load->view('visibility_client', $param);
    }

    public function index($access_token, $client_id) {
        $ClientModule = $this->check_access_token($access_token, $client_id);
        if ($ClientModule) {
            $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
            $param["modals"] = $this->load->view('modals', '', TRUE);
            if ($ClientModule->Active) {
                $Client = new Client($ClientModule->Id);
                $Client->load_data();

                $param["client"] = $Client;
                $Client->ReferenceProfiles->load();
                $this->session->set_userdata('client', serialize($Client));
                $this->load->view('visibility_client', $param);
            } else {
                $this->session->set_userdata('client_module', serialize($ClientModule));
                $this->load->view('visibility_home', $param);
            }
        } else {
//            header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);
        }
    }

    //---------------HOME FUNCTIONS-----------------------------
    public function contract_visibility_steep_1() { //setting proper profile
        $datas = $this->input->post();
        $datas["login_profile"];
        $datas["password"];
        $datas["passwordrep"];
        return Response::ResponseOK()->toJson();
    }

    public function contract_visibility_steep_2() { //setting plane
        $datas = $this->input->post();
        $datas["plane"];  //midle, fast, very_fast        
        return Response::ResponseOK()->toJson();
    }

    public function contract_visibility_steep_3() { //ending contract module
        //conferir no banco de dados se pelo menos inseriu um RP
        //SESSION["contrated"]=true;
        return Response::ResponseOK()->toJson();
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

    public function get_person_profile_datas() {
        $profile_name = (string) $this->input->post()["profile"];
        $profile_name = "josergm86";
        $result = InstaCommands::get_profile_public_data($profile_name);
        echo \GuzzleHttp\json_encode($result);
    }

}
