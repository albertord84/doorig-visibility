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
    
    public function __construct($params = NULL)
    {
        $this->Output_addr = $params["output_addr"];
    }
    
    public function WriteMessage(string $message)
    {
        print_r($message);
        //$this->CI->set_output($this->Output_addr);
    }
    
    public function WriteResponse($message)
    {
        if(method_exists($message, "getJSON"))
        {
            echo(json_encode(json_decode($message->getJSON()), JSON_PRETTY_PRINT));
            echo "\n\n,";
        }
        else 
        {
            var_dump($message);
            //$str_obj = json_encode($message);
            //print_r("{'message': 'unkown object', 'object': $message },");            
        }
        //$this->CI->set_output($this->Output_addr);
    }    

}
