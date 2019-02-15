<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

use business\UserRole;
use business\UserStatus;

/**
 * @category CodeIgniter-Model: clients_Model
 * 
 * @access public
 *
 * @todo <description>
 * 
 */
class Clients_model extends CI_Model {

  function construct() {
    parent::construct();
    
    require_once config_item('db-exception-class');
    require_once config_item('business-user_role-class');
    require_once config_item('business-user_status-class');
  }

  function save($plane_id, $credit_card_number, $credit_card_status_id, $credit_card_cvc, $credit_card_name, $credit_card_exp_month, $credit_card_exp_year, $pay_day, $initial_order_key, $order_key, $pending_order_key, $actual_payment_value, $insta_id, $insta_followers_ini, $insta_following, $http_server_vars, $foults, $last_access, $cookies, $utm_source, $unfollow, $observation, $unfollow_total, $like_first, $paused, $ticket_peixe_urbano, $ticket_peixe_urbano_status_id, $purchase_counter, $retry_payment_counter, $purchase_access_token, $ticket_access_token, $retry_registration_counter, $proxy, $mundi_to_vindi) {
    $this->plane_id = $plane_id;
    $this->credit_card_number = $credit_card_number;
    $this->credit_card_status_id = $credit_card_status_id;
    $this->credit_card_cvc = $credit_card_cvc;
    $this->credit_card_name = $credit_card_name;
    $this->credit_card_exp_month = $credit_card_exp_month;
    $this->credit_card_exp_year = $credit_card_exp_year;
    $this->pay_day = $pay_day;
    $this->initial_order_key = $initial_order_key;
    $this->order_key = $order_key;
    $this->pending_order_key = $pending_order_key;
    $this->actual_payment_value = $actual_payment_value;
    $this->insta_id = $insta_id;
    $this->insta_followers_ini = $insta_followers_ini;
    $this->insta_following = $insta_following;
    $this->http_server_vars = $http_server_vars;
    $this->foults = $foults;
    $this->last_access = $last_access;
    $this->cookies = $cookies;
    $this->utm_source = $utm_source;
    $this->unfollow = $unfollow;
    $this->observation = $observation;
    $this->unfollow_total = $unfollow_total;
    $this->like_first = $like_first;
    $this->paused = $paused;
    $this->ticket_peixe_urbano = $ticket_peixe_urbano;
    $this->ticket_peixe_urbano_status_id = $ticket_peixe_urbano_status_id;
    $this->purchase_counter = $purchase_counter;
    $this->retry_payment_counter = $retry_payment_counter;
    $this->purchase_access_token = $purchase_access_token;
    $this->ticket_access_token = $ticket_access_token;
    $this->retry_registration_counter = $retry_registration_counter;
    $this->proxy = $proxy;
    $this->mundi_to_vindi = $mundi_to_vindi;
    $this->db->insert('clients', $this);

    return $this->db->insert_id();
  }

  function remove($user_id) {
    $this->db->delete('clients', array('user_id' => $user_id));
  }

  function update($user_id, $plane_id, $credit_card_number, $credit_card_status_id, $credit_card_cvc, $credit_card_name, $credit_card_exp_month, $credit_card_exp_year, $pay_day, $initial_order_key, $order_key, $pending_order_key, $actual_payment_value, $insta_id, $insta_followers_ini, $insta_following, $http_server_vars, $foults, $last_access, $cookies, $utm_source, $unfollow, $observation, $unfollow_total, $like_first, $paused, $ticket_peixe_urbano, $ticket_peixe_urbano_status_id, $purchase_counter, $retry_payment_counter, $purchase_access_token, $ticket_access_token, $retry_registration_counter, $proxy, $mundi_to_vindi) {
    $this->plane_id = $plane_id;
    $this->credit_card_number = $credit_card_number;
    $this->credit_card_status_id = $credit_card_status_id;
    $this->credit_card_cvc = $credit_card_cvc;
    $this->credit_card_name = $credit_card_name;
    $this->credit_card_exp_month = $credit_card_exp_month;
    $this->credit_card_exp_year = $credit_card_exp_year;
    $this->pay_day = $pay_day;
    $this->initial_order_key = $initial_order_key;
    $this->order_key = $order_key;
    $this->pending_order_key = $pending_order_key;
    $this->actual_payment_value = $actual_payment_value;
    $this->insta_id = $insta_id;
    $this->insta_followers_ini = $insta_followers_ini;
    $this->insta_following = $insta_following;
    $this->http_server_vars = $http_server_vars;
    $this->foults = $foults;
    $this->last_access = $last_access;
    $this->cookies = $cookies;
    $this->utm_source = $utm_source;
    $this->unfollow = $unfollow;
    $this->observation = $observation;
    $this->unfollow_total = $unfollow_total;
    $this->like_first = $like_first;
    $this->paused = $paused;
    $this->ticket_peixe_urbano = $ticket_peixe_urbano;
    $this->ticket_peixe_urbano_status_id = $ticket_peixe_urbano_status_id;
    $this->purchase_counter = $purchase_counter;
    $this->retry_payment_counter = $retry_payment_counter;
    $this->purchase_access_token = $purchase_access_token;
    $this->ticket_access_token = $ticket_access_token;
    $this->retry_registration_counter = $retry_registration_counter;
    $this->proxy = $proxy;
    $this->mundi_to_vindi = $mundi_to_vindi;

    $this->db->update('clients', $this, array('user_id' => $user_id));
  }

