<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once config_item('reference-profile_libraries'); 

use InstaApiWeb\HashProfile;
use InstaApiWeb\Proxy;
use InstaApiWeb\Cookies;
/**
 * @category CodeIgniter-Library: InstaApiLib
 * 
 * @access public
 *
 * @todo Define a codeigniter library for X
 * 
 */
class InstaHashProfile_lib extends ReferenceProfile_lib{
  
  public function __construct ()
  {
     parent::__construct();
     require_once config_item('thirdparty-insta_hash_profile-resource');

     $this->HashProfile = new HashProfile();
  }
   
  public function process_top_search_profile(\stdClass $content) {
    $this->HashProfile->process_top_search_profile($content);
  }

  public function get_followers(\stdClass $cookies = NULL, int $N = 15, string& $cursor = NULL, \business\cls\Proxy $proxy = NULL) {
    $this->HashProfile->get_followers($cookies, $N, $cursor, $proxy);
  }

  public function get_post(int $N, string $cursor = NULL, \stdClass $cookies = NULL, Proxy $proxy = NULL) {
    $cookies = new Cookies($cookies);
    $this->HashProfile->get_post($N, $cursor, $cookies, $proxy);
  }

  public function get_owner_post_data($post_reference, \stdClass $cookies = NULL, \business\cls\Proxy $proxy = NULL) {
    $this->HashProfile->get_owner_post_data($post_reference, $cookies, $proxy);
  }

  // Funcion temporal para comprobar que se cargo la lib.
  public function Msg ()
  {
    echo __CLASS__."->".__FUNCTION__."() invocado (<b>ok</b>)";
  }
}
