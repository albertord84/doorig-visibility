<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace business {

    require_once config_item('business-loader-class');
    require_once config_item('business-plane-class');
    require_once config_item('business-proxy-class');
    require_once config_item('business-payment-class');
    require_once config_item('business-client-class');
    require_once config_item('business-user_status-class');
    require_once config_item('business-client_status_list-class');
    require_once config_item('thirdparty-cookies-resource');

    use InstaApiWeb\Cookies;

    /**
     * Description of SimpleClient
     *
     * @author jose
     */
    class MarkInfo extends Loader {

        public $insta_id;
        public $client_id;
        public $plane_id = NULL;
        public $pay_id = NULL;
        public $proxy_id = NULL;
        public $login = NULL;
        public $pass = NULL;
        public $init_date = NULL;
        public $end_date = NULL;
        public $cookies = NULL;
        public $observation = NULL;
        public $purchase_counter = NULL;
        public $last_access = NULL;
        public $insta_followers_ini = NULL;
        public $insta_following = NULL;
        public $like_first = NULL;
        
        public $Plane;
        public $Status;
        public $Client;

        function __construct(Client &$client) {
            $ci = &get_instance();
            $ci->load->model('client_mark_model');
            $this->Client = $client;
            $this->load_data();
            $this->Plane = new Plane($this->plane_id);
            $this->Plane->load_data();
            $this->Payment = new Payment($this->pay_id);
            $this->Payment->load_data();
            $this->Proxy = new Proxy($this->proxy_id);
            $this->Proxy->load_data();
            $this->Status = new ClientStatusList($this->Client);
            $this->Status->load_data();
        }

        /**
         * Get client data
         * @param int $client_id
         * @return DataSet  
         */
        public function load_data() {
            parent::load_data();
            
            $ci = &get_instance();
            $data = $ci->client_mark_model->get_by_id($this->Client->Id);

            if ($data)
                $this->fill_data($data);
            return $data;
        }

        /**
         * Get client data
         * @param int $client_id
         * @return DataSet  
         */
        public function load_data_by_insta_id(string $insta_id = NULL) {
            parent::load_data();
            
            $this->insta_id = $insta_id ? $insta_id : $this->insta_id;
            
            $ci = &get_instance();
            $data = $ci->client_mark_model->get_by_insta_id($this->Client->Id);

            if ($data)
                $this->fill_data($data);
            return $data;
        }

        protected function fill_data(\stdClass $data) {
            $this->client_id = $data->client_id;
            $this->plane_id = $data->plane_id;
            $this->pay_id = $data->pay_id;
            $this->proxy_id = $data->proxy_id;
            $this->login = $data->login;
            $this->pass = $data->pass;
            $this->insta_id = $data->insta_id;
            $this->init_date = $data->init_date;
            $this->end_date = $data->end_date;
            $this->cookies = $data->cookies;
            $this->observation = $data->observation;
            $this->purchase_counter = $data->purchase_counter;
            $this->last_access = $data->last_access;
            $this->insta_followers_ini = $data->insta_followers_ini;
            $this->insta_following = $data->insta_following;
            $this->like_first = $data->like_first;
            
            $this->Cookies = new Cookies($data->cookies);
        }

        public function setLikeFirst(bool $like_first = TRUE) {
            $ci = &get_instance();
            $ci->load->model('client_mark_model');
            $ci->client_mark_model->update($this->Client->Id, $plane_id = NULL, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL, $like_first);
            
            $this->like_first = $like_first;
        }

        public function remove() {
            $this->Status->add_item($this->insta_id, $this->client_id, time(), UserStatus::DELETED);
        }

    }

}