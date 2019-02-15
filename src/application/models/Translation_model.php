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
class Translation_model extends CI_Model {

    public $language = NULL;

    function construct() {
        parent::construct();
    }

    public function get_text_by_token($token, $lang = "PT") {
        if($lang==='PT')
            $this->language ='portugues';
        else
        if($lang==='EN')
            $this->language ='ingles';
        else
        if($lang==='ES')
                $this->language ='espanol';
            
        $this->db->select($this->language);
        $this->db->from('translation');
        $this->db->where('token', $token);
        $string = $this->db->get()->row_array();

        if (!count($string)) {
            $data['token'] = $token;
            $data['portugues'] = $token;
            $data['ingles'] = 'Not traduction yet';
            $data['espanol'] = 'Not traduction yet';
            $this->db->insert('translation', $data);
        } else
            return $string[$this->language];
    }

}
