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
  abstract class BasicClient {

    //put your code here
    public function load_data(int $id);

    protected function fill_data(\stdClass $data);
  }

}
