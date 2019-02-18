<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: clientsController

 *

 * @author 

 */
class PersonProfiles extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
    }

    public function index() {
        echo 'ok';
        // $this->load->view('personProfiles_view');
    }

    public function insert_reference_profile() {
        $datas = $this->input->post();
    }

    public function delete_reference_profile() {
        $datas = $this->input->post();
        
        
        $datas['reference_profile_id'] = 24307;
        
        try {
            
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
        
        Response::ResponseOK()->toJson();
    }

}
