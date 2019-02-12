<?php

namespace business {

  use stdClass;
  
  /**
   * Description of HashtagProfile
   *
   * @author dumbu
   */
  class ReferenceProfile extends Business {

    /**
     *
     * @var type 
     */
    public $Id;

    /**
     *
     * @var type 
     */
    public $Insta_name;

    /**
     *
     * @var type 
     */
    public $Insta_id;

    /**
     *
     * @var type 
     */
    public $Status_id;

    /**
     *
     * @var type 
     */
    public $Client_id;

    /**
     *
     * @var type 
     */
    public $Insta_Followers_cursor;

    /**
     *
     * @var type 
     */
    public $Deleted;

    /**
     *
     * @var type 
     */
    public $End_date;

    /**
     *
     * @var type 
     */
    public $Follows;

    /**
     *
     * @var type 
     */
    public $Type;

    /**
     *
     * @var type 
     */
    public $Last_access;

    function __construct() {
      parent::__construct();

      $ci = &get_instance();
      $ci->load->model('reference_profile_model');
    }

    public function load_data(int $id) {
      $ci = &get_instance();
      $data = $ci->reference_profile_model->get_by_id($id);

      $this->fill_data($data);
    }

    private function fill_data(stdClass $data) {
      $this->Id = $data->id;
      $this->Insta_name = $data->insta_name;
      $this->Insta_id = $data->insta_id;
      $this->Status_id = $data->status_id;
      $this->Client_id = $data->client_id;
      $this->Insta_Followers_cursor = $data->insta_Followers_cursor;
      $this->Deleted = $data->deleted;
      $this->End_date = $data->end_date;
      $this->Follows = $data->follows;
      $this->Type = $data->type;
      $this->Last_access = $data->last_access;
    }

    public function save_data() {
      
    }

  }

}    
