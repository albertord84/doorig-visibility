<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * @category CodeIgniter-Model: clients_modules_Model

 * 

 * @access public

 * @todo <description>

 * 

 */
class Clients_modules_model extends CI_Model {

    function construct() {

        parent::construct();
    }

    function save($client_id, $module_id, $active, $init_date, $end_date) {

        $this->client_id = $client_id;
        $this->module_id = $module_id;
        $this->active = $active;
        $this->init_date = $init_date;
        $this->end_date = $end_date;


        $this->db->insert('clients_modules', $this);



        return $this->db->insert_id();
    }

    function remove($id) {

        $this->db->delete('clients_modules', array('id' => $id));
    }

    function update($id, $client_id, $module_id, $active, $init_date, $end_date) {

        $this->client_id = $client_id;
        $this->module_id = $module_id;
        $this->active = $active;
        $this->init_date = $init_date;
        $this->end_date = $end_date;


        $this->db->update('clients_modules', $this, array('id' => $id));
    }

    function get_by_id($id) {

        $this->db->where('id', $id);

        $query = $this->db->get('clients_modules');



        return $query->row();
    }

    function get_all() {

        $this->db->select('*')->from('clients_modules');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

}
?>

