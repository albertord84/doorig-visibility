<?php

namespace InstaApiWeb {

    /**
     * @category InstaApiWeb Third-Party Class
     * 
     * @access public
     *
     * @todo Define a basic Instagram Cookies.
     * 
     */
    class Cookies {

        /**
         * 
         * @access public
         * 
         */
        public $SessionId;

        /**
         * 
         * @access public
         * 
         */
        public $CsrfToken;

        /**
         * 
         * @access public
         * 
         */
        public $DsUserId;

        /**
         * 
         * @access public
         * 
         */
        public $Mid;

        public function __construct(string $cookies_str) {
            $obj = json_decode($cookies_str);
            $this->SessionId = $obj->sessionid;
            $this->CsrfToken = $obj->csrftoken;
            $this->DsUserId = $obj->ds_user_id;
            $this->Mid = $obj->mid;
        }

    }

}
