<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace business {


  require_once config_item('business-class');  
  use business\Business;
  /**
   * Description of BasicClient
   *
   * @author jose
   */
  abstract class Loader extends Business {

    //put your code here
    public abstract function load_data();

    protected abstract function fill_data(\stdClass $data);
  }

}
