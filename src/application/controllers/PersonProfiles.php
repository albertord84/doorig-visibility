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

        $this->load->model('reference_profiles_model', 'personProfiles');
    }

    public function index() {
        echo 'ok';
        // $this->load->view('personProfiles_view');
    }

    public function insert_reference_profile() {
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

}
