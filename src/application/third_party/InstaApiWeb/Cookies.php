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
            if(isset($obj->sessionid)) $this->SessionId = $obj->sessionid;
            if(isset($obj->csrftoken)) $this->CsrfToken = $obj->csrftoken;
            if(isset($obj->ds_user_id)) $this->DsUserId = $obj->ds_user_id;
            if(isset($obj->mid)) $this->Mid = $obj->mid;
        }

    }

}
