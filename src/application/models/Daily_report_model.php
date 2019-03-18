<?php

use business\UserStatus;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @category CodeIgniter-Model: daily_report_Model
 * 
 * @access public
 *
 * @todo <description>
 * 
 */
class Daily_report_model extends CI_Model {

    function construct() {
        parent::construct();
    }

    function save($client_id, $followings = NULL, $followers = NULL, $date = NULL) {
        $this->client_id = $client_id;
        $this->followings = $followings;
        $this->followers = $followers;
        $this->date = $this->date ? $date : time();
        $this->db->insert('daily_report', $this);

        return $this->db->insert_id();
    }

    function remove($id) {
        $this->db->delete('daily_report', array('id' => $id));
    }

    function update($id, $client_id, $followings = NULL, $followers = NULL, $date = NULL) {
        $this->client_id = $client_id;
        $this->followings = $followings;
        $this->followers = $followers;
        $this->date = $date;

        $this->db->update('daily_report', $this, array('id' => $id));
    }

    function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('daily_report');

        return $query->row();
    }

    function get_all(int $client_id, $offset = 0, $rows = 0) {
        $this->db->limit($offset, $rows);

        //$this->db->join('your_mark', "your_mark.client_id = daily_report.client_id");
        //$this->db->where('status_id', UserStatus::ACTIVE);
        $this->db->where('client_id', $client_id);
        
        $this->db->select('*')->from('daily_report');
        //$this->db->order_by('<field>', '<type>'); ==> asc/desc
        $query = $this->db->get();        
        $result_org = $query->result_array();
        $N = count($result_org);
        $steep = ($N > $GLOBALS["sistem_config"]->SAMPLES_IN_CHART) ? (int)($N/$GLOBALS["sistem_config"]->SAMPLES_IN_CHART) - 1 : $N;
        $k=0;
        for($i=0;$i<$N;$i=$i+$steep){
            $result[$k++]=$result_org[$i];
        }
        return $result;
    }

}
?>

