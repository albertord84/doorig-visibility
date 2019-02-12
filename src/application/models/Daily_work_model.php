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

  function get_next_work() {
    $where = "(daily_work.to_follow  > 0 OR daily_work.to_unfollow  > 0) AND reference_profile.deleted <> TRUE";    
    /*
     *   . "   users.id as users_id, "
              . "   clients.cookies as client_cookies, "
              . "   reference_profile.insta_id as rp_insta_id, "
              . "   reference_profile.type as rp_type, "
              . "   reference_profile.id as rp_id "
     */
    $this->db->select("clients.cookies as cookies,"
                     ."clients.user_id as user_id,"
                     . "clients.last_access as client_last_access,"
                     ."reference_profile.insta_id as rp_insta_id,"
                     ."reference_profile.type as rp_type,"
                     . "reference_profile.id as rp_id,"
                     . "clients.insta_id as insta_id,"
                     . "daily_work.to_follow,daily_work.to_unfollow");
    $this->db->join('reference_profile', 'reference_profile.id = daily_work.reference_id');
    $this->db->join('clients', 'clients.user_id = reference_profile.client_id');
    $this->db->where($where);
    $this->db->order_by("clients.last_access asc","reference_profile.last_access asc");
    $query = $this->db->get('daily_work');
    return $query->row();
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

