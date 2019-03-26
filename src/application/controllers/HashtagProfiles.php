<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use business\{
    Client as BusinessClient,
    ReferenceProfile,
    Response\Response,
    Response\ResponseReferenceProfiles,
    Response\ResponseInsertedObject
};

class HashtagProfiles extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-ref_profile-class');
        require_once config_item('business-daily_work-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-reference-profiles-class');
        require_once config_item('business-response_inserted_object-class');
    }

    public function index() {
        echo 'ok';
        // $this->load->view('personProfiles_view');
    }

    public function insert() {

        $datas = $this->input->post();

        $client_id = unserialize($this->session->userdata('client'))->Id;

        try {
            $id = ReferenceProfile::save($datas['insta_id'], $datas['insta_name'], $client_id, 2);

            $DailyWork = new \business\worker\DailyWork();
            $DailyWork->insert($id, 50, 50);
            
            $response = new ResponseInsertedObject($id);
            $response->toJson();
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
    }

    public function delete() {
        $datas = $this->input->post();
        try {
            $ReferenceProfile = new ReferenceProfile($datas['reference_profile_id']);
            $ReferenceProfile->remove();

            $DailyWork = new business\worker\DailyWork();
            $DailyWork->delete_dailywork_by_reference_profile($ReferenceProfile->Id);
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }

        Response::ResponseOK()->toJson();
    }

    public function get() {
        $datas = $this->input->post();

        try {
            $client_id = $this->session->userdata('client_id');
            //$client_id = 1;

            $Client = new BusinessClient($client_id);
            $status = 1; // ACTIVE
            $type = 2;   // Hashtag Profile
            $Client->load_insta_reference_profiles_data($status, $type);

            $Response = new ResponseReferenceProfiles($Client->ReferenceProfiles);
            return $Response->toJson();
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
    }

}
