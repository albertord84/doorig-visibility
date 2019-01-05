<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * @category CodeIgniter-Model: modules_Model

 * 

 * @access public

 * @todo <description>

 * 

 */
class Modules_model extends CI_Model {

    function construct() {

        parent::construct();
    }

    function save($name, $description) {

        $this->name = $name;
        $this->description = $description;


        $this->db->insert('modules', $this);



        return $this->db->insert_id();
    }

    function remove($id) {

        $this->db->delete('modules', array('id' => $id));
    }

    function update($id, $name, $description) {

        $this->name = $name;
        $this->description = $description;


        $this->db->update('modules', $this, array('id' => $id));
    }

    function get_by_id($id) {

        $this->db->where('id', $id);

        $query = $this->db->get('modules');



        return $query->row();
    }

    function get_all() {

        $this->db->select('*')->from('modules');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

}
?>

