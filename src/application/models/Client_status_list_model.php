<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * @category CodeIgniter-Model: client_status_list_Model

 * 

 * @access public

 * @todo <description>

 * 

 */
class Client_status_list_model extends CI_Model {

    function construct() {

        parent::construct();
    }

    function save($client_id, $client_status_id, $active = 1, $start_date = NULL, $end_date = NULL) {

        $this->client_id = $client_id;
        $this->client_status_id = $client_status_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->active = $active;


        $this->db->insert('client_status_list', $this);



        return $this->db->insert_id();
    }

    function remove($id) {

        $this->db->delete('client_status_list', array('id' => $id));
    }

    function update($id, $client_id = NULL, $client_status_id = NULL, $active = NULL, $start_date = NULL, $end_date = NULL) {

        if ($client_id)
            $this->client_id = $client_id;
        if ($client_status_id)
            $this->client_status_id = $client_status_id;
        if ($start_date)
            $this->start_date = $start_date;
        if ($end_date)
            $this->end_date = $end_date;
        if ($active !== NULL)
            $this->active = $active;

        $this->db->update('client_status_list', $this, array('id' => $id));
    }

    function get_by_id($id) {

        $this->db->where('id', $id);

        $query = $this->db->get('client_status_list');



        return $query->row();
    }

    function get_by_client_status_id($client_id, $client_status_id) {

        $this->db->where('client_id', $client_id);
        $this->db->where('client_status_id', $client_status_id);

        $query = $this->db->get('client_status_list');



        return $query->row();
    }

    function get_all($client_id, $active = 1) {

        $this->db->where('client_id', $client_id);
        $this->db->where('active', $active);

        $this->db->select('*')->from('client_status_list');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

}
?>

