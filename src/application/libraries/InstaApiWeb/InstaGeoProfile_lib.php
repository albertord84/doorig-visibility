<?php defined('BASEPATH') OR exit('No direct script access allowed');


require_once config_item('reference-profile_libraries');  

use InstaApiWeb\Proxy;
use InstaApiWeb\InstaGeoProfile;
use InstaApiWeb\CookiesRequest;
//use \ReferenceProfile_lib;


/**
 * @category CodeIgniter-Library: InstaApiLib
 * 
 * @access public
 *
 * @todo Define a codeigniter library for X
 * 
 */

class InstaGeoProfile_lib extends InstaReferenceProfile_lib{
  
  public function __construct(array $params) {
    parent::__construct();
    require_once config_item('thirdparty-insta_geo_profile-resource');    

    if (!array_key_exists("insta_id", $params)) {
      throw new Exception("The params insta_id was not found");
    }
    $insta_id = $params["insta_id"];
    $this->ReferenceProfile = new InstaGeoProfile($insta_id);
  }
  
}
