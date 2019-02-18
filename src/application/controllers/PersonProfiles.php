<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use business\{
    Client as BusinessClient,
    ReferenceProfile,
    Response\Response,
    Response\ResponseReferenceProfiles
};

/**

 * Desarrollo del controlador: clientsController

 *

 * @author 

 */
class PersonProfiles extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-ref_profile-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-reference-profiles-class');
    }

    public function index() {
        echo 'ok';
        // $this->load->view('personProfiles_view');
    }

    public function insert_person_profile() {
        $datas = $this->input->post();
    }

    public function delete_person_profile() {
        $datas = $this->input->post();


        //$datas['reference_profile_id'] = 24307;

        try {
            $ReferenceProfile = new ReferenceProfile($datas['reference_profile_id']);
            $ReferenceProfile->remove();
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }

        Response::ResponseOK()->toJson();
    }

    public function get_person_profiles() {
        $datas = $this->input->post();

        try {
            $client_id = 1; //$this->session->userdata('client_id');

            $Client = new BusinessClient($client_id);
            $status = 1; // ACTIVE
            $type = -1;   // Person Profile
            $Client->load_insta_reference_profiles_data($status, $type);

            $Response = new ResponseReferenceProfiles($Client->ReferenceProfiles);
            return $Response->toJson();
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
    }

}
