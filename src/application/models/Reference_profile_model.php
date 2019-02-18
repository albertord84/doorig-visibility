<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @category CodeIgniter-Model: reference_profile_Model
 * 
 * @access public
 * 
 * @todo <description>
 * 
 */
class Reference_profile_model extends CI_Model {

    function construct() {
        parent::construct();
    }

    function save($insta_name, $insta_id, $status_id, $client_id, $insta_follower_cursor, $deleted, $end_date, $follows, $type, $last_access) {
        $this->insta_name = $insta_name;
        $this->insta_id = $insta_id;
        $this->status_id = $status_id;
        $this->client_id = $client_id;
        $this->insta_follower_cursor = $insta_follower_cursor;
        $this->deleted = $deleted;
        $this->end_date = $end_date;
        $this->follows = $follows;
        $this->type = $type;
        $this->last_access = $last_access;
        $this->db->insert('reference_profile', $this);

        return $this->db->insert_id();
    }

    function remove($id) {
        $this->deleted = 1;
        $this->end_date = time();
        $this->status_id = 4;  // DELETED
        $this->db->update('reference_profile', $this, array('id' => $id));
        //$this->db->delete('reference_profile', array('id' => $id));
    }

    function update($id, $insta_name, $insta_id, $status_id, $client_id, $insta_follower_cursor, $deleted, $end_date, $follows, $type, $last_access) {
        $this->insta_name = $insta_name;
        $this->insta_id = $insta_id;
        $this->status_id = $status_id;
        $this->client_id = $client_id;
        $this->insta_follower_cursor = $insta_follower_cursor;
        $this->deleted = $deleted;
        $this->end_date = $end_date;
        $this->follows = $follows;
        $this->type = $type;
        $this->last_access = $last_access;

        $this->db->update('reference_profile', $this, array('id' => $id));
    }

    function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('reference_profile');

        return $query->row();
    }

    function get_all($ClientId, $status = 0, $offset = 0, $rows = 0) {
        $this->db->limit($offset, $rows);

        $this->db->where('client_id', $ClientId);
        if ($status != 0)
            $this->db->where('status_id', $status);

        $this->db->select('*')->from('reference_profile');
        //$this->db->order_by('<field>', '<type>'); ==> asc/desc
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_id($ClientId, $status = 0, $type = -1, $offset = 0, $rows = 0) {
        $this->db->limit($offset, $rows);

        $this->db->where('client_id', $ClientId);
        if ($status != 0)  // Return specific status if != 0,  else return all
            $this->db->where('status_id', $status);
        if ($type != -1)   // Return specific type if != -1,  else return all
            $this->db->where('type', $type);

        $this->db->select('id')->from('reference_profile');
        //$this->db->order_by('<field>', '<type>'); ==> asc/desc
        $query = $this->db->get();

        return $query->result();
    }

}
?>

