<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once config_item('thirdparty-insta_url-resource');
require_once config_item('thirdparty-insta_profile-resource');
require_once config_item('thirdparty-cookies-resource');
require_once config_item('thirdparty-proxy-resource');
    
use InstaApiWeb\InstaURLs;
use InstaApiWeb\InstaProfile;
use InstaApiWeb\Cookies;
use InstaApiWeb\Proxy;

/**
 * @category CodeIgniter-Library: InstaApiLib
 * 
 * @access public
 *
 * @todo Define a codeigniter library for X
 * 
 */
class InstaProfile_lib {

  public function __construct ()
  {
    $this->InstaProfile = new InstaProfile();
  }

  public function get_user_data(string $reference_user_name, Cookies $Cookies = NULL, Proxy $Proxy = NULL) 
  {
    $obj = $this->InstaProfile->get_user_data($reference_user_name, $Cookies, $Proxy);
    return $obj;
  }

  
  public function get_insta_id()
  {
    return $this->InstaProfile->insta_id;
  }
  // Funcion temporal para comprobar que se cargo la lib.
  public function Msg ()
  {
    echo __CLASS__."->".__FUNCTION__."() invocado (<b>ok</b>)";
  }
}
