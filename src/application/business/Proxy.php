<?php

namespace business {

    require_once config_item('business-loader-class');
    require_once config_item('thirdparty-proxy-resource');

    /*     * x
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Proxy business class.
     * 
     */

    class Proxy extends Loader {

        public $Id;
        public $Ip;
        public $Port;
        public $User;
        public $Password;
        public $IsReserved;

        function __construct(int $id = NULL) {
            $ci = &get_instance();
            $ci->load->model('proxy_model');

            $this->Id = $id;
        }

        public function load_data() {
            //$this->Id = $id ? $id : $this->Id;

            $ci = &get_instance();
            $data = $ci->proxy_model->get_by_id($this->Id);

            if ($data)
                $this->fill_data($data);
        }

        public function fill_data(\stdClass $data) {
            $this->Id = $data->idProxy;
            $this->Ip = $data->proxy;
            $this->Port = $data->port;
            $this->User = $data->proxy_user;
            $this->Password = $data->proxy_password;
            $this->IsReserved = $data->isReserved;
        }

        public function save_data() {
            
        }

        public function ToString() {
            return "--proxy '$this->User:$this->Password@$this->Ip:$this->Port'";
        }

        public static function ProxysCount() {
            $ci = &get_instance();
            $ci->load->model('proxy_model');
            return $ci->proxy_model->count();
        }

        public function getApiProxy() {
            if ($this->Id == NULL)
                return null;
            else {
                return new \InstaApiWeb\Proxy($this->Ip, $this->Port, $this->User, $this->Password);
            }
        }

    }

}    