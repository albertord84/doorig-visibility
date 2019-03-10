<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @category CodeIgniter-Model: black_and_white_list_Model
 * 
 * @access public
 *
 * @todo <description>
 * 
 */
class Black_and_white_list_model extends CI_Model {

    function construct() {
        parent::construct();
    }

    function save($client_id, $insta_id, $profile, $init_date = NULL, $end_date = NULL, $deleted = NULL, $black_or_white = NULL) {
        $this->client_id = $client_id;
        $this->insta_id = $insta_id;
        $this->profile = $profile;
        $this->init_date = $init_date;
        $this->end_date = $end_date;
        $this->deleted = $deleted;
        $this->black_or_white = $black_or_white;
        $this->db->insert('black_and_white_list', $this);

        return $this->db->insert_id();
    }

    function remove($id) {
        $this->db->delete('black_and_white_list', array('id' => $id));
    }

    function update($id, $client_id, $insta_id, $profile, $init_date = NULL, $end_date = NULL, $deleted = NULL, $black_or_white = NULL) {
        $this->client_id = $client_id;
        $this->insta_id = $insta_id;
        if ($profile)
            $this->profile = $profile;
        if ($init_date)
            $this->init_date = $init_date;
        if ($end_date)
            $this->end_date = $end_date;
        if ($deleted)
            $this->deleted = $deleted;
        if ($black_or_white)
            $this->black_or_white = $black_or_white;

        $this->db->update('black_and_white_list', $this, array('id' => $id));
    }

    function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('black_and_white_list');

        return $query->row();
    }

    function get_by_insta_id($insta_id, $client_id) {
        $this->db->where('client_id', $client_id);
        $this->db->where('insta_id', $insta_id);
        $query = $this->db->get('reference_profile');

        return $query->last_row();
    }

    function get_all($ClientId, $offset = 0, $rows = 0) {
        //$this->db->limit($offset, $rows); //solo usar si esas variables fueran diferentes de 0

        $this->db->where('client_id', $ClientId);
        $this->db->where('deleted', 0);

        $this->db->select('*')->from('black_and_white_list');
        $query = $this->db->get();

        return $query->result();
    }

}
?>

