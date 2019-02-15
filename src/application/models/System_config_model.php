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
class System_config_model extends CI_Model {

    function construct() {
        parent::construct();
    }

    public function load() {
        $vars = new stdClass();
        $this->load->database();
        $this->db->select('*');
        $this->db->from('dumbu_system_config');
        $result = $this->db->get()->result_array();
        if ($result) {
            foreach ($result as $var_info) {
                $vars->{$var_info["name"]} = $var_info["value"];
            }
        } else {
            die("Can't load system config vars...!!");
        }
        return $vars;
    }

}
