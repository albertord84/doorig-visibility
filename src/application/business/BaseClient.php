<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace business {

  /**
   * Description of BasicClient
   *
   * @author jose
   */
  abstract class BaseClient {

    //put your code here
    public abstract function load_data(int $id);

    protected abstract function fill_data(\stdClass $data);
  }

}
