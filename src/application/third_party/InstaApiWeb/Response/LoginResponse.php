<?php

namespace InstaApiWeb\Response {

    require_once config_item('thirdparty-cookies-resource');
    require_once config_item('thirdparty-response-class');

    use InstaApiWeb\Cookies;
    use InstaApiWeb\Response\Response;
    
    /**
     * @category InstaApiWeb Third-Party Class
     * 
     * @access public
     *
     * @todo Define a Instagram Login Response.
     * 
     */
    class LoginResponse extends Response {

        /**
         * 
         * @access public
         * 
         */
        public $Verify_link;

        /**
         * 
         * @access public
         * 
         */
        public $Authenticated;

        /**
         * 
         * @access public
         * 
         */
        public $Message;

        /**
         * 
         * @access public
         * 
         */
        public $Cookies;

        public function __construct($authenticated = NULL, Cookies $cookies = NULL, string $verify_link = "", int $code = 0, string $message = "") {
            parent::__construct($code, $message);

            $this->Verify_link = $verify_link;
            $this->Authenticated = $authenticated;
            $this->Cookies = $cookies;

            $this->output_array = array(
                'Verify_link' => $this->Verify_link,
                'Cookies' => $this->Cookies,
                'Authenticated' => $this->Authenticated
            );
        }

    }

}
