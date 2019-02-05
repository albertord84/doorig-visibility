<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * @category CodeIgniter-Model: clients_Model

 * 

 * @access public

 * @todo <description>

 * 

 */
class Clients_model extends CI_Model {

    function construct() {

        parent::construct();
    }

    function save($pay_id, $login_token) {

        $this->pay_id = $pay_id;
        $this->login_token = $login_token;


        $this->db->insert('clients', $this);



        return $this->db->insert_id();
    }

    function remove($id) {

        $this->db->delete('clients', array('id' => $id));
    }

    function update($id, $pay_id, $login_token) {

        $this->pay_id = $pay_id;
        $this->login_token = $login_token;


        $this->db->update('clients', $this, array('id' => $id));
    }

    function get_by_id($id) {

        $this->db->where('id', $id);

        $query = $this->db->get('clients');



        return $query->row();
    }

    function get_all() {

        $this->db->select('*')->from('clients');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

}
?>

