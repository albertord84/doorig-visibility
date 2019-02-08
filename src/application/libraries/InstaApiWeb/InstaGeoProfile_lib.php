<?php defined('BASEPATH') OR exit('No direct script access allowed');


require_once config_item('reference-profile_libraries');  

use InstaApiWeb\Proxy;
//use InstaApiWeb\GeoProfile;
//use InstaApiWeb\CookiesRequest;
//use \ReferenceProfile_lib;


/**
 * @category CodeIgniter-Library: InstaApiLib
 * 
 * @access public
 *
 * @todo Define a codeigniter library for X
 * 
 */

class InstaGeoProfile_lib extends ReferenceProfile_lib{
  
  public function __construct() {
    parent::__construct();
    require_once config_item('thirdparty-insta_geo_profile-resource');    

    //$this->GeoProfile = new GeoProfile();
  }

  public function process_top_search_profile(\stdClass $content) {
     $this->GeoProfile->process_top_search_profile($content);
  }

  public function get_followers(\stdClass $cookies = NULL, int $N = 15, string& $cursor = NULL, Proxy $proxy = NULL) {
     $this->GeoProfile->get_followers($cookies, $N, $cursor, $proxy);
  }

  public function get_post(int $N, string $cursor = NULL, \stdClass  $cookies = NULL, Proxy $proxy = NULL) {
   $cookies = new CookiesRequest($cookies);
    $this->GeoProfile->get_post($N, $cursor, $cookies, $proxy);
  }

  public function get_owner_post_data($post_reference, \stdClass $cookies = NULL, Proxy $proxy = NULL) {
    $this->GeoProfile->get_owner_post_data($post_reference, $cookies, $proxy);
  }

}
