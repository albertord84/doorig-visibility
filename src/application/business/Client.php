<?php

namespace business {

    require_once config_item('business-user-class');
    require_once config_item('business-mark_info-class');
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

        public function load_insta_data() {
            $this->InstaCurlInfo->load_data();
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

        public function login() {
            return true;
        }

        public function SaveFollowed() {
            
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
      /*$login_data = json_decode($this->cookies);
      //$proxy = $this->GetProxy();
      $client = new \InstaApiWeb\InstaClient($this->insta_id, $login_data, $this->Proxy);
      $res = $client->checkpoint_requested($login, $pass, $choise);
      $this->cookies = json_encode($client->cookies);
      //guardar las cookies en la Base de Datos
      return $res;*/
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
      return $res;*/
    }

    }

}

?>
