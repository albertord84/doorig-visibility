<?php

namespace business {

  require_once config_item('business-user-class');
  require_once config_item('business-user-class');

  
  /**
   * @category Business class
   * 
   * @access public
   *
   * @todo Define an Client business class.
   * 
   */
  class Client extends User {

    /**
     * 
     * @access public
     * @var type
     *  
     */
    public $Plane_id;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Insta_id;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Credit_card_number;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Credit_card_status_id;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Credit_card_cvc;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Credit_card_name;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Credit_card_exp_month;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Credit_card_exp_year;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Pay_day;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Initial_order_key;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Order_key;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Pending_Order_key;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Actual_payment_data;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Insta_followers_ini;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Insta_following;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $HTTP_SERVER_VARS;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Foults;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Last_access;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Cookies;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Utm_source;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Unfollow;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Observation;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Unfollow_total;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Like_first;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Paused;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Ticket_peixe_urbano;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Ticket_peixe_urbano_status_id;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Purchase_counter;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Retry_payment_counter;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Purchase_access_token;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Ticket_access_token;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Retry_registration_counter;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Proxy;
    
    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Mundi_to_vindi;

    /**
     * 
     * @access public
     * @var type 
     * 
     */
    public $Reference_profiles;

    /**
     * 
     * @todo Class constructor.
     * 
     */
    function __construct(int $id) {
      parent::__construct();
      
      $this->Id = $id;
      $this->Reference_profiles = null;
      
      $ci = &get_instance();
      $ci->load->model('clients_model');
      $ci->load->model('db_model');

    }

        /**
     * Get client data
     * @param int $client_id
     * @return DataSet  
     */
    public function load_data() {
      parent::load_data();
      
      $ci = &get_instance();
      $data = $ci->clients_model->get_by_id($this->Id);

      $this->fill_data($data);
    }
    
    private function fill_data(\stdClass $data) {
      $this->Plane_id = $data->plane_id;
      $this->Insta_id = $data->insta_id;
      $this->Credit_card_number = $data->credit_card_number;
      $this->Credit_card_status_id = $data->credit_card_status_id;
      $this->Credit_card_cvc = $data->credit_card_cvc;
      $this->Credit_card_name = $data->credit_card_name;
      $this->Credit_card_exp_month = $data->credit_card_exp_month;
      $this->Credit_card_exp_year = $data->credit_card_exp_year;
      $this->Pay_day = $data->pay_day;
      $this->Initial_order_key = $data->initial_order_key;
      $this->Order_key = $data->order_key;
      $this->Pending_Order_key = $data->pending_Order_key;
      $this->Actual_payment_data = $data->actual_payment_data;
      $this->Insta_followers_ini = $data->insta_followers_ini;
      $this->Insta_following = $data->insta_following;
      $this->HTTP_SERVER_VARS = $data->HTTP_SERVER_VARS;
      $this->Foults = $data->foults;
      $this->Last_access = $data->last_access;
      $this->Cookies = $data->cookies;
      $this->Utm_source = $data->utm_source;
      $this->Unfollow = $data->unfollow;
      $this->Observation = $data->observation;
      $this->Unfollow_total = $data->unfollow_total;
      $this->Like_first = $data->like_first;
      $this->Paused = $data->paused;
      $this->Ticket_peixe_urbano = $data->ticket_peixe_urbano;
      $this->Ticket_peixe_urbano_status_id = $data->ticket_peixe_urbano_status_id;
      $this->Purchase_counter = $data->purchase_counter;
      $this->Retry_payment_counter = $data->retry_payment_counter;
      $this->Purchase_access_token = $data->purchase_access_token;
      $this->Ticket_access_token = $data->ticket_access_token;
      $this->Retry_registration_counter = $data->retry_registration_counter;
      $this->Proxy = $data->proxy;
      $this->Mundi_to_vindi = $data->mundi_to_vindi;
    }
    
    /**
     * Obtiene 
     * @param type $client_id
     */
    public function get_reference_profiles() {
      $ci = &get_instance();

      $this->Reference_profiles = array();
      $rows = $ci->db_model->get_reference_profiles($this->Id);
      
      foreach ($rows as $tupla){
        $this->Reference_profiles[] = $tupla;
      }
      
      return $this->Reference_profiles;
    }
    
