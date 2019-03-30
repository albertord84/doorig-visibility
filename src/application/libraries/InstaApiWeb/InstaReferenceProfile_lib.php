<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use InstaApiWeb\Cookies;
use InstaApiWeb\Response\FollowersResponse;
use InstaApiWeb\Proxy;
/**
 * Description of ReferenceProfile_lib
 *
 * @author jose
 */
abstract class InstaReferenceProfile_lib {

  public $ReferenceProfile;

  public function __construct() {
    require_once config_item('thirdparty-proxy-resource');
    require_once config_item('thirdparty-cookies-resource');
    require_once config_item('thirdparty-followers-response-class');
  }
  
  public function get_insta_prof_data(Cookies $cookies=NULL, Proxy $proxy = NULL)
  {}

  public function get_insta_followers(Cookies $cookies = NULL, int $N = 15, string& $cursor = NULL, Proxy $proxy = NULL): FollowersResponse{
    if ($this->ReferenceProfile == null)
      throw new Exception("Null reference exception in ReferenceProfile variable");
    return $this->ReferenceProfile->get_insta_followers($cookies, $N, $cursor, $proxy);
  }

  public function get_post(int $N, string $cursor = NULL, Cookies $cookies = NULL, Proxy $proxy = NULL) {
    if ($this->ReferenceProfile == null) {
      throw new Exception("Null reference exception in ReferenceProfile variable");
    }
    return $this->ReferenceProfile->get_post($N, $cursor, $cookies, $proxy);
  }

  public function get_post_user_info($post_reference, Cookies $cookies = NULL, Proxy $proxy = NULL) {

    if ($this->ReferenceProfile == null)
      throw new Exception("Null reference exception in ReferenceProfile variable");
    return $this->ReferenceProfile->get_post_user_info($post_reference, $cookies, $proxy);
  }

}
