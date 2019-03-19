<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
  exit('No direct script access allowed');



/**
 * Description of Logs_test
 *
 * @author jose
 */
class Logs_test extends CI_Controller {
    
    public function __construct() {
       parent::__construct();

    }
    
    
    public function runTest()
    {
        $this->load->library("LogsManager_lib", array("output_addr" => "test.log"), 'LogMgr');
        echo "(<b>Load LogsManager_lib ok</b>)</br>";
    
        $this->LogMgr->WriteMessage("test message");
    }    
   
}
