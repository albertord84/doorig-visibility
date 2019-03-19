<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace InstaApiWeb\Response {
    
    require_once config_item('thirdparty-response-class');

    use InstaApiWeb\Response\Response;
    /**
     * Description of PostInstaResponse
     *
     * @author jose
     */
    class PostInstaResponse extends Response  {
        
        //put your code here
        public $Insta_Response;
        
        public function __construct($insta_response , int $code, string $message = "") {
            parent::__construct($code, $message);

            $this->Insta_Response = $insta_response;

            $this->output_array = array(
                'Insta_Response' => $this->Insta_Response,                
            );
        }        
        
    }
}