    /**
     * 
     * @return type
     */
    public function get_clients() {
      $ci = &get_instance();
      return $ci->db_model->get_clients_data();
    }
          
    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function update_client_cookies($cookies) {
      $ci = &get_instance();
      $ci->db_model->update_client_cookies($this->Id, $cookies);
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function update_client_status($status_id) {
      $ci = &get_instance();
      $ci->db_model->update_client_status($this->Id, $status_id);
    }
     
    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function insert_clients_daily_report() {
      $ci = &get_instance();
      try {
        $Clients = array();
        $clients_data = $ci->db_model->get_clients_data_for_report();
        while ($client_data = $clients_data->fetch_object()) {
          $profile_data = (new Reference_profile())->get_insta_ref_prof_data($client_data->login, $client_data->id);
          if ($profile_data) {
            $result = $ci->db_model->insert_client_daily_report($client_data->id, $profile_data);
            var_dump($client_data->login);
            var_dump("Cantidad de follows = " . $profile_data->follower_count);
            echo '<br><br><br>';
          } else {
            var_dump($client_data);
          }
          sleep(5); // secounds
        }
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function dumbu_statistics() {
      $ci = &get_instance();
      try {
        $Clients = array();
        //$DB = new \follows\cls\DB();
        $time = strtotime(date("Y-m-d H:00:00"));
        $datas = $ci->db_model->get_dumbu_statistics();
        $arr = '(';
        $cols = '(';
        foreach ($datas as $value) {
          switch ($value['status_id']) {
            case "1":
              $cols .= "ACTIVE,";
              break;
            case "2":
              $cols .= "BLOCKED_BY_PAYMENT,";
              break;
            case "3":
              $cols .= "BLOCKED_BY_INSTA,";
              break;
            case "4":
              $cols .= "DELETED,";
              break;
            case "5":
              $cols .= "INACTIVE,";
              break;
            case "6":
              $cols .= "PENDING,";
              break;
            case "7":
              $cols .= "UNFOLLOW,";
              break;
            case "8":
              $cols .= "BEGINNER,";
              break;
            case "9":
              $cols .= "VERIFY_ACCOUNT,";
              break;
            case "10":
              $cols .= "BLOCKED_BY_TIME,";
              break;
            case "21":
              $cols .= "PAYING_CUSTOMERS,";
              break;
          }
          $arr .= $value['cnt'] . ',';
        }

        $datas2 = $ci->db_model->get_dumbu_paying_customers();
        foreach ($datas2 as $value) {
          $cols .= "PAYING_CUSTOMERS,";
          $arr .= $value['cnt'] . ',';
        }

        $cols .= 'date)';
        $arr .= $time . ')';
        $ci->db_model->insert_dumbu_statistics($cols, $arr);
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function create_daily_work($client_id) {
      $ci = &get_instance();
      $Client = $ci->db_model->get_client_data($client_id);
      if (count($Client->reference_profiles) > 0) {
        $DIALY_REQUESTS_BY_CLIENT = $Client->to_follow;
        $to_follow_unfollow = $DIALY_REQUESTS_BY_CLIENT / count($Client->reference_profiles);
//                $to_follow_unfollow = $GLOBALS['sistem_config']->DIALY_REQUESTS_BY_CLIENT / count($Client->reference_profiles);
        // If User status = UNFOLLOW he do 0 follows
        $to_follow = $Client->status_id != user_status::UNFOLLOW ? $to_follow_unfollow : 0;
        $to_unfollow = $to_follow_unfollow;
        foreach ($Client->reference_profiles as $Ref_Prof) { // For each reference profile
//$Ref_prof_data = $this->Robot->get_insta_ref_prof_data($Ref_Prof->insta_name);
          $ci->db_model->insert_daily_work($Ref_Prof->id, $to_follow, $to_unfollow, $Client->cookies);
        }
      } else {
        echo "Not reference profiles: $Client->login <br>\n<br>\n";
      }
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function rp_workable_count() {
      $ci = &get_instance();
      $count = 0;
      $Robot = new Robot();
      $proxy = $Robot->get_proxy_str($this);
      $status = new reference_profiles_status();
      if ($this->reference_profiles) {
        foreach ($this->reference_profiles as $ref_prof) {
          if ($ref_prof->deleted && $ref_prof->status != $status->DELETED) {
            $ci->db_model->update_reference_profile_status($status->DELETED, $ref_prof->id);
          } else if ($ref_prof->end_date != NULL && $ref_prof->status != $status->ENDED) {
            $ci->db_model->update_reference_profile_status($status->ENDED, $ref_prof->id);
          } else if (!$Robot->exist_reference_profile($ref_prof->insta_name, $ref_prof->type, $ref_prof->insta_id, json_decode($this->cookies), $proxy) && $ref_prof->status != $status->LOCKED) {
            $ci->db_model->update_reference_profile_status($status->LOCKED, $ref_prof->id);
          } else if ($ref_prof->status == $status->ACTIVE) {
            $count++;
          }
        }
      }
      return $count;
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function delete_daily_work($client_id) {
      $ci = &get_instance();
      $ci->db_model->delete_daily_work_client($client_id);
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function sign_in($Client) {
      $ci = &get_instance();
      try {
        $login_data = $ci->InstaApiLib->login($this->login, $this->pass, $this->Proxy);
      } catch (Exception $exc) {
        $ci->db_model->insert_event_to_washdog($Client->id, $exc->getMessage(), $source);
        echo $exc->getTraceAsString();
      }

      if (is_object($login_data) && isset($login_data->json_response->authenticated) && $login_data->json_response->authenticated) {
        $ci->db_model->set_client_cookies($Client->id, json_encode($login_data));
        echo "<br>\n Autenticated Client!!! Cookies changed: $Client->login ($Client->id) <br>\n\n\n<br>\n";
        return $login_data;
      } else {
        echo "<br>\n NOT Autenticated Client!!!: $Client->login ($Client->id) <br>\n";
        var_dump($login_data->json_response);
        echo "\n\n__________________________________________________________________<br>\n";
        // Chague client status
        if (isset($login_data->json_response) && $login_data->json_response->status == 'ok') {
          if ($login_data->json_response->message == 'checkpoint_required') {
            if ($Client->status_id != user_status::VERIFY_ACCOUNT) {
              $ci->db_model->set_client_status($Client->id, user_status::VERIFY_ACCOUNT);
            }
          } else
          if ($login_data->json_response->message == 'incorrect_password') {
            if ($Client->status_id != user_status::BLOCKED_BY_INSTA) {
              $ci->db_model->set_client_status($Client->id, user_status::BLOCKED_BY_INSTA);
            }
          } else
          if ($login_data->json_response->message == 'problem_with_your_request') {
            $ci->db_model->insert_event_to_washdog($Client->id, washdog_type::PROBLEM_WITH_YOUR_REQUEST, 1, 0, "Unknow error with your request");
          } else {
            $ci->db_model->insert_event_to_washdog($Client->id, washdog_type::PROBLEM_WITH_YOUR_REQUEST, 1, 0, $login_data->json_response->message);
          }
        }
        $ci->db_model->set_client_cookies($Client->id, NULL);
        return NULL;
      }
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function checkpoint_requested(string $login, string $pass, \InstaApiWeb\VerificationChoice $choise = \InstaApiWeb\VerificationChoice::Email) {
      $login_data = json_decode($this->cookies);
      //$proxy = $this->GetProxy();
      $client = new \InstaApiWeb\InstaClient($this->insta_id, $login_data, $this->Proxy);
      $res = $client->checkpoint_requested($login, $pass, $choise);
      $this->cookies = json_encode($client->cookies);
      //guardar las cookies en la Base de Datos
      return $res;
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function make_checkpoint(string $login, string $code) {
      //las cookies son las actualizadas de la BD
      $login_data = json_decode($this->cookies);
      //$proxy = $this->GetProxy();
      $client = new \InstaApiWeb\InstaClient($this->insta_id, $login_data, $this->Proxy);
      $res = $client->make_checkpoint($login, $code);
      $this->cookies = json_encode($client->cookies);
      //guardar las cookies en la Base de Datos
      return $res;
    }

  }

}
?>
