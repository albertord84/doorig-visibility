<?php

/**
 * Description of ReferenceProfile_lib
 *
 * @author jose
 */
class ReferenceProfile_lib {
  
 public $ReferencePriofile;
  
 public function __construct() {
    require_once config_item('thirdparty-proxy-resource');
    require_once config_item('thirdparty-cookies-resource');    
  }

  
}
