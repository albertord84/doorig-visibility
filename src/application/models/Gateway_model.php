<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * @category CodeIgniter-Model: gateway_Model

 * 

 * @access public

 * @todo <description>

 * 

 */
class Gateway_model extends CI_Model {

    function construct() {

        parent::construct();
    }

    function save($name, $api_url, $api_sandbox_url, $merchant_key, $description) {

        $this->name = $name;
        $this->api_url = $api_url;
        $this->api_sandbox_url = $api_sandbox_url;
        $this->merchant_key = $merchant_key;
        $this->description = $description;


        $this->db->insert('gateway', $this);



        return $this->db->insert_id();
    }

    function remove($id) {

        $this->db->delete('gateway', array('id' => $id));
    }

    function update($id, $name, $api_url, $api_sandbox_url, $merchant_key, $description) {

        $this->name = $name;
        $this->api_url = $api_url;
        $this->api_sandbox_url = $api_sandbox_url;
        $this->merchant_key = $merchant_key;
        $this->description = $description;


        $this->db->update('gateway', $this, array('id' => $id));
    }

    function get_by_id($id) {

        $this->db->where('id', $id);

        $query = $this->db->get('gateway');



        return $query->row();
    }

    function get_all() {

        $this->db->select('*')->from('gateway');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

}
?>

