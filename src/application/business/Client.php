<?php

namespace business {

  require_once config_item('business-user-class');
  require_once config_item('business-insta-curl-info-class');

  /**
   * @category Business class
   * 
   * @access public
   *
   * @todo Define an Client business class.
   * 
   */
  class Client extends User {

    public $InstaCurlInfo;

    public function __construct(int $id) {
      parent::__construct($id);
      $this->InstaCurlInfo = new InstaCurlInfo($this);
    }

    public function load_data() {
      parent::load_data();
      $ci = &get_instance();
      $data = $ci->users_model->get_user_base_info($this->Id);
      $this->fill_data($data);
    }
    
    protected function fill_data(\stdClass $data) {
      parent::fill_data($data);
    }
    
    public function load_insta_data()
    {
      $this->InstaCurlInfo->load_data();
    }
    
    public function login()
    {
       return true;
    }
  }

}
?>
