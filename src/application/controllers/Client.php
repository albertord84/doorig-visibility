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
use business\Client as BusinessClient;

class Client extends CI_Controller {

  public function __construct() {
    parent::__construct();
    require_once config_item('business-client-class');
    require_once config_item('business-response-class');
    require_once config_item('business-user_status-class');
    require_once config_item('thirdparty-login_response-class');
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

    $Client = unserialize($this->session->userdata('client'));

    $this->load->library('InstaApiWeb/InstaClient_lib', BusinessClient::get_gost_insta_client_lib_params(), 'InstaClient_lib');

    //1.
    //device = email ou sms
    $choice = $datas["device"] == 'email' ? 1 : 0;

    try {
      //2. call robot function
      $login_response = new \InstaApiWeb\Response\LoginResponse();
      $login_response = $this->InstaClient_lib->checkpoint_requested($Client->MarkInfo->login, $Client->MarkInfo->pass, $choice);

      if ($login_response) {
        switch ($login_response->code) {
          case 0: // Login ok
            //3. Poner el Cliente como activo, y guardar las cookies
            //
            //
            //
            //$Client->MarkInfo->Status->remove_item(UserStatus::VERIFY_ACCOUNT);
              
              
              
              
            $Client->MarkInfo->update_cookies(json_encode($login_response->Cookies));
            $this->session->set_userdata("client", serialize($Client));
            header("Location:" . base_url());

          case -1: // Check Point Required
            return Response::ResponseOK()->toJson();

          case -2: // Other exception
            return Response::ResponseFAIL($login_response->message, $login_response->code)->toJson();

          default:
            break;
        }
      }
    } catch (Exception $exc) {
      return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
    }
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