  function get_by_id($user_id) {
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('clients');

    return $query->row();
  }

  function get_all($offset = 0, $rows = 0) {
    $this->db->limit($offset, $rows);
    $this->db->select('*')->from('clients');
    //$this->db->order_by('<field>', '<type>'); ==> asc/desc
    $query = $this->db->get();

    return $query->result();
  }
  
  public function get_clients_by_status($user_status, $offset = 0, $rows = 50) {
    try {
      $sql = sprintf("SELECT * FROM users
                      INNER JOIN clients ON clients.user_id = users.id 
                      INNER JOIN plane ON plane.id = clients.plane_id 
                      WHERE users.status_id = '%d'
                      LIMIT %d, %d", $user_status, $offset, $rows);
      
      $query = $this->db->query($sql);
      return $query->result();
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function get_clients_data() {
    try {
      $CLIENT = UserRole::CLIENT;
      $ACTIVE = UserStatus::ACTIVE;
      $PENDING = UserStatus::PENDING;
      $VERIFY_ACCOUNT = UserStatus::VERIFY_ACCOUNT;
      $BLOCKED_BY_INSTA = UserStatus::BLOCKED_BY_INSTA;
      $BLOCKED_BY_TIME = UserStatus::BLOCKED_BY_TIME;
      $BEGINNER = UserStatus::BEGINNER;
      //$UNFOLLOW = UserStatus::UNFOLLOW;
      $sql = ""
            . "SELECT * FROM users "
            . "     INNER JOIN clients ON clients.user_id = users.id "
            . "     INNER JOIN plane ON plane.id = clients.plane_id "
            . "WHERE users.role_id = $CLIENT "
            . "     AND (clients.unfollow_total IS NULL OR clients.unfollow_total <> 1) "
            . "     AND ("
            . "          users.status_id = $ACTIVE OR "
            . "          users.status_id = $PENDING OR "
            . "          users.status_id = $VERIFY_ACCOUNT OR "
            . "          users.status_id = $BLOCKED_BY_INSTA OR "
            . "          users.status_id = $BLOCKED_BY_TIME"
            . "      ) "
            . "ORDER BY users.id; ";

      $query = $this->db->query($sql);
      return $query->result();
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function get_client_data($client_id) {
    try {
      $sql = ""
              . "SELECT * FROM users "
              . "     INNER JOIN clients ON clients.user_id = users.id "
              . "     INNER JOIN plane ON plane.id = clients.plane_id "
              . "WHERE users.id = $client_id; ";
      
      $query = $this->db->query($sql);
      return $query->row();
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function get_client_payment_data($client_id) {
    try {
      
      $sql = "SELECT * FROM users "
            . "     INNER JOIN clients ON clients.user_id = users.id "
            . "     INNER JOIN client_payment ON client_payment.dumbu_client_id = clients.user_id "
            . "     INNER JOIN plane ON plane.id = client_payment.dumbu_plane_id "
            . "WHERE users.id = $client_id; ";
      
      $query = $this->db->query($sql);
      return $query->row(); 
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function get_client_login_data($client_id) {
    try {

      $sql =  "SELECT id, login, pass, insta_id FROM users "
              ."INNER JOIN clients ON clients.user_id = users.id "
              ."WHERE users.id = $client_id; ";
      
      $query = $this->db->query($sql);
      return $query->row();
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function get_client_data_bylogin($login) {
    try {

      $sql = "SELECT * FROM clients "
              . "     INNER JOIN users ON clients.user_id = users.id "
              . "WHERE users.login LIKE '$login' "
              . "ORDER BY user_id DESC "
              . "LIMIT 1; ";
      
      $result = $this->db->query($sql);
      return $result->row();
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function get_client_proxy($client_id) {
    try {

      $sql = "SELECT * FROM clients "
              . "     INNER JOIN Proxy ON clients.proxy = Proxy.idProxy "
              . "WHERE user_id LIKE '$client_id';";
      
      $result = $this->db->query($sql);      
      return $result->row();
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function get_client_instaid_data($client_id) {
    try {

      $sql = "SELECT insta_id FROM clients "
            ."WHERE user_id = $client_id;";
      
      $query = $this->db->query($sql);      
      return $query->row();
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function get_client_with_orderkey($orderkey) {

    try {
      $sql = "SELECT * FROM  clients "
              . "WHERE  clients.order_key = '$orderkey';";
      $query = $this->db->query($sql);
      return $query->row();
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function get_proxy_plient_counts($proxy) {
    try {
      $BEGINNER = UserStatus::BEGINNER;
      $DELETED = UserStatus::DELETED;
      $sql = "SELECT COUNT(clients.user_id) as cnt FROM `doorig_visibility_db`.clients "
              . "INNER JOIN Proxy ON clients.proxy = Proxy.idProxy "
              . "INNER JOIN users ON user_id = users.id "
              . "WHERE `doorig_visibility_db`.Proxy.proxy = '$proxy' AND users.status_id NOT IN ($BEGINNER, $DELETED);";
      $query = $this->db->query($sql);
      return $query->row();
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function get_client_withou_proxy() {
    try {
      $BEGINNER = UserStatus::BEGINNER;
      $DELETED = UserStatus::DELETED;
      $sql = "SELECT user_id FROM  clients "
              . "INNER JOIN users ON user_id = users.id "
              . "WHERE proxy IS NULL AND users.status_id NOT IN ($BEGINNER, $DELETED);";
      $query = $this->db->query($sql);
      return $query->result();
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
   
  public function update_client_status($client_id, $status_id) {
    try {

      $status_date = time();
      $sql = "UPDATE users SET users.status_id   = $status_id, "
              . "users.status_date = '$status_date' "
              . "WHERE users.id = $client_id; ";

      $result = $this->db->query($sql);
      return $result;
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function update_client_status_by_login($login, $status_id) {
    try {

      $status_date = time();
      $sql = "UPDATE users "
              . "SET "
              . "      users.status_id   = $status_id, "
              . "      users.status_date = '$status_date' "
              . "WHERE users.login = '$login' "
              . "ORDER BY id DESC "
              . "LIMIT 1; ";

      $result = $this->db->query($sql);
//                if ($result)
//                    print "<br>Update client_status! status_date: $status_date <br>";
//                else
//                    print "<br>NOT UPDATED client_status!!!<br> $sql <br>";
      return $result;
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function update_client_cookies($client_id, $cookies) {
    try {

      $sql = "UPDATE clients SET clients.cookies = '$cookies' WHERE clients.user_id = '$client_id'";
      $result = $this->db->query($sql);
       
      return $result;
      
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function set_pasword($client_id, $password) {
    try {
      $sql = "UPDATE `doorig_visibility_db`.users SET pass='$password' WHERE id=$client_id";
      $result = $this->db->query($sql);
      return $result;
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function set_cookies_to_null($client_id) {
    try {
      $sql = "UPDATE `doorig_visibility_db`.clients SET cookies=NULL WHERE user_id=$client_id";
      $result = $this->db->query($sql);
      return $result;
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function set_client_last_access($client_id, $timestamp) {
    try {
      $sql = "UPDATE `doorig_visibility_db`.clients SET last_access='$timestamp' WHERE user_id=$client_id";
      $result = $this->db->query($sql);
      return $result;
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function cmd_increase_client_last_access($client_id, $hours = 1) {
    try {
      $timestamp = strtotime("+$hours hours", time());
      $this->set_client_last_access($client_id, $timestamp);
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function set_client_order_key($client_id, $order_key, $pay_day) {
    try {
      $sql = "UPDATE `doorig_visibility_db`.clients SET pay_day='$pay_day', order_key='$order_key' WHERE user_id='$client_id';";
      $result = $this->db->query($sql);
      return $result;
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  public function set_proxy_to_client($client_id, $proxy_id) {
    try {
      $sql = "UPDATE clients SET clients.proxy = $proxy_id WHERE clients.user_id = $client_id;";
      $result = $this->db->query($sql);
      return $result;
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function save_http_server_vars($client_id, $HTTP_SERVER_VARS) {
    try {
      $sql = "UPDATE `doorig_visibility_db`.clients SET HTTP_SERVER_VARS='$HTTP_SERVER_VARS' WHERE user_id=$client_id";
      $result = $this->db->query($sql);
      return $result;
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
  
  public function cmd_add_observation($client_id, $observation) {
    try {
          $sql = "UPDATE clients SET observation='$observation' WHERE user_id=$client_id";
          $result = $this->db->query($sql);
          return $result;
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }
}
?>

