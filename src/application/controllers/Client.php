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
        $Client->MarkInfo->Status->remove_item(UserStatus::PAUSED);
        $this->session->set_userdata('client', serialize($Client));
        return Response::ResponseOK()->toJson();
    }

    public function client_pause_tool() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->Status->add_item(UserStatus::PAUSED);
        $this->session->set_userdata('client', serialize($Client));
        return Response::ResponseOK()->toJson();
    }

    public function client_active_autolike() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->setLikeFirst(TRUE);
        $this->session->set_userdata('client', serialize($Client));
        return Response::ResponseOK()->toJson();
    }

    public function client_unactive_autolike() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->setLikeFirst(FALSE);
        $this->session->set_userdata('client', serialize($Client));
        return Response::ResponseOK()->toJson();
    }

    public function client_active_total_unfollow() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->Status->add_item(UserStatus::KEEP_UNFOLLOW);
        $this->session->set_userdata('client', serialize($Client));
        return Response::ResponseOK()->toJson();
    }

    public function client_unactive_total_unfollow() {
        $Client = unserialize($this->session->userdata('client'));
        $Client->MarkInfo->Status->remove_item(UserStatus::KEEP_UNFOLLOW);
        $this->session->set_userdata('client', serialize($Client));
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

    public function request_checkpoint_required_code() {
        $datas = $this->input->post();

        $Client = new BusinessClient(0);
        $Client = unserialize($this->session->userdata('client'));

        //1.
        //device = email ou sms
        $choice = $datas["device"] == 'email' ? 1 : 0;

        try {
            //2. call robot function
            $login_response = new \InstaApiWeb\Response\LoginResponse();
            $login_response = $Client->checkpoint_requested($choice);

            $Response = $Client->process_login_response($login_response);

            if ($login_response && $login_response->code === 0) {
                return business\Response\Response::ResponseOK('RELOAD');
            }

            return $Response->toJson();
        } catch (Exception $exc) {
            return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
        }
    }

    public function verifify_checkpoint_required_code() {
        $datas = $this->input->post();
        //$datas["code"]; // code of 6 digits of IG
        //1. 
        $Client = new BusinessClient(0);
        $Client = unserialize($this->session->userdata('client'));

        try {
            //2. call robot function
            $login_response = new \InstaApiWeb\Response\LoginResponse();
            $login_response = $Client->make_checkpoint($datas["code"]);

            if ($login_response && $login_response->code == 0 && !$Client->MarkInfo->Status->hasStatus(UserStatus::VERIFY_ACCOUNT)) {
                $this->session->set_userdata("client", serialize($Client));
                return $login_response->toJson();
            } else {
                return Response::ResponseFAIL($login_response->message, $login_response->code)->toJson();
            }
        } catch (Exception $exc) {
            return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
        }
    }

    public function do_login() {
        $Client = new BusinessClient();
        $Client = unserialize($this->session->userdata('client'));

        try {
            //2. call robot function
            $login_response = new \InstaApiWeb\Response\LoginResponse();
            $login_response = $Client->do_login();

            if ($login_response && $login_response->code == 0) {
                return Response::ResponseOK()->toJson();
            } else {
                return Response::ResponseFAIL('Login Fail!', 1)->toJson();
            }
        } catch (\Exception $exc) {
            return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
        }
    }

    public function update_mark_credentials() {
        $datas = $this->input->post();

        try {
            //1. forze login with IG
            //$datas["insta_name"];
            //$datas["insta_id"];
            //$datas["password"];
            //$datas["passwordrep"];
            //2. get mark status from forced login
            $Client = new BusinessClient(0);
            $Client->MarkInfo = new \business\MarkInfo($Client);
            $Client = unserialize($this->session->userdata('client'));
            $Client->MarkInfo->login = $datas["insta_name"];
            $Client->MarkInfo->pass = $datas["password"];
            $Client->MarkInfo->insta_id = $datas["insta_id"];
            $login_response = $Client->do_login();

            if ($login_response && $login_response->code === 0) {
                //3. save mark and status in DB using client_id as follow:
                $insta_followers_ini = $insta_following = NULL;
                if ($Client->MarkInfo->insta_id != $datas["insta_id"]) {
                    $profile_info = \business\InstaCommands::get_profile_public_data($datas["insta_name"]);
                    $Client->MarkInfo->insta_followers_ini = $profile_info->followers;
                    $Client->MarkInfo->insta_following_ini = $profile_info->following;
                }
                $Client->MarkInfo->update($Client->Id, null, null, null, $datas["insta_name"], $datas["password"], $datas["insta_id"], null, null, $cookies, null, null, null, $Client->MarkInfo->insta_followers_ini, $Client->MarkInfo->insta_following_ini);

                $this->session->set_userdata('client', $Client);
            }

            return $login_response->toJson();
        } catch (\Exception $exc) {
            return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
        }
    }

}
