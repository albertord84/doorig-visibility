<?php

namespace business {
  
  require_once config_item('business-class');
  require_once config_item('business-user_role-class');
  require_once config_item('business-user_status-class');
  require_once config_item('business-loader-class');
  
  class Contact_Information extends Loader
  {
    public $User;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Phone_ddi;
    
     /**
     * 
     * @access public
     * @var type 
     * 
     */    
    public $Phone_ddd;
    
     /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Phone_number;
    
    public function __construct(User $user)
    {
      $this->User = $user; 
    }


    protected function fill_data(stdClass $data) {
      $this->Phone_ddi = $data->phone_ddi;
      $this->Phone_ddd = $data->phone_ddd;
      $this->Phone_number = $data->phone_number;
    }

    public function load_data() {
      $ci = &get_instance();
      $data = $ci->users_model->get_user_contact_info($User->Id);
      
      $this->fill_data($data);
    }

  }
  
  class User_Information extends Loader
  {
      /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Status_date;
    
    /**
     * 
     * @access public
     * @var type
     *  
     */
    public $Languaje;

     /**
     * 
     * @access public
     * @var type
     *  
     */
    public $Init_date;
    
    public $User;
    
      
    public function __construct(User $user)
    {
      $this->User = $user; 
    }
    
     /**
     * 
     * @access public
     * @var type
     *  
     */
    public $End_date;
    protected function fill_data(stdClass $data) {
      $this->Status_date = $data->status_date;
      $this->Languaje = $data->languaje;
      $this->Init_date = $data->init_date;
      $this->End_date = $data->end_date;
    }

    public function load_data() {
       $ci = &get_instance();
      $data = $ci->users_model->get_user_extra_info($User->Id);
      
      $this->fill_data($data);      
    }

  }

  /**
   * @category Business class
   * 
   * @access public
   *
   * @todo Define an User business class.
   * 
   */
  class User extends Loader {

    /**
     * 
     * @access public
     * @var type
     *  
     */
    public $Id;
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Role;   
     /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Name; 
    /**
     * 
     * @access public
     * @var type
     *  
     */
    public $Login;
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Pass;     
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Status;    
     /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Email;

   
    
    /**
     * 
     * @todo Class constructor.
     * 
     */
    function __construct(int $id) {
      parent::__construct();
      
      //$this->Id = $id;
      $ci = &get_instance();
      $ci->load->model('users_model'); 
      $this->id = $id;
      $this->load_data();
    }

    public function load_data() {
      $ci = &get_instance();
      $data = $ci->users_model->get_user_base_info($this->Id);
      
      $this->fill_data($data);
    }
    
    protected function fill_data(stdClass $data) {
      $this->Id = $data->id;
      $this->Role = $data->role_id;
      $this->Name = $data->name;
      $this->Login = $data->login;
      $this->Pass = $data->pass;     
      $this->Status = $data->status_id;      
      $this->Email = $data->email;     
    }
    
    public function id($value = NULL) {
      if (isset($value)) {
        $this->id = $value;
      } else {
        return $this->id;
      }
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function do_login($user_name, $user_pass) {
      echo $user_name;
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function update_user() {
      
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function disable_account() {
      
    }

  }

}
