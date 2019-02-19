<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Response\Response;
use business\Response\ResponseLoginToken;

//use business\Client;
//use business\Node;
//use business\ErrorCodes;
//use business\ClientStatus;

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        require_once config_item('business-response-class');
        require_once config_item('business-response-login-token-class');
    }

    public function index() { //teste
        $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
        $param["modals"] = $this->load->view('modals', '', TRUE);
        $this->load->view('visibility_client', $param);
    }

    public function index_org($access_token, $client_id) {
        if ($this->check_access_token($access_token, $client_id)) {            
//            $Client = new Client();
//            $Client->load_data_by_doorig_client_id($content->ClientId);
//            $Client->load_modules(TRUE);
            
//            $this->session->set_userdata('client', serialize($Client)); 
//            $param["client"] = $Client; 
            
            $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
            $param["modals"] = $this->load->view('modals', '', TRUE);
            ///////////////////
            $_modulo_contratado = true;
            ///////////////////
            if(!$_modulo_contratado){
                $this->load->view('visibility_home', $param);
            }else{
                $this->load->view('visibility_client', $param);
            }
        } else {
            header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);                
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
                header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);
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
            if ($StatusCode == 200 && is_set($content->code) && $content->code == 0) {
                //3. Response
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        return FALSE;
    }


}
