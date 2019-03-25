<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @category CodeIgniter-Model: client_payment_Model
 * 
 * @access public
 *
 * @todo <description>
 * 
 */
class Client_payment_model extends CI_Model {

    function construct() {
        parent::construct();
    }

    function save($client_id, $gateway_client_id = NULL, $plane_id = NULL, $payment_key = NULL, $gateway_id = NULL) {
        $this->client_id = $client_id;
        $this->gateway_client_id = $gateway_client_id;
        $this->plane_id = $plane_id;
        $this->payment_key = $payment_key;
        $this->gateway_id = $gateway_id;
        $this->db->insert('client_payment', $this);

        return $this->db->insert_id();
    }

    function remove($client_id) {
        $this->db->delete('client_payment', array('client_id' => $client_id));
    }

    function update($client_id, $gateway_client_id = NULL, $plane_id = NULL, $payment_key = NULL, $gateway_id = NULL) {
        if ($gateway_client_id)
            $this->gateway_client_id = $gateway_client_id;
        if ($plane_id)
            $this->plane_id = $plane_id;
        if ($payment_key)
            $this->payment_key = $payment_key;
        if ($gateway_id)
            $this->gateway_id = $gateway_id;

        $this->db->update('client_payment', $this, array('client_id' => $client_id));
    }

    function get_by_id($client_id) {
        $this->db->where('client_id', $client_id);
        $query = $this->db->get('client_payment');

        return $query->row();
    }

    function get_by_gateway_client_id($gateway_client_id) {
        $this->db->where('gateway_client_id', $gateway_client_id);
        $query = $this->db->get('client_payment');

        return $query->row();
    }

    function get_all($offset = 0, $rows = 0) {
        $this->db->limit($offset, $rows);
        $this->db->select('*')->from('client_payment');
        //$this->db->order_by('<field>', '<type>'); ==> asc/desc
        $query = $this->db->get();

        return $query->result();
    }

}
?>

