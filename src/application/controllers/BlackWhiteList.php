<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: clientsController

 *

 * @author 

 */
class BlackWhiteList extends CI_Controller {
  

    public function __construct() {
        parent::__construct();
        
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');

        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('black_and_white_list_model', 'blackWhiteList');
    }
    
    public function index() {
        echo 'ok';
       // $this->load->view('personProfiles_view');
      
    }
    
        public function combogrid() {



        $items = $this->blackWhiteList->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {

        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->blackWhiteList->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

       // $result["total"] = $this->db->count_all('blackWhiteList');



        echo json_encode($result);
    }
    
	public function insert_profile_in_white_list(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function insert_profile_in_black_list(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
    public function delete_profile_in_white_list(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function delete_profile_in_black_list(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
}
