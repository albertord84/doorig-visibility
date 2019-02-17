<?php defined('BASEPATH') OR exit('No direct script access allowed');

use InstaApiWeb\InstaURLs;
use InstaApiWeb\InstaProfile;

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
    require_once config_item('thirdparty-insta_url-resource');
    require_once config_item('thirdparty-insta_profile-resource');
    
    $this->InstaProfile = new InstaProfile(new \stdClass());
  }

  public function get_user_data($cookies, $reference_user_name) 
  {
    return $this->InstaProfile->get_user_data($cookies, $reference_user_name);
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
