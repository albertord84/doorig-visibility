<?php

namespace business {

  /**
   * @category Business class
   * 
   * @access public
   *
   * @todo Define an StatusProfiles business class.
   * 
   */
  class StatusProfiles extends Business {
      
    const  ACTIVE = 1;
    const  LOCKED = 2;
    const  ENDED = 3;
    const  DELETED = 4;
    const MISSING = 5;
    const PRIVATED = 6;

    public function __construct() {
      $this->ci = &get_instance();
      $this->ci->load->model('reference_profiles_status_model');

        $result = $this->ci->reference_profiles_status->get_all();
      
        if (count($result) != 0) {
        foreach ($result as $item) {
          $this->{$item->status} = $item->id;
        }
      } else {
        die("Can't load system config vars...!!");
      };
    }

    static public function Defines($const) {
      $cls = new ReflectionClass(__CLASS__);
      foreach ($cls->getConstants() as $key => $value) {
        if ($value == $const) {
          return true;
        }
      }
      return false;
    }

  }

}