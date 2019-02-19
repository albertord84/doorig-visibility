<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: clientsController

 *

 * @author 

 */
class GeoProfiles extends CI_Controller {
  

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-response-class');        
    }
    
    public function insert_hastag(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            return Response::ResponseOK()->toJson();
	}
    
    public function delete_hastag(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            return Response::ResponseOK()->toJson();
	}
    
}
