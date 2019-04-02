<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * @category CodeIgniter-Model: client_mark_Model

 * 

 * @access public

 * @todo <description>

 * 

 */
class Client_mark_model extends CI_Model {

    function construct() {

        parent::construct();
    }

    function save($client_id, $plane_id = 1, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $pay_day = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL, $like_first = NULL) {

        $this->client_id = $client_id;
        $this->plane_id = $plane_id;
        $this->pay_id = $pay_id;
        $this->proxy_id = $proxy_id;
        $this->login = $login;
        $this->pass = $pass;
        $this->insta_id = $insta_id;
        $this->init_date = $init_date;
        $this->end_date = $end_date;
        $this->pay_day = $pay_day;
        $this->cookies = $cookies;
        $this->observation = $observation;
        $this->purchase_counter = $purchase_counter;
        $this->last_access = $last_access;
        $this->insta_followers_ini = $insta_followers_ini;
        $this->insta_following = $insta_following;
        $this->like_first = $like_first;


        $this->db->insert('client_mark', $this);



        return $this->db->insert_id();
    }

    function remove($id) {

        $this->db->delete('client_mark', array('id' => $id));
    }

    function update($client_id, $plane_id = NULL, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $pay_day = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL, $like_first = NULL) {

        $this->client_id = $client_id;
        if ($plane_id)
            $this->plane_id = $plane_id;
        if ($pay_id)
            $this->pay_id = $pay_id;
        if ($proxy_id)
            $this->proxy_id = $proxy_id;
        if ($login)
            $this->login = $login;
        if ($pass)
            $this->pass = $pass;
        if ($insta_id)
            $this->insta_id = $insta_id;
        if ($init_date)
            $this->init_date = $init_date;
        if ($end_date)
            $this->end_date = $end_date;
        if ($pay_day)
            $this->pay_day = $pay_day;
        if ($cookies)
            $this->cookies = $cookies;
        if ($observation)
            $this->observation = $observation;
        if ($purchase_counter)
            $this->purchase_counter = $purchase_counter;
        if ($last_access)
            $this->last_access = $last_access;
        if ($insta_followers_ini)
            $this->insta_followers_ini = $insta_followers_ini;
        if ($insta_following)
            $this->insta_following = $insta_following;
        if ($like_first !== NULL)
            $this->like_first = $like_first;


        $this->db->update('client_mark', $this, array('client_id' => $client_id));
    }

    function get_by_id($client_id) {

        $this->db->where('client_id', $client_id);

        $query = $this->db->get('client_mark');



        return $query->row();
    }

    function get_by_insta_id($insta_id) {

        $this->db->where('insta_id', $insta_id);

        $query = $this->db->get('client_mark');



        return $query->row();
    }

    function get_all_id() {

        $this->db->select('client_id')->from('client_mark');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

    function load_doorig_follows($client_id) {

        $this->db->where('client_id', $client_id);

        $this->db->select('sum(*) as Count')->from('reference_profile');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result_array()[0]['Count'];
    }

    function get_all() {

        $this->db->select('*')->from('client_mark');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

    function get_all_by_status($status_id) {

        $this->db->join('client_status_list', "client_status_list.client_id = client_mark.client_id");
        $this->db->where('client_status_list.active', 1);

        $this->db->select('client_mark.*')->from('client_mark')->distinct();

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

    function create_followed_table($client_id) {
        $followed_db = $this->load->database('followed', TRUE);
        $dbforge = $this->load->dbforge($followed_db, TRUE);
        $fields = array(
            'followed_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'reference_id' => array(
                'type' => 'INT',
                'constraint' => '6'
            ),
            'date' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'unfollowed' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
            ),
            'followed_login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
        ));
        $dbforge->add_field($fields);
        $dbforge->add_field('id');
        $dbforge->create_table("`$client_id`", TRUE);
    }

    function get_followed($client_id, $profile_id) {
        $followed_db = $this->load->database('followed', TRUE);
        $followed_db->where('followed_id', $profile_id);
        $query = $followed_db->get("`$client_id`");
        return $query->result();
    }

}
?>

