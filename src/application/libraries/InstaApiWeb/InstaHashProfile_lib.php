<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once config_item('reference-profile_libraries'); 

use InstaApiWeb\HashProfile;
use InstaApiWeb\Proxy;
use InstaApiWeb\CookiesRequest;
/**
 * @category CodeIgniter-Library: InstaApiLib
 * 
 * @access public
 *
 * @todo Define a codeigniter library for X
 * 
 */
class InstaHashProfile_lib extends InstaReferenceProfile_lib{
  
  public function __construct ()
  {
     parent::__construct();
     require_once config_item('thirdparty-insta_hash_profile-resource');

     $this->HashProfile = new HashProfile();
  }
  
  
  // Funcion temporal para comprobar que se cargo la lib.
  public function Msg ()
  {
    echo __CLASS__."->".__FUNCTION__."() invocado (<b>ok</b>)";
  }
}
