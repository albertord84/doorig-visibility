<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace business {
  
  require_once config_item('business-loader-class');
  require_once config_item('business-client-class');
  require_once config_item('thirdparty-cookies');
  
  use InstaApiWeb\Cookies;

  /**
   * Description of SimpleClient
   *
   * @author jose
   */
  class InstaInfo extends Loader{
    //put your code here
    public $Insta_Id;
    public $Cookies;
    public $InstaClient;
    public $Client;
    
    function __construct(Client $client) {
      $ci = &get_instance();
      $ci->load->model('clients_model');
      $ci->load->model('db_model');
      $this->Client = $client;     
    }   
    

    /**
     * Get client data
     * @param int $client_id
     * @return DataSet  
     */
    public function load_data() {     

      $ci = &get_instance();
      $data = $ci->clients_model->get_insta_client_by_id($this->Client->Id);
      $this->fill_data($data);

      $ci->load->library("InstaApiWeb/InstaClient_lib", array("insta_id" => $this->Insta_Id,
          "cookies" => $this->Cookies ), 'InstaClient_lib');

      $this->InstaClient = $ci->InstaClient_lib;
      //$data = $ci->db_model->get_client_data($id);
    }

    protected function fill_data(\stdClass $data) {
      $this->Insta_Id = $data->insta_id;
      $this->Cookies = new Cookies($data->cookies);
    }

  }

}