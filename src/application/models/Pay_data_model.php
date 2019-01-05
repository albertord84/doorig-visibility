<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * @category CodeIgniter-Model: pay_data_Model

 * 

 * @access public

 * @todo <description>

 * 

 */
class Pay_data_model extends CI_Model {

    function construct() {

        parent::construct();
    }

    function save($client_id, $gateway_id, $customer_id, $cpf) {

        $this->client_id = $client_id;
        $this->gateway_id = $gateway_id;
        $this->customer_id = $customer_id;
        $this->cpf = $cpf;


        $this->db->insert('pay_data', $this);



        return $this->db->insert_id();
    }

    function remove($id) {

        $this->db->delete('pay_data', array('id' => $id));
    }

    function update($id, $client_id, $gateway_id, $customer_id, $cpf) {

        $this->client_id = $client_id;
        $this->gateway_id = $gateway_id;
        $this->customer_id = $customer_id;
        $this->cpf = $cpf;


        $this->db->update('pay_data', $this, array('id' => $id));
    }

    function get_by_id($id) {

        $this->db->where('id', $id);

        $query = $this->db->get('pay_data');



        return $query->row();
    }

    function get_all() {

        $this->db->select('*')->from('pay_data');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

}
?>

