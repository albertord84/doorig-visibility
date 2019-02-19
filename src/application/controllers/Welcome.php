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

    public function index() {
        $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
        $param["modals"] = $this->load->view('modals', '', TRUE);
        $this->load->view('visibility_client', $param);
    }

    public function index1($access_token, $client_id) {
        if ($this->check_access_token($access_token, $client_id)) {
            $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
            $param["modals"] = $this->load->view('modals', '', TRUE);
            $this->load->view('visibility_home', $param);
        }
        //header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);
    }

    public function client() {
        $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
        $param["modals"] = $this->load->view('modals', '', TRUE);
        $this->load->view('visibility_client', $param);
    }

    private function check_access_token($access_token, $client_id) {
        try {
            $url = $GLOBALS['sistem_config']->DASHBOARD_SITE_URL . "/welcome/confirm_access_token";
            $GuzClient = new \GuzzleHttp\Client();
            $response = $GuzClient->post($url, [
                GuzzleHttp\RequestOptions::JSON => ['confirm_access_token' => $access_token],
                GuzzleHttp\RequestOptions::JSON => ['client_id' => $client_id],
                GuzzleHttp\RequestOptions::JSON => ['module_id' => $GLOBALS['sistem_config']->module_id]
            ]);

            $StatusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();
            $content = json_decode($content);
            //var_dump($content);
            if ($StatusCode == 200 && is_set($content->code) && $content->code == 0) {
                //3. Response
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        return FALSE;
    }

    //TODO  Alberto:  poner en las clases controladoras que te de la gana
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
            $client_id = $this->session->userdata('client_id');


            $datas["module_id"] = 1;
            $client_id = 1;


            //1. llamar a la funcion generate_access_token que esta en el dasboard por Guzle
            $url = $GLOBALS['sistem_config']->DASHBOARD_SITE_URL . "/welcome/generate_access_token";
            $GuzClient = new \GuzzleHttp\Client();
            $response = $GuzClient->post($url, [
                GuzzleHttp\RequestOptions::JSON => ['client_id' => $client_id],
                GuzzleHttp\RequestOptions::JSON => ['module_id' => $datas["module_id"]]
            ]);

            $StatusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();
            $content = json_decode($content);
            if ($StatusCode == 200 && $content->code == 0) {
                //3. Response
                $Response = new ResponseLoginToken($content->LoginToken);
                return $Response->toJson();
            } else {
                header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);
            }
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
    }

}
