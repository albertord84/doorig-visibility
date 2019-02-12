<?php defined('BASEPATH') OR exit('No direct script access allowed');


require_once config_item('reference-profile_libraries');  

use InstaApiWeb\Proxy;
//use InstaApiWeb\GeoProfile;
//use InstaApiWeb\Cookies;
//use ReferenceProfile_lib;


/**
 * @category CodeIgniter-Library: InstaApiLib
 * 
 * @access public
 *
 * @todo Define a codeigniter library for X
 * 
 */

class InstaGeoProfile_lib extends InstaReferenceProfile_lib{
  
  public function __construct() {
    parent::__construct();
    require_once config_item('thirdparty-insta_geo_profile-resource');  
    $this->ReferenceProfile = new GeoProfile();
  }

}
