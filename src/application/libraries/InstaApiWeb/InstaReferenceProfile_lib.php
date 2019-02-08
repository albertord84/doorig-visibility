<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use InstaApiWeb\CookiesRequest;

/**
 * Description of ReferenceProfile_lib
 *
 * @author jose
 */
abstract class InstaReferenceProfile_lib {

  public $ReferenceProfile;

  public function __construct() {
    require_once config_item('thirdparty-proxy-resource');
    require_once config_item('thirdparty-cookies');
  }

  public function process_insta_prof_data(\stdClass $content) {
    if ($this->ReferenceProfile == null)
      throw new Exception("Null reference exception in ReferenceProfile variable");
    return $this->ReferenceProfile->process_insta_prof_data($content);
  }

  public function get_insta_followers(\stdClass $cookies = NULL, int $N = 15, string& $cursor = NULL, Proxy $proxy = NULL) {
    if ($this->ReferenceProfile == null)
      throw new Exception("Null reference exception in ReferenceProfile variable");
    return $this->ReferenceProfile->get_insta_followers($cookies, $N, $cursor, $proxy);
  }

  public function get_insta_media(int $N, string $cursor = NULL, \stdClass $cookies = NULL, Proxy $proxy = NULL) {
    if ($this->ReferenceProfile == null) {
      throw new Exception("Null reference exception in ReferenceProfile variable");
    }
    $cookies_req = new CookiesRequest($cookies);
    return $this->ReferenceProfile->get_insta_media($N, $cursor, $cookies_req, $proxy);
  }

  public function get_post_user_info($post_reference, \stdClass $cookies = NULL, Proxy $proxy = NULL) {

    if ($this->ReferenceProfile == null)
      throw new Exception("Null reference exception in ReferenceProfile variable");
    return $this->ReferenceProfile->get_post_user_info($post_reference, $cookies, $proxy);
  }

}
