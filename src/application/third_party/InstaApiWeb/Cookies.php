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

    /**
     * 
     * @access public
     * 
     */
    public $Challenge;

    public function __construct(string $cookies_str = null, string $challenge = NULL) {
      $obj = json_decode($cookies_str);
      if (isset($obj->SessionId))
        $this->SessionId = $obj->SessionId;
      if (isset($obj->CsrfToken))
        $this->CsrfToken = $obj->CsrfToken;
      if (isset($obj->DsUserId))
        $this->DsUserId = $obj->DsUserId;
      if (isset($obj->Mid))
        $this->Mid = $obj->Mid;
      $this->Challenge = $challenge;
    }

  }

}
