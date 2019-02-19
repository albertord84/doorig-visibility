<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: clientController

 *

 * @author 

 */
class Client extends CI_Controller {
  

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
        
        
        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('clients_model', 'client');
    }
    
    public function index() {
        echo 'ok';
       // $this->load->view('client_view');
      
    }
    
        public function combogrid() {



        $items = $this->client->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {

        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->client->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

       // $result["total"] = $this->db->count_all('client');



        echo json_encode($result);
    }
    
    	public function client_pause_tool(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function client_active_autolike(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function client_unactive_autolike(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function client_active_total_unfollow(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function client_unactive_total_unfollow(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();
            //1. cONFERIR QUE CLIENTE ESTA ACTIVOS Y QUE NOT TIENE DFGDFGB
            echo json_encode($response);
	}
	
 /* public function client_cancel(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	} */
    
	public function is_client(){
            if(!($this->session->user->user_id && $this->session->user->role_id==user_role::CLIENT))
                header("Location:https://dooring-visibility.com");
	}
    
}
