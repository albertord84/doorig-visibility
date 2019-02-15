<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Response\Response;
use business\Response\ResponseLoginToken;

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();

        require_once config_item('business-response-class');
        require_once config_item('business-response-login-token-class');
    }

    public function index($access_token, $client_id) {
        if ($this->check_access_token($access_token, $client_id)) {
            $param["lateral_menu"] = $this->load->view('lateral_menu', '', TRUE);
            $this->load->view('client_view', $param);
        }
        //header("Location:" . $GLOBALS['sistem_config']->BASE_SITE_URL);
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
            if ($StatusCode == 200 && $content->code == 0) {
                //3. Response
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    //TODO  Alberto:  poner en las clases controladoras que te de la gana
    //---------------PRINCIPALS FUNCTIONS-----------------------------
    public function insert_reference_profile() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function insert_geolocation() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function insert_hastag() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function insert_profile_in_white_list() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function insert_profile_in_black_list() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function delete_reference_profile() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function delete_geolocation() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function delete_hastag() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function delete_profile_in_white_list() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function delete_profile_in_black_list() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function client_play_tool() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function client_pause_tool() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function client_active_autolike() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function client_unactive_autolike() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function client_active_total_unfollow() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function client_unactive_total_unfollow() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();
        //1. cONFERIR QUE CLIENTE ESTA ACTIVOS Y QUE NOT TIENE DFGDFGB
        echo json_encode($response);
    }

    public function is_client() {
        if (!($this->session->user->user_id && $this->session->user->role_id == user_role::CLIENT))
            header("Location:https://doorig.com");
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
