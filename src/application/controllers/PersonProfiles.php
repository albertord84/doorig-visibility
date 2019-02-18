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

        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('reference_profiles_model', 'personProfiles');
    }
    
    public function index() {
        echo 'ok';
       // $this->load->view('personProfiles_view');
      
    }
    
        public function combogrid() {



        $items = $this->personProfiles->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {

        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->personProfiles->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

       // $result["total"] = $this->db->count_all('personProfiles');



        echo json_encode($result);
    }
    
    public function insert_reference_profile(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
    
    public function delete_reference_profile(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
    
}
