<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogsLibrary
 *
 * @author jose
 */
class LogsManager_lib {    
    
    public $Output_addr;
    
    public function __construct($params)
    {
        $this->Output_addr = $params["output_addr"];
    }
    
    public function WriteMessage(string $message)
    {
        var_dump($message);
        //$this->CI->set_output($this->Output_addr);
    }
    
    public function WriteResponse($message)
    {
        if(method_exists($message, "getJSON"))
        {
            print_r(json_encode($message->getJSON()));
            echo ",";
        }
        else 
        {
            $str_obj = json_encode($message);
            print_r("{'message': 'unkown object', 'object': $str_obj },");            
        }
        //$this->CI->set_output($this->Output_addr);
    }
}
