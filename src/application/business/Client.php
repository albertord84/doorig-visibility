<?php

namespace business {

  require_once config_item('business-mark_info-class');
  require_once config_item('business-cookies-class');
  require_once config_item('business-daily_report-class');
  require_once config_item('business-ref_profile-class');
  require_once config_item('business-reference-profiles-class');
  require_once config_item('business-black_and_white_list-class');

  /**
   * @category Business class
   * 
   * @access public
   *
   * @todo Define an Client business class.
   * 
   */
  class Client extends Business {

    public $Id;
    public $ReferenceProfiles;      // Client referent profiles Class: Alberto
    public $DailyReport;            // Client daily report Class: Alberto
    public $MarkInfo;               // Client Mark Class: Alberto
    public $BlackAndWhiteList;      // Client Black and White List Class: Alberto

    public function __construct(int $id) {
      parent::__construct();

      $this->Id = $id;
      $this->MarkInfo = new MarkInfo($this);
      $this->ReferenceProfiles = new ReferenceProfiles($this);
      $this->DailyReport = new DailyReport($this);
      $this->BlackAndWhiteList = new BlackAndWhiteList($this);
    }

    public function load_daily_report_data() {
      $this->DailyReport->load_data();
    }

    public function load_insta_reference_profiles_data(int $status = 0, int $type = -1) {
      $this->ReferenceProfiles->load_data($status, $type);
    }

    public function load_black_and_white_list_data() {
      $this->BlackAndWhiteList->load_data();
    }

    public function load_mark_info_data() {
      $this->MarkInfo->load_data();
    }

    public function load_mark_info_data_by_insta_id(int $insta_id = NULL) {
      $this->MarkInfo->load_data_by_insta_id($insta_id);
    }

    public function login() {
      return true;
    }

    public function remove($client_id) {
      $this->MarkInfo->remove();
    }

    function save($client_id, $plane_id = NULL, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL) {
      $init_date = $init_date ? $init_date : time();
      $ci = &get_instance();
      $ci->load->model('client_mark_model');
      if (self::exist($insta_id)) {
        throw ErrorCodes::getException(ErrorCodes::DATA_ALREADY_EXIST);
      } else {
        $ci = &get_instance();
        $ci->client_mark_model->save($client_id, $plane_id, $pay_id, $proxy_id, $login, $pass, $insta_id, $init_date, $end_date, $cookies, $observation, $purchase_counter, $last_access, $insta_followers_ini, $insta_following);
      }

      return $id;
    }

    function update($client_id, $plane_id = NULL, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL) {
      $ci = &get_instance();
      $ci->load->model('client_mark_model');
      if (self::exist($insta_id)) {
        throw ErrorCodes::getException(ErrorCodes::DATA_ALREADY_EXIST);
      } else {
        $ci->client_mark_model->save($client_id, $plane_id, $pay_id, $proxy_id, $login, $pass, $insta_id, $init_date, $end_date, $cookies, $observation, $purchase_counter, $last_access, $insta_followers_ini, $insta_following);
      }
    }

    static function exist(string $insta_id) {
      try {
        $Client = new Client();
        $Client->MarkInfo->load_data_by_insta_id($insta_id);

        $exist = $Client->MarkInfo->client_id > 0;
        if ($exist)
          $exist = !$Client->MarkInfo->Status->hasStatus(UserStatus::DELETED);
        return $exist;
      } catch (\Exception $exc) {
        //echo $exc->getTraceAsString();
      }
    }

    /**
     * 
     * @param string $email
     * @throws Exception
     */
    static function send_contact_us($useremail, $username, $message, $company = NULL, $phone = NULL) {
      try {
        $ci = &get_instance();
        $ci->load->library("gmail");
        $ci->gmail->send_contact_us($useremail, $username, $message, $company, $phone);
        return TRUE;
      } catch (\Exception $exc) {
        throw $e;
      }
      return FALSE;
    }

    //Componente del Robot        

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function checkpoint_requested(string $login, string $pass, \InstaApiWeb\VerificationChoice $choise = \InstaApiWeb\VerificationChoice::Email) {
      /* $login_data = json_decode($this->cookies);
        //$proxy = $this->GetProxy();
        $client = new \InstaApiWeb\InstaClient($this->insta_id, $login_data, $this->Proxy);
        $res = $client->checkpoint_requested($login, $pass, $choise);
        $this->cookies = json_encode($client->cookies);
        //guardar las cookies en la Base de Datos
        return $res; */
    }

    //Componente del Robot

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function make_checkpoint(string $login, string $code) {
      /* //las cookies son las actualizadas de la BD
        $login_data = json_decode($this->cookies);
        //$proxy = $this->GetProxy();
        $client = new \InstaApiWeb\InstaClient($this->insta_id, $login_data, $this->Proxy);
        $res = $client->make_checkpoint($login, $code);
        $this->cookies = json_encode($client->cookies);
        //guardar las cookies en la Base de Datos
        return $res; */
    }

    public function verify_cookies() {
      // Log user with curl in istagram to get needed session data
      //$login_data = $Client->sign_in($Client);
      //if ($login_data !== NULL) {
      //    $Client->cookies = json_encode($login_data);
      //}
      return TRUE;
    }

    public function isWorkable() {
      if (!$this->MarkInfo->isLoaded())
        $this->load_mark_info_data();
      if ($this->MarkInfo->cookies && !$this->MarkInfo->hasStatus(UserStatus::PAUSED) && !$this->MarkInfo->hasStatus(UserStatus::BLOCKED_BY_PAYMENT) && !$this->MarkInfo->hasStatus(UserStatus::BLOCKED_BY_INSTA) && !$this->MarkInfo->hasStatus(UserStatus::KEEP_UNFOLLOW) && !$this->MarkInfo->hasStatus(UserStatus::VERIFY_ACCOUNT)) {
        return TRUE;
      }
      return FALSE;
    }

    static function get_gost_insta_client_lib_params() {
      $ck = array("sessionid" => "3445996566%3AUdrflm2b4CXrbl%3A15",
          "csrftoken" => "7jSEZvsYWGzZQUx5zlR8I3MmvPATX1X0",
          "ds_user_id" => "3445996566",
          "mid" => "XEExCwAEAAE88jhoc0YKOgFcqT3I");
      require_once config_item('thirdparty-cookies-resource');
      $param = array("insta_id" => "3445996566", "cookies" => new \InstaApiWeb\Cookies(json_encode($ck)));
      
      return $param;
    }

  }

}

?>
