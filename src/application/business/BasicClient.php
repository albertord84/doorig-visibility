<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace business;

/**
 * Description of SimpleClient
 *
 * @author jose
 */
class BasicClient {
  //put your code here
  
  public $Id;
  
  public $Insta_Id;
  
  public $Cookies;
  
  public $InstaClient;
  
  function __construct() {
      parent::__construct();
      
      $ci = &get_instance();
      $ci->load->model('clients_model');
      $ci->load->model('db_model');      
  }
    
  
     /**
     * Get client data
     * @param int $client_id
     * @return DataSet  
     */
    public function load_data(int $id) {
      parent::load_data($id);
      
      $ci = &get_instance();
      $data = $ci->clients_model->get_by_id($id);      
      $this->fill_data($data);
      
      $ci->load->library("InstaApiWeb/InstaClient_lib", array("insta_id"=>$this->Insta_Id, 
                          "cookies" => new InstaApiWeb\CookiesRequest($this->Cookies)), 
                           'InstaClient_lib');
      
      $this->InstaClient = $ci->InstaClient_lib;
      //$data = $ci->db_model->get_client_data($id);

    }
    
    private function fill_data(\stdClass $data)
    {
      $this->Insta_id = $data->insta_id;
      $this->Cookies = $data->cookies;
    }
}
