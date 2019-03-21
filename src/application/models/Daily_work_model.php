<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @category CodeIgniter-Model: daily_work_Model
 * 
 * @access public
 *
 * @todo <description>
 * 
 */
class Daily_work_model extends CI_Model {

    function construct() {
        parent::construct();
    }

    function save($reference_id, $to_follow, $to_unfollow) {
        $this->to_follow = $to_follow;
        $this->to_unfollow = $to_unfollow;
        $this->reference_id = $reference_id;
        $this->db->insert('daily_work', $this);

        return $this->db->insert_id();
    }

    function remove($reference_id) {
        $this->db->delete('daily_work', array('reference_id' => $reference_id));
    }

    function update($reference_id, $to_follow, $to_unfollow, $cookies) {
        $this->to_follow = $to_follow;
        $this->to_unfollow = $to_unfollow;

        $this->db->update('daily_work', $this, array('reference_id' => $reference_id));
    }

    function update_follow($followed, $reference_id) {
        $this->to_follow = $followed;
        $this->db->update('daily_work', $this, array('reference_id' => $reference_id));
    }

    function update_unfollow($unfollowed, $reference_id) {
        $this->to_unfollow = $unfollowed;
        $this->db->update('daily_work', $this, array('reference_id' => $reference_id));
    }

    function get_by_id($reference_id) {
        $this->db->where('reference_id', $reference_id);
        $query = $this->db->get('daily_work');

        return $query->row();
    }

    function get_next_work(int $reference_profile_id = NULL, bool $block = true) {
        $time = time();
        $min_time = $GLOBALS['sistem_config']->MIN_NEXT_ATTEND_TIME*60*1000 + $time;
        $where = "(daily_work.to_follow  > 0 OR daily_work.to_unfollow  > 0) "
                . "AND reference_profile.deleted is not TRUE "
                . "AND (client_mark.last_access is NULL OR `client_mark`.`last_access` > $min_time )";
        if ($reference_profile_id !== NULL) {
            $where .= " AND reference_profile.id = $reference_profile_id";
        }
        $this->db->select("reference_id, to_follow, to_unfollow, client_mark.client_id ");
        $this->db->join('reference_profile', 'reference_profile.id = daily_work.reference_id');
        $this->db->join('client_mark', 'client_mark.client_id = reference_profile.client_id');
        $this->db->where($where);
        $this->db->order_by("client_mark.last_access asc", "reference_profile.last_access asc");
        $query = $this->db->get('daily_work');
        $result = $query->row();

        if ($block)
            $this->block_work($result->reference_id, $result->client_id);
        return $result;
    }

    private function block_work($reference_id, $client_id) {
        $time = time();
        $data = array(
            'last_access' => "'$time'"
        );

        $this->db->where('client_id', $client_id);
        $this->db->update('client_mark', $data);

        $this->db->where('id', $reference_id);
        $this->db->update('reference_profile', $data);
    }

    function get_all($offset = 0, $rows = 0) {
        $this->db->limit($rows, $offset);
        $this->db->select('*')->from('daily_work');
        //$this->db->order_by('<field>', '<type>'); ==> asc/desc
        $query = $this->db->get();

        return $query->result();
    }

    function get_unfollowed_list(string $client_id) {
        $cnt = $GLOBALS['sistem_config']->REQUESTS_AT_SAME_TIME;
        $Elapsed_time_limit = $GLOBALS['sistem_config']->UNFOLLOW_ELAPSED_TIME_LIMIT;
        $followed_db = $this->load->database('followed', TRUE);
        $followed_db->where("unfollowed = false AND ((UNIX_TIMESTAMP(NOW()) - CAST(date AS INTEGER)) DIV 60 DIV 60) > $Elapsed_time_limit");
        $followed_db->limit($cnt);
        $followed_db->select('*')->from("`$client_id`");
        $query = $followed_db->get();
        return $query->result();
    }

    function save_follow(int $client_id, int $reference_profile_id, string $profile, string $insta_id) {
        $followed_db = $this->load->database('followed', TRUE);
        $followed_db->insert("`$client_id`",
                array('reference_id' => $reference_profile_id,
                    'followed_id' => $insta_id,
                    'date' => time(),
                    'unfollowed' => 0,
                    'followed_login' => $profile
        ));
    }

    function save_unfollow(int $client_id, int $profile_id) {
        $followed_db = $this->load->database('followed', TRUE);
        $followed_db->where('followed_id', $profile_id);
        $data = array('unfollowed' => 1);
        $followed_db->update("`$client_id`", $data);
    }

    function truncate() {
        $this->db->truncate('daily_work');
    }

}
?>

