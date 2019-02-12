<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Database_test extends CI_Controller {

  public function __construct() {
    parent::__construct();

    require_once config_item('db-exception-class');
  }

  public function index() {
    echo "Controller: <b>" . __CLASS__ . "</b> cargado.";
    
    echo intval(null);
  }

  public function db_exception() {
    $this->load->model('db_model');
    //$this->db_model->myFunc();

    try {
      $items = $this->db_model->get_clients_by_status(1);
      print_r($items);
    } catch (Error $e) {
      echo "<h2>Capture el error php</h2>";
      echo $e->getMessage();
    } catch (Db_Exception $e) {
      echo "<h2>try-catch del controller</h2>";
      echo $e->getErrorInfo();
    }
  }

  public function db_model($func = -1) {
    $this->load->model('db_model');

    echo "<pre>";
    echo "<h2>Test Db_model </h2>";
    echo "//===========================>GET<============================//<br><br>";

    //FUNC 0
    $array = $this->db_model->get_clients_by_status(8, 0, 10);
    echo "FUNC 0-[get] get_clients_by_status  => result: " . count($array) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 0)
      var_dump($array);

    //FUNC 1
    $array = $this->db_model->get_clients_data();
    echo "FUNC 1-[get] get_clients_data  => result: " . count($array) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 1)
      var_dump($array);

    //FUNC 2
    $obj = $this->db_model->get_client_data(1);
    echo "FUNC 2-[get] get_client_data => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 2)
      var_dump($obj);

    //FUNC 3

    $array = $this->db_model->get_reference_profiles_data(1);
    echo "FUNC 3-[get] get_reference_profiles_data  => result: " . count($array) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 3)
      var_dump($array);


    //FUNC 4
    $array = $this->db_model->get_biginner_data(0, 10);
    echo "FUNC 4-[get] get_biginner_data  => result: " . count($array) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 4)
      var_dump($array);

    //FUNC 5
    $array = $this->db_model->get_clients_data_for_report();
    echo "FUNC 5-[get] get_clients_data_for_report  => result: " . count($array) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 5)
      var_dump($array);

    //FUNC 6
    $array = $this->db_model->get_unfollow_clients_data();
    echo "FUNC 6-[get] get_unfollow_clients_data  => result: " . count($array) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 6)
      var_dump($array);

    //FUNC 7
    $obj = $this->db_model->get_gateway_plane_id(2);
    echo "FUNC 7-[get] get_gateway_plane_id  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 7)
      var_dump($obj);

    //FUNC 8
    $obj = $this->db_model->get_client_payment_data(1);
    echo "FUNC 8-[get] get_client_payment_data  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 8)
      var_dump($obj);

    //FUNC 9
    $obj = $this->db_model->get_client_login_data(1);
    echo "FUNC 9-[get] get_client_login_data  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 9)
      var_dump($obj);

    //FUNC 10
    $obj = $this->db_model->get_client_data_bylogin("riveauxmerino");
    echo "FUNC 10-[get] get_client_data_bylogin  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 10)
      var_dump($obj);

    //FUNC 11
    $obj = $this->db_model->get_client_proxy(1);
    echo "FUNC 11-[get] get_client_proxy  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 11)
      var_dump($obj);

    //FUNC 12
    $obj = $this->db_model->get_client_instaid_data(1);
    echo "FUNC 12-[get] get_client_instaid_data  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 12)
      var_dump($obj);

    //FUNC 13
    $obj = $this->db_model->get_client_id_from_reference_profile_id(20850);
    echo "FUNC 13-[get] get_client_id_from_reference_profile_id  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 13)
      var_dump($obj);

    //FUNC 14
    $obj = $this->db_model->get_reference_profiles_follows(20850);
    echo "FUNC 14-[get] get_reference_profiles_follows  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 14)
      var_dump($obj);

    //FUNC 15
    $obj = $this->db_model->get_follow_work();
    echo "FUNC 15-[get] get_follow_work  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 15)
      var_dump($obj);

    //FUNC 16
    $obj = $this->db_model->get_follow_work_by_id(51323);
    echo "FUNC 16-[get] get_follow_work_by_id  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 16)
      var_dump($obj);

    //FUNC 17

    //$obj = $this->db_model->get_follow_work_by_client_id(1);
    //echo "FUNC 17-[get] get_follow_work_by_client_id  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 17)
      var_dump($obj);

    //FUNC 18
    //$obj = $this->db_model->get_unfollow_work(1);
    //echo "FUNC 18-[get] get_unfollow_work  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 18)
      var_dump($obj);

    //FUNC 19
    $obj = $this->db_model->get_system_config_vars();
    echo "FUNC 19-[get] get_system_config_vars  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 19)
      var_dump($obj);

    //FUNC 20 
    $obj = $this->db_model->get_white_list(20481);
    echo "FUNC 20-[get] get_white_list  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 20)
      var_dump($obj);

    //FUNC 21
    $obj = $this->db_model->get_white_list_paged(20481, 0, 20);
    echo "FUNC 21-[get] get_white_list_paged  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 21)
      var_dump($obj);

    //FUNC 22
    $obj = $this->db_model->get_black_list(28751);
    echo "FUNC 22-[get] get_black_list  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 22)
      var_dump($obj);

    //FUNC 23
    $obj = $this->db_model->get_client_with_white_list();
    echo "FUNC 23-[get] get_client_with_white_list  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 23)
      var_dump($obj);

    //FUNC 24
    $obj = $this->db_model->get_client_with_orderkey(hhh555hhh555hhh555hhh);
    echo "FUNC 24-[get] get_client_with_orderkey  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 24)
      var_dump($obj);

    //FUNC 25
    $obj = $this->db_model->get_number_followed_today(28751);
    echo "FUNC 25-[get] get_number_followed_today  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 25)
      var_dump($obj);

    //FUNC 26
    $obj = $this->db_model->get_reference_profiles_with_problem(1);
    echo "FUNC 26-[get] get_client_instaid_data  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 26)
      var_dump($obj);

    //FUNC 27
    $obj = $this->db_model->get_not_reserved_proxy_list();
    echo "FUNC 27-[get] get_not_reserved_proxy_list  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 27)
      var_dump($obj);

    //FUNC 28
    $obj = $this->db_model->get_proxy(8);
    echo "FUNC 28-[get] get_proxy  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 28)
      var_dump($obj);

    //FUNC 29
    $obj = $this->db_model->get_proxy_plient_counts('172.84.73.213');
    echo "FUNC 29-[get] get_proxy_plient_counts  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 29)
      var_dump($obj);

    //FUNC 30
    $obj = $this->db_model->get_client_withou_proxy();
    echo "FUNC 30-[get] get_client_withou_proxy  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 30)
      var_dump($obj);

    //FUNC 31
    $obj = $this->db_model->get_dumbu_statistics();
    echo "FUNC 31-[get] get_dumbu_statistics  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 31)
      var_dump($obj);

    //FUNC 32
    $obj = $this->db_model->get_dumbu_paying_customers();
    echo "FUNC 32-[get] get_dumbu_paying_customers  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 32)
      var_dump($obj);

    //FUNC 33
    $obj = $this->db_model->get_reference_profile_status();
    echo "FUNC 33-[get] get_reference_profile_status  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 33)
      var_dump($obj);

    echo "//===========================>SET<============================//<br><br>";

    //FUNC 34
    //$obj = $this->db_model->update_client_status(1, 3);
    echo "FUNC 34-[set] set_client_status  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";

    if ($func == 34) var_dump($obj);

    //FUNC 35
    $obj = $this->db_model->update_client_status_by_login('alberto_dreyes', 1);
    echo "FUNC 35-[set] set_client_status_by_login  => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";

    if ($func == 35) var_dump($obj);    

    //FUNC 36
    $obj = $this->db_model-> update_client_cookies(1, '{"json_response":{"status":"ok","authenticated":true,"user":"test"}');
    echo "FUNC 36 -[set] set_client_cookies => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";

    if ($func == 36) var_dump($obj); 

    //FUNC 37
    $obj = $this->db_model-> set_pasword(1, 'alberto6');
    echo "FUNC 37-[set] => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";

    if ($func == 37) var_dump($obj);
        
    //FUNC 38
    //$obj = $this->db_model-> set_cookies_to_null(1);
    echo "FUNC 38-[set] set_pasword => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";

    if ($func == 38) var_dump($obj);

    //FUNC 39
    $obj = $this->db_model->set_client_last_access(1, 1549632916); 
    echo "FUNC 39-[set] set_client_last_access => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";

    if ($func == 39) var_dump($obj);

    //FUNC 40
    $obj = $this->db_model->set_client_order_key(1, 1234567890, 1549632916);
    echo "FUNC 40-[set] set_client_order_key => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";

    if ($func == 40) var_dump($obj);

    //FUNC 41
    $obj = $this->db_model-> set_proxy_to_client(1, 8);
    echo "FUNC 41-[set] set_proxy_to_client => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";

    if ($func == 41) var_dump($obj);
     
    echo "//==========================>INSERT<==========================//<br><br>";
    
    //FUNC 42
    //$obj = $this->db_model-> insert_client_daily_report($client_id, $profile_data);
    echo "FUNC 42-[set] insert_client_daily_report => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 42) var_dump($obj);
    
    //FUNC 43
    //$obj = $this->db_model-> insert_daily_work($ref_prof_id, $to_follow, $to_unfollow, $login_data) ;
    echo "FUNC 43-[set] insert_daily_work => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 43) var_dump($obj);
    
    //FUNC 44
    //$obj = $this->db_model-> insert_event_to_washdog($user_id, $action, $source = 0, $robot_id = NULL, $metadata = NULL);
    echo "FUNC 44-[set] insert_event_to_washdog => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 44) var_dump($obj);
    
    //FUNC 45
    //$obj = $this->db_model-> insert_dumbu_statistics($cols, $arr);
    echo "FUNC 45-[set] insert_dumbu_statistics => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 45) var_dump($obj);
    
    echo "//==========================>UPDATE<==========================//<br><br>";
    
    //FUNC 46
    //$obj = $this->db_model-> update_daily_work($ref_prof_id, $follows, $unfollows, $faults = 0);
    echo "FUNC 46-[set] update_daily_work => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 46) var_dump($obj);
    
    //FUNC 47
    //$obj = $this->db_model-> update_reference_cursor($reference_id, $end_cursor);
    echo "FUNC 47-[set] update_reference_cursor => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 47) var_dump($obj);
    
    //FUNC 48
    //$obj = $this->db_model-> update_reference_profile_status($status, $id);
    echo "FUNC 48-[set] update_reference_profile_status => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 48) var_dump($obj);
    
    //FUNC 49
    //$obj = $this->db_model-> update_table_field($table, $field, $value, $query);
    echo "FUNC 49-[set] update_table_field => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 49) var_dump($obj);
    
    echo "//==========================>DELETED<=========================//<br><br>";
    
    //FUNC 50
    //$obj = $this->db_model-> delete_daily_work($ref_prof_id);
    echo "FUNC 50-[set] delete_daily_work => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 50) var_dump($obj);
    
    //FUNC 51
    //$obj = $this->db_model-> delete_daily_work_client($client_id);
    echo "FUNC 51-[set] delete_daily_work_client => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 51) var_dump($obj);
    
    echo "//===========================>SAVE<===========================//<br><br>";
    
    //FUNC 52
    //$obj = $this->db_model-> save_follow_work($Ref_profile_follows, $daily_work);
    echo "FUNC 52-[set] save_follow_work => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 52) var_dump($obj);
    
    //FUNC 53
    //$obj = $this->db_model-> save_http_server_vars($client_id, $HTTP_SERVER_VARS);
    echo "FUNC 53-[set] save_http_server_vars => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 53) var_dump($obj);
    
    echo "//===========================>RESET<==========================//<br><br>";
    
    //FUNC 54
    //$obj = $this->db_model-> reset_preference_profile_cursors();
    echo "FUNC 54-[set] reset_preference_profile_cursors => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 54) var_dump($obj);
    
    //FUNC 55
    //$obj = $this->db_model-> reset_referecne_prof($reference_id);
    echo "FUNC 55-[set] reset_referecne_prof => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
    if ($func == 55) var_dump($obj);
    
    echo "//===========================>OTHERS<=========================//<br><br>";
    
  //FUNC 56
  //$obj = $this->db_model-> cmd_is_profile_followed($client_id, $followed_id);
  echo "FUNC 56-[set] cmd_is_profile_followed => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
  if ($func == 56) var_dump($obj);  
          
  //FUNC 57
  //$obj = $this->db_model-> cmd_has_work($client_id, $rp = NULL); 
  echo "FUNC 57-[set] cmd_has_work => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
  if ($func == 57) var_dump($obj);
          
  //FUNC 58
  //$obj = $this->db_model-> cmd_add_observation($client_id, $observation);
  echo "FUNC 58-[set] cmd_add_observation => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
  if ($func == 58) var_dump($obj);
  
  //FUNC 59
  //$obj = $this->db_model-> cmd_create_followed($client_id);
  echo "FUNC 59-[set] cmd_create_followed => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
  if ($func == 59) var_dump($obj);
  
  //FUNC 60
  //$obj = $this->db_model-> cmd_increase_client_last_access($client_id, $hours = 1);
  echo "FUNC 60-[set] cmd_increase_client_last_access => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
  if ($func == 60) ar_dump($obj);
  
  //FUNC 61
  //$obj = $this->db_model-> cmd_truncate_daily_work(); 
  echo "FUNC 61-[set] cmd_truncate_daily_work => result: " . count($obj) . " ==> (<b>ok</b>)<br><br>";
  if ($func == 61) var_dump($obj);
          

    echo "</pre>";
  }

  public function entity($param, $action, $id) {
    echo "<b>Param: </b>" . $param . "<br><b>Action: </b>" . $action . "<br><br>";

    switch ($param) {
      case 'black_and_white_list': $this->e_Black_and_white_list($action, $id);
        break;
      case 'client_payment': $this->e_Client_payment($action, $id);
        break;
      case 'clients': $this->e_Clients($action, $id);
        break;
      case 'credit_card_status': $this->e_Credit_card_status($action, $id);
        break;
      case 'daily_report': $this->e_Daily_report($action, $id);
        break;
      case 'daily_work': $this->e_Daily_work($action, $id);
        break;
      case 'dumbu_statistic': $this->e_Dumbu_statistic($action, $id);
        break;
      case 'dumbu_system_config': $this->e_Dumbu_system_config($action, $id);
        break;
      case 'faq': $this->e_Faq($action, $id);
        break;
      case 'payment_cause': $this->e_Payment_cause($action, $id);
        break;
      case 'payment_form': $this->e_Payment_form($action, $id);
        break;
      case 'payment_gateway': $this->e_Payment_gateway($action, $id);
        break;
      //case 'payment_gateway_values': $this->($action, $id); break;
      //case 'payments': $this->($action, $id); break;
      //case 'pendences': $this->($action, $id); break;
      //case 'plane': $this->($action, $id); break;
      case 'proxy': $this->e_Proxy($action, $id);
        break;
      //case 'ranking': $this->($action, $id); break;
      //case 'reference_profile': $this->($action, $id); break;
      //case 'reference_profiles_status': $this->($action, $id); break;
      //case 'robot': $this->($action, $id); break;
      //case 'salva_users': $this->($action, $id); break;
      //case 'ticket_bank': $this->($action, $id); break;
      //case 'ticket_peixe_urbano_status': $this->($action, $id); break;
      //case 'translation': $this->($action, $id); break;
      //case 'user_role': $this->($action, $id); break;
      //case 'user_status': $this->($action, $id); break;
      //case 'users': $this->($action, $id); break;
      //case 'washdog1': $this->($action, $id); break;
      //case 'washdog': $this->($action, $id); break;
      //case 'washdog_type': $this->($action, $id); break;
      //case 'worker': $this->($action, $id); break;
      //case 'worker_robot': $this->($action, $id); break;      
      default: echo "<h2>param wrong!!!</h2>";
    }
  }

  private function e_Black_and_white_list($action, $id) {
    $this->load->model('black_and_white_list_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->black_and_white_list_model->get_by_id($id);
      print_r($items);
    } else if ($action == 'get-all') {
      $items = $this->black_and_white_list_model->get_all();
      print_r($items);
    } else {
      echo "<h2>action wrong!!!</h2>";
    }
  }

  private function e_Client_payment($action, $id) {
    $this->load->model('client_payment_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->client_payment_model->get_by_id($id);
      print_r($items);
    } else if ($action == 'get-all') {
      $items = $this->client_payment_model->get_all();
      print_r($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Clients($action, $id) {

    $this->load->model('clients_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->clients_model->get_by_id($id);
      print_r($items);
    } else if ($action == 'get-all') {
      $items = $this->clients_model->get_all(10, 5);
      print_r($items);
    } else if ($action == 'insta_client') {
      $items = $this->clients_model->get_insta_client_by_id($id);
      print_r($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Credit_card_status($action, $id) {
    $this->load->model('credit_card_status_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->credit_card_status_model->get_by_id($id);
      print_r($items);
    } else if ($action == 'get-all') {
      $items = $this->credit_card_status_model->get_all();
      print_r($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Daily_report($action, $id) {
    $this->load->model('daily_report_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->daily_report_model->get_by_id($id);
      print_r($items);
    } else if ($action == 'get-all') {
      $items = $this->daily_report_model->get_all(4);
      print_r($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Daily_work($action, $id) {

    $this->load->model('daily_work_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->daily_work_model->get_by_id($id);
      print_r($items);
    } else if ($action == 'get-all') {
      $items = $this->daily_work_model->get_all();
      print_r($items);
    } else if ($action == 'next') {
      $items = $this->daily_work_model->get_next_work();
      print_r($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Dumbu_statistic($action, $id) {

    $this->load->model('dumbu_statistic_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->dumbu_statistic_model->get_by_id($id);
      var_dump($items);
    } else if ($action == 'get-all') {
      $items = $this->dumbu_statistic_model->get_all();
      var_dump($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Dumbu_system_config($action, $id) {

    $this->load->model('Dumbu_system_config_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->Dumbu_system_config_model->get_by_id($id);
      //$items = $this->Dumbu_system_config_model->get_by_name('MIN_NEXT_ATTEND_TIME');
      var_dump($items);
    } else if ($action == 'get-all') {
      $items = $this->Dumbu_system_config_model->get_all();
      var_dump($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Faq($action, $id) {

    $this->load->model('Faq_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->Faq_model->get_by_id($id);
      var_dump($items);
    } else if ($action == 'get-all') {
      $items = $this->Faq_model->get_all();
      var_dump($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Payment_cause($action, $id) {

    $this->load->model('Payment_cause_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->Payment_cause_model->get_by_id($id);
      var_dump($items);
    } else if ($action == 'get-all') {
      $items = $this->Payment_cause_model->get_all();
      var_dump($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Payment_form($action, $id) {

    $this->load->model('Payment_form_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->Payment_form_model->get_by_id($id);
      var_dump($items);
    } else if ($action == 'get-all') {
      $items = $this->Payment_form_model->get_all();
      var_dump($items);
    } else {
      echo "action wrong!!!";
    }
  }

  private function e_Payment_gateway($action, $id) {

    $this->load->model('Payment_gateway_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id') {
      $items = $this->Payment_gateway_model->get_by_id($id);
      var_dump($items);
    } else if ($action == 'get-all') {
      $items = $this->Payment_gateway_model->get_all();
      var_dump($items);
    } else {
      echo "action wrong!!!";
    }
  }

  /* private function e_Payment_gateway_values($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Payments($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Plane($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  private function e_Proxy($action, $id) {

    $this->load->model('proxy_model');
    //$this->load->model('proxy_model', 'proxy');

    if ($action == 'get-by-id') {
      $items = $this->proxy_model->get_by_id($id);
      print_r($items);
    } else if ($action == 'get-all') {
      $items = $this->proxy_model->get_all();
      print_r($items);
    } else {
      echo "action wrong!!!";
    }
  }

  /* private function e_Ranking($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Reference_profile($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Reference_profiles_status($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Robot($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Salva_users($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Ticket_bank($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Ticket_peixe_urbano_status($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Translation($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_User_role($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_User_status($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Users($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Washdog1($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Washdog($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Washdog_type($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Worker($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */

  /* private function e_Worker_robot($action, $id)
    {

    $this->load->model('?_model');
    //$this->load->model('?_model', '?');

    if ($action == 'get-by-id')
    {
    $items = $this->?_model->get_by_id($id);
    var_dump($items);
    }
    else if ($action == 'get-all'){
    $items = $this->?_model->get_all();
    var_dump($items);
    }
    else {
    echo "action wrong!!!";
    }
    } */
}
