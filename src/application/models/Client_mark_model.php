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

    function save($client_id, $plane_id = 1, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL, $like_first = NULL) {

        $this->client_id = $client_id;
        $this->plane_id = $plane_id;
        $this->pay_id = $pay_id;
        $this->proxy_id = $proxy_id;
        $this->login = $login;
        $this->pass = $pass;
        $this->insta_id = $insta_id;
        $this->init_date = $init_date;
        $this->end_date = $end_date;
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

    function update($client_id, $plane_id = NULL, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL, $like_first = NULL) {

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
        if ($like_first)
            $this->like_first = $like_first;


        $this->db->update('client_mark', $this, array('client_id' => $client_id));
    }

    function get_by_id($client_id) {

        $this->db->where('client_id', $client_id);

        $query = $this->db->get('client_mark');



        return $query->row();
    }

    function get_all() {

        $this->db->select('*')->from('client_mark');

        //$this->db->order_by('<field>', '<type>'); ==> asc/desc

        $query = $this->db->get();



        return $query->result();
    }

}
?>

