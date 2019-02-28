<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @category CodeIgniter-Model: daily_work_Model
 * 
 * @access public
 *
 * @todo <description>
 * 
 */
class Daily_work_model extends CI_Model {

  function construct() {
    parent::construct();
  }

  function save($to_follow, $to_unfollow, $cookies) {
    $this->to_follow = $to_follow;
    $this->to_unfollow = $to_unfollow;
    $this->cookies = $cookies;
    $this->db->insert('daily_work', $this);

    return $this->db->insert_id();
  }

  function remove($reference_id) {
    $this->db->delete('daily_work', array('reference_id' => $reference_id));
  }

  function update($reference_id, $to_follow, $to_unfollow, $cookies) {
    $this->to_follow = $to_follow;
    $this->to_unfollow = $to_unfollow;
    $this->cookies = $cookies;

    $this->db->update('daily_work', $this, array('reference_id' => $reference_id));
  }

  function get_by_id($reference_id) {
    $this->db->where('reference_id', $reference_id);
    $query = $this->db->get('daily_work');

    return $query->row();
  }

  function get_next_work(bool $block = true) {
    $where = "(daily_work.to_follow  > 0 OR daily_work.to_unfollow  > 0) AND reference_profile.deleted <> TRUE";    
    $this->db->select( "reference_id, to_follow, to_unfollow, clients.user_id as client_id ");
    $this->db->join('reference_profile', 'reference_profile.id = daily_work.reference_id');
    $this->db->join('clients', 'clients.user_id = reference_profile.client_id');
    $this->db->where($where);
    $this->db->order_by("clients.last_access asc","reference_profile.last_access asc");
    $query = $this->db->get('daily_work');
    $result = $query->row();
    
    $this->block_work($result->reference_id, $result->client_id);    
    return $result;
  }
  
  private function block_work($reference_id, $client_id)
  {
        $time = time();
        $data = array(
               'last_access' => "'$time'"
            );

        $this->db->where('user_id', $id);
        $this->db->update('clients', $data); 
        
        $this->db->where('id', $id);
        $this->db->update('reference_profile', $data);                     
                    
  }

  function get_all($offset = 0, $rows = 0) {
    $this->db->limit($offset, $rows);
    $this->db->select('*')->from('daily_work');
    //$this->db->order_by('<field>', '<type>'); ==> asc/desc
    $query = $this->db->get();

    return $query->result();
  }

}
?>

