<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: clientController

 *

 * @author 

 */
use business\Response\Response;
use business\UserStatus;

class Client extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
        require_once config_item('business-user_status-class');
    }

    public function index() {
        echo 'ok';
        // $this->load->view('client_view');
    }

    public function client_play_tool() {                
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->Status->add_item(UserStatus::PAUSED);
        return Response::ResponseOK()->toJson();
    }

    public function client_pause_tool() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->Status->remove_item(UserStatus::PAUSED);
        return Response::ResponseOK()->toJson();
    }

    public function client_active_autolike() {        
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->setLikeFirst(TRUE);
        return Response::ResponseOK()->toJson();
    }

    public function client_unactive_autolike() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->setLikeFirst(FALSE);
        return Response::ResponseOK()->toJson();
    }

    public function client_active_total_unfollow() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->Status->add_item(UserStatus::KEEP_UNFOLLOW);
        return Response::ResponseOK()->toJson();
    }

    public function client_unactive_total_unfollow() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->Status->remove_item(UserStatus::KEEP_UNFOLLOW);
        return Response::ResponseOK()->toJson();
    }

    public function is_client() {
        if (!($this->session->user->user_id && $this->session->user->role_id == user_role::CLIENT))
            header("Location:https://doorig.com");
    }

    public function client_cancel() {
        $this->load - library("sessions_utils");
        $this->is_client();
        $datas = $this->input->post();

        echo json_encode($response);
    }

    public function insert_profile_in_white_list() {
        //$this->load-library("sessions_utils");
        //$this->is_client();
        $datas = $this->input->post();

        return Response::ResponseOK()->toJson();
    }

    public function insert_profile_in_black_list() {
        //$this->load-library("sessions_utils");
        //$this->is_client();
        $datas = $this->input->post();

        return Response::ResponseOK()->toJson();
    }

    public function delete_profile_in_white_list() {
        //$this->load-library("sessions_utils");
        //$this->is_client();
        $datas = $this->input->post();

        return Response::ResponseOK()->toJson();
    }

    public function delete_profile_in_black_list() {
        //$this->load-library("sessions_utils");
        //$this->is_client();
        $datas = $this->input->post();

        return Response::ResponseOK()->toJson();
    }
    
    public function request_checkpoint_required_code() {        
        $datas = $this->input->post();
        //1.
        $datas["device"]; //device = phone ou sms
        
        //2. call robot function
        
        
        //3. return response
        return Response::ResponseOK()->toJson();
    }
    
    public function verifify_checkpoint_required_code() {        
        $datas = $this->input->post();
        $datas["code"]; // code of 6 digits of IG
        
        //2. 
        return Response::ResponseOK()->toJson();
    }

    public function update_mark_credentials() {        
        $datas = $this->input->post();
        
        //1. forze login with IG
        $datas["insta_name"];
        $datas["insta_id"];
        $datas["password"];
        $datas["passwordrep"];
        
        //2. get mark status from forced login
        $this->load->library("InstaApiWeb/InstaClient_lib", $param, 'InstaClient_lib');
        
        //3. save mark and status in DB using client_id as follow:
        $client_id = unserialize($this->session->userdata('client_module'))->Id;

        //4. return response
        return Response::ResponseOK()->toJson();
    }

}
