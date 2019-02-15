<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Response\Response;
//use business\Response\ResponseLoginToken;
//use business\Client;
//use business\Node;
//use business\ErrorCodes;
//use business\ClientStatus;

class Welcome extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        require_once config_item('business-response-class');
    }


    public function index() {
        $param["lateral_menu"] = $this->load->view('lateral_menu','', TRUE);
        $param["modals"] = $this->load->view('modals','', TRUE);
        $this->load->view('visibility_view', $param);
    }
    
    public function client() {
        $param["lateral_menu"] = $this->load->view('lateral_menu','', TRUE);
        $this->load->view('client_view', $param);
    }
    
    
    //TODO  Alberto:  poner en las clases controladoras que te de la gana
    //---------------HOME FUNCTIONS-----------------------------
    public function contract_visibility_steep_1() { //setting proper profile
        $datas = $this->input->post();
        $datas["login_profile"];
        $datas["password"];
        $datas["passwordrep"];        
        return Response::ResponseOK()->toJson();        
    }
    
    public function contract_visibility_steep_2() { //setting plane
        $datas = $this->input->post();
        $datas["plane"];  //midle, fast, very_fast        
        return Response::ResponseOK()->toJson();        
    }
    
    public function contract_visibility_steep_3() { //ending contract module
        //conferir no banco de dados se pelo menos inseriu um RP
        //SESSION["contrated"]=true;
        return Response::ResponseOK()->toJson();        
    }    
    
    
    
    
    //---------------CLIENTS FUNCTIONS-----------------------------
	public function insert_reference_profile(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function insert_geolocation(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function insert_hastag(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
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
	
	public function delete_reference_profile(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function delete_geolocation(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
	}
	
	public function delete_hastag(){
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
	
	public function client_play_tool(){
            $this->load-library("sessions_utils");
            $this->is_client();
            $datas = $this->input->post();

            echo json_encode($response);
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
	
	public function is_client(){
            if(!($this->session->user->user_id && $this->session->user->role_id==user_role::CLIENT))
                header("Location:https://doorig.com");
	}
	
	//---------------SECUNDARY FUNCTIONS-----------------------------
    
    
    
    
}
