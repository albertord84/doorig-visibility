<?php

namespace business {

    require_once config_item('business-loader-class');

    /*     * x
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Proxy business class.
     * 
     */

    class Payment extends Loader {

        public $client_id, $gateway_client_id, $plane_id, $payment_key, $gateway_id;

        function __construct(int $client_id = NULL) {
            $ci = &get_instance();
            $ci->load->model('Client_payment_model');

            $this->client_id = $client_id;
        }

        public function load_data() {
            //$this->Id = $id ? $id : $this->Id;

            $ci = &get_instance();
            $data = $ci->Client_payment_model->get_by_id($this->client_id);

            if ($data)
                $this->fill_data($data);
        }

        public function fill_data(\stdClass $data) {
            $this->client_id = $data->client_id;
            $this->gateway_client_id = $data->gateway_client_id;
            $this->dumbu_plane_id = $data->plane_id;
            $this->payment_key = $data->payment_key;
            $this->gateway_id = $data->gateway_id;
        }

        public function save_data() {
            
        }

    }

}    