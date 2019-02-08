<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

class Welcome extends CI_Controller {

//    public function index() {
//        $param["lateral_menu"] = $this->load->view('lateral_menu');
//        $this->load->view('visibility_view', $param);
//    }
    
    public function index() {
        $param["lateral_menu"] = $this->load->view('lateral_menu');
        $this->load->view('client_view', $param);
    }
    
    
    
    
}
